import RPi.GPIO as GPIO
import time
import socket

host = ''
port = 5555
server_address = ('145.89.252.97', port)


led_groen = 5
led_rood = 6

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(led_groen, GPIO.OUT)
GPIO.setup(led_rood, GPIO.OUT)

GPIO.output(led_groen, 0)
GPIO.output(led_rood, 0)

while True:
    code = input ("wat is je code: ")
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)                        #Open een socket
    s.connect(server_address)
    s.sendall(str.encode("code:"+code))
    answer = s.recv(2048)
    reply = answer.decode('utf-8')
    s.close ()

    if reply == "none":
        GPIO.output(led_rood, 1)
        time.sleep(1)
        GPIO.output(led_rood, 0)
    else:
        GPIO.output(led_groen, 1)
        time.sleep(2)
        GPIO.output(led_groen, 0)






