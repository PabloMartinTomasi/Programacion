#utilidades.py

def convertir_a_mayusculas(texto): 
    """Convierte el texto a mayusculas"""
    return texto.upper()

def convertir_a_minusculas(texto):
    """Convierte el texto a minusculas"""
    return texto.lower()

def es_palindromo(texto):
    """Devuelve True si el texto es un palíndromo, False en caso contrario."""
    texto = texto.replace(" ", " ").lower() # Elimina espacios y convierte a minúsculas
    return texto == texto[::-1]