lista_libros = []

def introduce_nombre_libro():
    while True:
        nombre_libro = input("Dame los nombres de unos libros:")
        if nombre_libro.lower() == "fin":
            break
        categoria = input("La categoria de tu libro es una novela? (Si/No)")
        libro = {
            "Nombre" : nombre_libro,
            "Novela" : "Si" if categoria.lower() == "si" else "no"
        }
        lista_libros.append(libro)
        
def libro_novela(novela):
    return novela["Novela"] == "Si"
introduce_nombre_libro()

es_novela = list(filter(libro_novela, lista_libros))
print(es_novela)