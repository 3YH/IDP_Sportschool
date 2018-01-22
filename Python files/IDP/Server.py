import socket
import sys
from sql_codes import met, met2



host = ''
port = 5555
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

try:
    s.bind((host, port))
except socket.error as e:
    print(str(e))

s.listen(5)
print('waiting for connection')

while True:
    conn, addr = s.accept()
    print("connected to " + str(addr[0]) + ':' + str(addr[1]))

    received = conn.recv(2048)
    data = received.decode('utf-8')
    if not received:
        break
    else:
        value = data.split(':')
        sql = {'met': value[1], 'gewicht': value[1]}

        conn.sendall(str.encode(sql[value[0]]))

    conn.close()
