import RPi.GPIO as GPIO
import time
import socket

# configurations
start_knop = 22																														#define pins for buttons and leds
stop_knop = 17
counter = 4
led = 6
GPIO.setwarnings(False)																												#settings for GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setup(start_knop, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(stop_knop, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(counter, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(led, GPIO.OUT)
host = ''																															#settings for  sockets
port = 5555
server_address = ('145.89.252.97', port)

while True:																															
    sportend = False
    start = 0
    einde = 0
    x = 0
    apparaat = input('\n\nOp welk apparaat wil je sporten? \nLoopband, Fiets of Roeiapparaat \n\nWil je stoppen? typ iets anders')	#wait for an input
    if apparaat.upper() == 'LOOPBAND' or apparaat.upper() == 'FIETS' or apparaat.upper() == 'ROEIAPPARAAT':							#check input
        print('Klik op start')
    else:
        print('Oke tot ziens')
        break																														#break if input is not one of the devices
    code = input('wat is je code')																									#ask for a code(which would be waiting for a card)
    while sportend == False:																										
        if GPIO.input(start_knop) == GPIO.HIGH:  																					#when start is press
            sportend = True
            start = time.time()  																									#start the Timer
            print('Je kan beginnen met de training')

    while sportend == True:  																										#as long as the device is used
        if GPIO.input(counter) == GPIO.HIGH:
            x += 1  																												#count the button presses
            print(x)
            while GPIO.input(counter) == GPIO.HIGH:
                pass
        if GPIO.input(stop_knop) == GPIO.HIGH:  																					#when stop is pressed, stop the timer
            sportend = False
            einde = time.time()

    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  																			#open a socket
    s.connect(server_address)

    verzoek = 'met:' + apparaat  																									#send a request with the device code
    s.sendall(str.encode(verzoek))
    reply = s.recv(2048)
    met = float(reply.decode('utf-8'))  																							#variable 'met' gets the value of the answer
    s.close()																														#close the connection

    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  																			#open socket
    s.connect(server_address)

    verzoek2 = 'gewicht:' + code  																									#send a request for weight
    s.sendall(str.encode(verzoek2))
    reply = s.recv(2048)																											#wait for a reply
    gewicht = float(reply.decode('utf-8'))  																						#variable 'gewicht' gets the value of the answer
    s.close()

    tijd = round(einde - start, 2)																									#calculate data
    afstand = round(x * 0.35, 2)
    gemiddelde_snelheid = round((afstand / tijd) * 3.6, 2)
    cal = round(((met * 3.5) * gewicht) / 200, 2)

    print(met)
    print('finished in: ' + str(tijd) + ' seconds')
    print('je hebt ' + str(afstand) + ' meter gelopen in ' + str(tijd))  															#print results
    print('je gemiddelde snelheid is ' + str(gemiddelde_snelheid) + ' Km/h')
    print('je verbrand ' + str(cal) + 'kcal')

    s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)																				#open a socket
    s.connect(server_address)
    verzoek3 = 'apparaat_code:' + apparaat.upper()																					#send request for 'apparaat_code'
    s.sendall(str.encode(verzoek3))
    reply = s.recv(2048)																											#wait for a reply
    apparaat_code = reply.decode('utf-8')
    s.close()																														#close connection
    resultaat = 'resultaat:' + '\'' + str(code) + '\'' + ',' + '\'' + str(apparaat_code) + '\'' + ',' + '\'' + str(tijd) + '\'' + ',' + '\'' + str(cal) + '\'' + ',' + '\'' + str(gemiddelde_snelheid) + '\'' + ',' + '\'' + str(afstand) + '\''

    s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)																				#open a socket
    s.connect(server_address)
    s.sendall(str.encode(resultaat))																								#send results to the server
    s.close()
