import funciones_bdd as bdd
conexion = bdd.conectar("animales")

# Crear un cursor
cursor = conexion.cursor()

# Escribir la consulta SQL
consulta = """
SELECT ANIMAL.animal, FAMILIA.familia
FROM ANIMAL
JOIN FAMILIA ON ANIMAL.idFamilia = FAMILIA.idfamilia;
"""

# Ejecutar la consulta
cursor.execute(consulta)

# Obtener y mostrar los resultados
resultados = cursor.fetchall()  # Obtiene todos los resultados de la consulta
for animal, familia in resultados:
    print(f"Animal: {animal}, Familia: {familia}")

# Cerrar el cursor y la conexión
cursor.close()
conexion.close() 