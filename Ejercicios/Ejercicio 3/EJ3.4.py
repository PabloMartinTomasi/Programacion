calificacion = {}
calificacion_media = []

while True:
    asignatura = input("ngresa el nombre de la asignatura (o 'fin' para terminar): ")
    if asignatura == "fin":
        break
    nota = float(input("Ingresa la calificación de {asignatura}:"))
    calificacion[asignatura] = nota
    
print("Resumen de calificaciones:")
for asignatura, nota in calificacion.items():
    print(f"- {asignatura}: {nota}")
    
if calificacion:
    media = sum(calificacion.values()) / len(calificacion)
    print(f"Calificación media: {media:.2f}")