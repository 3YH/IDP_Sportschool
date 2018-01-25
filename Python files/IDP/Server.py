import socket
import sys
from sql_codes import met, gewicht, code, resultaat, apparaat_code
import pymysql



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
        sql = {'met':met + '\'' + value[1] + '\'', 'gewicht': gewicht + '\'' + value[1] + '\'', 'code':code + '\'' + value[1] + '\'',
               'apparaat_code':apparaat_code + '\''+value[1] + '\'', 'resultaat':resultaat + value[1] + ');'}
        db = pymysql.connect('localhost', 'root', 'root', 'idpsportschool')
        cursor = db.cursor()
        cursor.execute(sql[value[0]])
        db.commit()
        try:
            result = cursor.fetchone()
            reply = (result[0])
        except:
            reply = 'none'
        conn.sendall(str.encode((str(reply))))

    conn.close()
