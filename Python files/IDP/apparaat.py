import RPi.GPIO as GPIO
import time

#configurations
start_knop = 22
stop_knop = 17
apparaat = 4
led = 6
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(start_knop, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(stop_knop, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(apparaat, GPIO.IN, pull_up_down=GPIO.PUD_DOWN)
GPIO.setup(led, GPIO.OUT)
sportend = False
start = 0
einde = 0
x = 0

#doe niks tot er op start word geklikt
while sportend == False:
    if GPIO.input(start_knop) == GPIO.HIGH:                                 #Als er op start wordt geklikt
        sportend = True
        start = time.time()                                                 #Start de Timer
        print('Je kan beginnen met lopen')

while sportend == True:                                                     #Zolang er gesport wordt
    if GPIO.input(apparaat) == GPIO.HIGH:
        print('Goed geklikt man, echt n topper')
        x += 1                                                              #Tel als er geklikt wordt
        while GPIO.input(apparaat) == GPIO.HIGH:
            pass
    if GPIO.input(stop_knop) == GPIO.HIGH:                                  #Zodra er op stop word gedrukt, stop de timer
        sportend = False
        einde = time.time()

tijd = str(einde - start)
afstand = str(x * 0.35)
print('finished in: '+ str(einde - start)+ 'seconds')
print(str(x) + ' keer geklikt')
print('je hebt '+ afstand + 'meter gelopen in ' + tijd)


