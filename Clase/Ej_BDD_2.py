import funciones_bdd as bdd
conexion = bdd.conectar("animales")

# Crear un cursor
cursor = conexion.cursor()

# Escribir la consulta SQL
consulta = """
SELECT FAMILIA.familia, COUNT(ANIMAL.animal) AS total_animales
FROM ANIMAL
JOIN FAMILIA ON ANIMAL.idFamilia = FAMILIA.idfamilia
GROUP BY FAMILIA.familia;
"""

# Ejecutar la consulta
cursor.execute(consulta)

# Obtener y mostrar los resultados
resultados = cursor.fetchall()
for familia, total in resultados:
    print(f"Familia: {familia}, Total de animales: {total}")


# Cerrar el cursor y la conexión
cursor.close()
conexion.close() 