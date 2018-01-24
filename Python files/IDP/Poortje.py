import RPi.GPIO as GPIO
import time

host = ''
port = 5555
server_address = ('192.168.42.1', 5555)


led_groen = 5
led_rood = 6

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(led_groen, GPIO.OUT)
GPIO.setup(led_rood, GPIO.OUT)

GPIO.output(led_groen, 1)

def poortje():
    code = input ("wat is je code: ")
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)                        #Open een socket
    s.connect(server_address)
    s.sendall(str.encode("code:"+code))
    reply = s.recv(2048)
    s.close ()

    if reply == "none":
        GPIO.output(led_rood, 1)
        sleep(1)
        GPIO.ouput(led_groen, 0)
    else:
        GPIO.output(led_groen, 1)
        sleep(2)
        GPIO.output(led_rood, 0)






