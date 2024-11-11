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
        
    idcliente = int(input("Introduce tu idcliente:"))
    idproducto = int(input("Introduce el idproducto que quieres agregar:"))
    unidades = int(input("Introduce las unidades que quieres agregar:"))
    añadir_producto_a_comprar = (idcliente, idproducto, unidades)
    consulta = """INSERT INTO detalle (idcliente, idproducto, unidades) VALUES (%s, %s, %s)"""
    cursor.execute(consulta, añadir_producto_a_comprar)
    conexion.commit()
    print(Fore.GREEN+ f"[Mensaje de confirmacion] se a añadidio {idproducto} ha sido creada con éxito.")
    print(Style.RESET_ALL)
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()
    break