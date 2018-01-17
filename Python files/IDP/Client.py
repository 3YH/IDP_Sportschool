import socket
import sys

host = ''
port = 5555
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

server_address = ('192.168.42.1', 5555)
s.connect(server_address)

data = input('wat wil je sturen')
s.sendall(str.encode(data))
reply = s.recv(2048)
print(reply.decode('utf-8'))