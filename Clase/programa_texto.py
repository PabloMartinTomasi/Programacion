# programa_texto.py

import utilidades

# Solicitar texto al usuario
texto = input("Introduce un texto:")

# Utilizar las funciones importadas
print(f"Texto en mayusculas: {utilidades.convertir_a_mayusculas(texto)}")

print(f"Texto en minusculas: {utilidades.convertir_a_minusculas(texto)}")

if utilidades.es_palindromo(texto):
    print("El texto es un palindromo")
else:
    print("El texto no es un palindromo")