import conexion_bd as bd
import numpy as np
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()

while True:
    consulta = """SELECT idproducto, nombre, medida, precio, stock FROM producto"""
    cursor.execute(consulta)
    productos = cursor.fetchall()
    print(Fore.BLUE+"Listado de productos:")
    print(Style.RESET_ALL)
    for producto in productos:
        idproducto, nombre, medida, precio, stock = producto
        print(Fore.BLUE+ f"{idproducto} - {nombre} - {medida} - {precio} - {stock}")
        print(Style.RESET_ALL)