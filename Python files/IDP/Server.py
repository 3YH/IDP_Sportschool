import socket
import sys

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

    reply = 'Reply\n'
    reply2= 'nee\n'
    data = conn.recv(2048)
    print(data)
    print(data.decode('utf-8'))
    if not data:
        break
    elif data.decode('utf-8') == 'nee':
        conn.sendall(str.encode(reply2))
    else:
        conn.sendall(str.encode(reply))

    conn.close()
