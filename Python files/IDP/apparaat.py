import RPi.GPIO as GPIO
import time
import socket

# configurations
start_knop = 22
stop_knop = 17
counter = 4
led = 6
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(start_knop, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(stop_knop, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(counter, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(led, GPIO.OUT)
host = ''
port = 5555
server_address = ('145.89.252.97', port)

while True:
    sportend = False
    start = 0
    einde = 0
    x = 0
    code = input('wat is je code')
    apparaat = input(
        '\n\nOp welk apparaat wil je sporten? \nLoopband, Fiets of Roeiapparaat \n\nWil je stoppen? typ iets anders')
    if apparaat.upper() == 'LOOPBAND' or apparaat.upper() == 'FIETS' or apparaat.upper() == 'ROEIAPPARAAT':
        print('Klik op start')
    else:
        print('Oke tot ziens')
        break
    # doe niks tot er op start word geklikt
    while sportend == False:
        if GPIO.input(start_knop) == GPIO.HIGH:  # Als er op start wordt geklikt
            sportend = True
            start = time.time()  # Start de Timer
            print('Je kan beginnen met de training')

    while sportend == True:  # Zolang er gesport wordt
        if GPIO.input(counter) == GPIO.HIGH:
            x += 1  # Tel als er geklikt wordt
            print(x)
            while GPIO.input(counter) == GPIO.HIGH:
                pass
        if GPIO.input(stop_knop) == GPIO.HIGH:  # Zodra er op stop word gedrukt, stop de timer
            sportend = False
            einde = time.time()

    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  # Open een socket
    s.connect(server_address)

    verzoek = 'met:' + apparaat  # verstuur verzoek voor met code van Apparaat
    s.sendall(str.encode(verzoek))
    reply = s.recv(2048)
    met = float(reply.decode('utf-8'))  # Stop antwoord in variable met
    s.close()

    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  # open socket
    s.connect(server_address)

    verzoek2 = 'gewicht:' + code  # Verstuur verzoek voor gewicht
    s.sendall(str.encode(verzoek2))
    reply = s.recv(2048)
    gewicht = float(reply.decode('utf-8'))  # Stop reply in variable gewicht
    s.close()

    print(met, gewicht)
    # met waarde en gewicht ophalen voor cal
    tijd = round(einde - start, 2)
    afstand = round(x * 0.35, 2)
    gemiddelde_snelheid = round((afstand / tijd) * 3.6, 2)
    cal = round(((met * 3.5) * gewicht) / 200, 2)

    print(met)
    print('finished in: ' + str(tijd) + ' seconds')
    print('je hebt ' + str(afstand) + ' meter gelopen in ' + str(tijd))  # Print resultaten
    print('je gemiddelde snelheid is ' + str(gemiddelde_snelheid) + ' Km/h')
    print('je verbrand ' + str(cal) + 'kcal')

    s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.connect(server_address)
    verzoek3 = 'apparaat_code:' + apparaat.upper()
    s.sendall(str.encode(verzoek3))
    reply = s.recv(2048)
    apparaat_code = reply.decode('utf-8')
    s.close()

    resultaat = 'resultaat:' + '\'' + str(code) + '\'' + ',' + '\'' + str(apparaat_code) + '\'' + ',' + '\'' + str(tijd) + '\'' + ',' + '\'' + str(cal) + '\'' + ',' + '\'' + str(gemiddelde_snelheid) + '\'' + ',' + '\'' + str(afstand) + '\''

    s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.connect(server_address)
    s.sendall(str.encode(resultaat))
    s.close()
