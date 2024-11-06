import funciones_bdd as bdd
conexion = bdd.conectar("animales")

cursor = conexion.cursor()

# Definir los datos del nuevo animal
nuevo_animal = (10, 2, "Tigre", 2) # idAnimal, idFamilia, nombre, cantidad

# Consulta SQL para insertar un nuevo animal
consulta = "INSERT INTO ANIMAL (idAnimal, idFamilia, animal, cuantos) VALUES(%s, %s, %s, %s)"
cursor.execute(consulta, nuevo_animal)

# Confirmar los cambios en la base de datos
conexion.commit()
print("Nuevo animal insertado correctamente")

# Cerrar el cursor y la conexión
cursor.close()
conexion.close() 