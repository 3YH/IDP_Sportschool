import socket
import sys

host = ''
port = 5555
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

server_address = ('192.168.42.1', port)
s.connect(server_address)

data = input('wat wil je sturen')
s.send(str.encode(data))
reply = s.recv(2048)
print(reply.decode('utf-8'))
s.close()

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(server_address)
data = 'nee'
s.sendall(str.encode(data))
reply = s.recv(2048)
print(reply.decode('utf-8'))