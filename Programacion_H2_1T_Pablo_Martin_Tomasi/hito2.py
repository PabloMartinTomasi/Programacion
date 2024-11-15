import conexion_bd as bd
import registro_cliente as RC
import Visualizar_busqueda_clientes as VBC
import Realizar_compra as RCC
import seguimiento_compra as SC
from colorama import Fore, Back, Style


conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

while True:
    try:
        print(Fore.RED+ "===Pablo Martin Tomasi=== \nMenu: \n1- Registro de clientes nuevos \n2- Visualizar clientes y obtener datos sobre clientes en concreto \n3- Realizar compra \n4- Seguimiente de una compra \n5- Salir")
        print(Style.RESET_ALL)
        Menu = int(input("Seleciona una opcion del Menu:"))
        if Menu == 1: #Si el cliente seleciona la opcion 1 podremos hacer el registro del cliente
            RC.registro_cliente()
        elif Menu == 2:
            VBC.Visualizar_busqueda_clientes() #Si el cliente seleciona la opcion 2 podrmos visualizar todos los clientes que hay en la base de datos y buscar a un cliente en concreto escribiendo su idcliente
        elif Menu == 3:
            RCC.realizar_compra() #Si se seleciona la opcion 3 se podra realizar la compra y se podra observar cual es precio de su compra mediante un array y un archivo de texto
        elif Menu == 4:
            SC.seguimiento_compra() #Si el cliente seleciona la opcion 4, cuando el 
        elif Menu == 5:
            print("[Mensaje] Saliendo de la gestión. ¡Hasta pronto!")
            if cursor:
                cursor.close()
            if conexion:
                conexion.close()
            break
        else:
            print(Fore.YELLOW+ "Seleciona una opcion del menu")
            print(Style.RESET_ALL)
            continue
        
    except ValueError as ve:
        print(Fore.RED + f"Error: Entrada inválida. Por favor, ingrese un número. ({ve})")
        print(Style.RESET_ALL)
    except Exception as e:
        print(Fore.RED + f"Error inesperado: {str(e)}")
        print(Style.RESET_ALL)