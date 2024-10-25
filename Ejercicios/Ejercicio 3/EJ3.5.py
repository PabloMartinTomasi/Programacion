menu = {
    "Café": (1.5, 50),
    "Té": (1.0, 0),
    "Bocadillo": (3.0, 300),
    "Ensalada": (2.5, 150)
}
print("Menu:")
for alimento, (precio, calorias) in menu.items():
    print(f"- {alimento}: {precio}€ ({calorias}cal)")
    
pedido = []
total_precio = 0
total_calorias = 0

while True:
    producto = input("Ingresa el nombre del producto que deseas agregar (o 'fin' para terminar):")
    if producto == "fin":
        break
    if producto in menu:
        pedido.append(producto)
        total_precio += menu[producto][0]
        total_calorias += menu[producto][1]
        
if pedido:
    print("Tu pedido:")
    for item in pedido:
        print(f"- {item}")
    print(f"Toltal a pagar: {total_precio} €")
    print(f"Total de calorias: {total_calorias} cal")