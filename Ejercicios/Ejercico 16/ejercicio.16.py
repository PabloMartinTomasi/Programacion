import conexion_bd as bd
import fucion_categoria as cate
from colorama import Fore, Back, Style

conexion = bd.conectar("supermercado")
cursor = conexion.cursor()

