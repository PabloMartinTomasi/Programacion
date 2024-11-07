import mysql.connector

def conectar(baseDatos):
    conexion = mysql.connector.connect(
        host="localhost",
        user="root",
        password="curso",
        database=baseDatos
    )
    return conexion