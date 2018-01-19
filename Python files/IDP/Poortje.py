import RPi.GPIO as GPIO

led_groen = 5
led_rood = 6

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(led_groen, GPIO.OUT)
GPIO.setup(led_rood, GPIO.OUT)

GPIO.output(led_groen, 1)