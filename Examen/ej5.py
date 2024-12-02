electricidad = float(input("Introduce el gasto mensual de la electricidad:"))
agua = float(input("Introduce el gasto mensual del agua:"))
gas = float(input("Introduce el gasto mensual del gas:"))
comida = float(input("Introduce el gasto mensual de la comida:"))

total = electricidad + agua + gas + comida
print(f"Tu gasto mensual es de {total}€")
if total > 500:
    print("Deberias bajar tus gastos, estas superando los 500€")
else:
    print("Esta todo bien demomento")