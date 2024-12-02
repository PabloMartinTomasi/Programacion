ingreso1 = float(input("Pon un ingreso mensual:"))
ingreso2 = float(input("Pon un ingreso mensual:"))
ingreso3 = float(input("Pon un ingreso mensual:"))
total_ingreso = ingreso1 + ingreso2 + ingreso3

gasto1 = float(input("Pon un gasto mensual:"))
gasto2 = float(input("Pon un gasto mensual:"))
gasto3 = float(input("Pon un gasto mensual:"))
total_gasto = gasto1 + gasto2 + gasto3

total = total_ingreso - total_gasto
print(f"Tu balance es de {total}€")
