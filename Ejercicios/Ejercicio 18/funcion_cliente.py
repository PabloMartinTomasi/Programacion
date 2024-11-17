import conexion_bd as bd
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()


def menu_cliente():
    while True:
        try:
            print(Fore.RED+"===Gestion de Clientes=== \nSeleccione una opcion: \n1. Crear nuevp/a cliente \n2. Leer clientes existentes \n3. Actualizar un cliente \n4. Eliminar un cliente \n5. Salir")
            print(Style.RESET_ALL)
            menu = int(input("Seleciona una opcion del Menu:"))
            if menu == 1:
                crear_cliente()
            elif menu == 2:
                leer_cliente()
            elif menu == 3:
                actualizar_cliente()
            elif menu == 4:
                eliminar_cliente()
            elif menu == 5:
                cerar_conexion_clientes()
                break
            else:
                print(Fore.YELLOW+ "Seleciona una opcion del menu")
                print(Style.RESET_ALL)
            
        except ValueError as ve:
            print(Fore.RED + f"Error: Entrada inválida. ({ve})")
            print(Style.RESET_ALL)
        except Exception as e:
            print(Fore.RED + f"Error inesperado: {str(e)}")
            print(Style.RESET_ALL)
            
def crear_cliente():
    idcliente = input("Dame el idcliente de tu nuevo cliente:")
    cia = input("Dame la CIA de tu cliente(empresa):")
    contacto = input("Dame el nombre de tu cliente:")
    cargo = input("Dame el puesto de tu cliente:")
    direccion = input("Dame la direccion de tu cliente:")
    ciudad = input("Dame la ciudad de tu cliente:")
    region = input("Dame las siglas de la region de tu cliente (si tiene):")
    cp = int(input("Dame el codigo postal de tu cliente:"))
    pais = input("Dame el pais de tu cliente:")
    tlf = int(input("Dame el telefono de tu cliente:"))
    fax = input("Dame el FAX de tu cliente:")
    nuevo_cliente = (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax)
    consulta = """INSERT INTO cliente (idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"""
    cursor.execute(consulta, nuevo_cliente)
    conexion.commit()
    print(Fore.GREEN+ f"[Mensaje de confirmacion] El cliente {contacto} ha sido creada con éxito.")
    print(Style.RESET_ALL)

def leer_cliente():
    consulta = """SELECT idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax FROM cliente"""
    cursor.execute(consulta)
    clientes = cursor.fetchall()
    print(Fore.BLUE+"Listado de CLIENTES:")
    print(Style.RESET_ALL)
    for cliente in clientes:
        idcliente, cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax = cliente
        print(Fore.BLUE+ f"{idcliente} - {cia} - {contacto} - {cargo} - {direccion} - {ciudad} - {region} - {cp} - {pais} - {tlf} - {fax}")
        print(Style.RESET_ALL)
    
def actualizar_cliente():
    idcliente = input("Dame el id del cliente que deseas actualizar:")
    cia = input("Dame la CIA del cliente(empresa) que deseas actualizar:")
    contacto = input("Dame el nombre del cliente que deseas actualizar:")
    cargo = input("Dame el puesto del cliente que deseas actualizar:")
    direccion = input("Dame la direccion del cliente que deseas actualizar:")
    ciudad = input("Dame la ciudad del cliente que deseas actualizar:")
    region = input("Dame las siglas de la region del cliente (si tiene) que deseas actualizar:")
    cp = int(input("Dame el codigo postal del cliente que deseas actualizar:"))
    pais = input("Dame el pais del cliente que deseas actualizar:")
    tlf = int(input("Dame el telefono del cliente que deseas actualizar:"))
    fax = input("Dame el FAX del cliente que deseas actualizar:")
    consulta = """UPDATE cliente SET cia = %s, contacto = %s, cargo = %s, direccion = %s, ciudad = %s, region = %s, cp = %s, pais = %s, tlf = %s, fax = %s WHERE idcliente = %s"""
    cursor.execute(consulta, (cia, contacto, cargo, direccion, ciudad, region, cp, pais, tlf, fax, idcliente))
    conexion.commit()
    print(Fore.CYAN+ f"[Mensaje de confirmación] El  cliente con ID {idcliente} ha sido actualizado.")
    print(Style.RESET_ALL)
    
def eliminar_cliente():
    idcliente = input("Ingresa el ID del cliente a eleminar:")
    consulta = """DELETE FROM cliente WHERE idcliente = %s"""
    cursor.execute(consulta, (idcliente,))
    conexion.commit()
    print(f"[Mensaje de confirmación] El cliente con el ID {idcliente} ha sido eliminada.")
    
def cerar_conexion_clientes():
    if cursor:
        cursor.close()
    if conexion:
        conexion.close()