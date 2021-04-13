import random

letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
numeros = '123456789'
estado = ['activo', 'mantencion']
tipo = ['moto', 'bicileta', 'auto', 'camion']
categoria = ['frescos', 'cadena fria', 'carga']
unidad  = [1,2,3,4,5]

def patente():
	a = ''
	for i in range(4):
		u = random.choice(letras)
		a =  a + u
	for i in range(2):
		u = random.choice(numeros)
		a = a + u
	return a

def auto():
	a = patente()
	b = random.choice(estado)
	c = random.choice(tipo)
	d = random.choice(categoria)
	e = random.choice(unidad)
	return '{},{},{},{},{}'.format(a,b,c,d,str(e))

import rut

# obtener el digito verificador de un rut en particular
rut.digito_verificador(1) # obtiene el digito verificador del rut "1"

# generara lista de rut
rut.genera_rut(cantidad=10, inicio=10000, csv=False)
