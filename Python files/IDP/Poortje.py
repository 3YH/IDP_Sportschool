import RPi.GPIO as GPIO
import time
import socket

host = ''																							#settings for sockets
port = 5555																						
server_address = ('145.89.252.97', port)															


led_groen = 5																						#define pins for led's
led_rood = 6

GPIO.setwarnings(False)																				#settings GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setup(led_groen, GPIO.OUT)
GPIO.setup(led_rood, GPIO.OUT)

GPIO.output(led_groen, 0)
GPIO.output(led_rood, 0)

while True:
    code = input ("wat is je code: ")																#wait for a code
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)                        					#Open een socket
    s.connect(server_address)
    s.sendall(str.encode("code:"+code))																#send the code
    answer = s.recv(2048)																			#wait for a response
    isLoggedin = answer.decode('utf-8')
    s.close ()																						#close connection

    if isLoggedin == "none":																		#when the code doesn't exist
        GPIO.output(led_rood, 1)																	#turn the red led on for a seccond
        time.sleep(1)
        GPIO.output(led_rood, 0)
    else:
        if isLoggedin == "true":																	#define status (logged in already or not)
            status = "false"
            print ("u bent uitgelogd")
        else:
            status = "true"
            print ("u bent ingelogd")

        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)  										# Open een socket
        s.connect(server_address)
        s.sendall(str.encode("status:"+status+" WHERE lid_id = "+ "\'"+code+"\'"))					#send status to server
        s.close()																					#close connection

        GPIO.output(led_groen, 1)																	#turn the green led on for 2 secconds
        time.sleep(2)
        GPIO.output(led_groen, 0)






