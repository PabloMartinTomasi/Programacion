ventas = [100, 200, 300, 150, 50]
suma = 0
lista = []

for n in ventas:
    if n > 100:
        suma += n
    elif n <= 100:
        lista.append(n)
        
print(suma)
print(n)