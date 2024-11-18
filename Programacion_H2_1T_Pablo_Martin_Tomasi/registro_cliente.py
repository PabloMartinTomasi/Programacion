import conexion_bd as bd
from mysql.connector import Error
import time
from colorama import Fore, Back, Style


conexion = bd.conectar("SupermercadoPyton")
cursor = conexion.cursor()


def registro_cliente():
    while True:
        dni = input("Introduce tu DNI:") #Solicitamos al usuario que introduzca su DNI
        nombre = input("Introduce tu nombre:") #Solicitamos al usuario su nombre
        apellido = input("Introduce tu apellido:") #Solicitamos al usuario su apellidp
        tlf = int(input("Introduce tu numero de telefono:")) #Solicitamos al usuario su tléfono
        direccion = input("Introduce tu direccion:") #Solicitamos al usuario su direccion
        ciudad = input("Introduce tu ciudad:") #Solicitamos al usuario su ciudad donde vive
            
        nuevo_cliente = (dni, nombre, apellido, tlf, direccion, ciudad)
        consulta = """INSERT INTO cliente (dni, nombre, apellido, tlf, direccion, ciudad) VALUES (%s, %s, %s, %s, %s, %s)""" #Insertamos a la tabla cliente los datos que a escrito el nuevo usuario
        cursor.execute(consulta, nuevo_cliente) 
        conexion.commit()
        idcliente = cursor.lastrowid #Para generar el id del usuario que se esta creando
        print(Fore.GREEN + f"[Mensaje de confirmacion] El cliente {nombre} ha sido creado con éxito, y su id es {idcliente}.") #Le enseñamos al usuario que cuenta a sido creada, y le enseñamos su id
        print(Style.RESET_ALL)
        break