temperaturas = [15.5, 20.3, 18.2, 25.0, 30.5]

def convertir_a_fahrenheit(n):
    return (n * 1.8) + 32

convertir = list(map(convertir_a_fahrenheit, temperaturas))
print(convertir)