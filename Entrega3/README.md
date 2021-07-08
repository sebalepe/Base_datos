# Entrega 3 Grupos 62 y 87
http://codd.ing.puc.cl/~grupo62/index.php
## Tabla de contenidos

- [Usuarios](#Usuarios)
  - [Algunos Jefes](#Algunos_Jefes)
  - [Algunos Usuarios Normales](#AlgunosUsuariosNormales)
- [Tomar En Cuenta](#TomarEnCuenta)
  - [Generar contraseñas](#Generarcontraseñas)
  - [Migración De Personal a Usuarios](#MigraciónDePersonalaUsuarios)
  - [Problema Consultas Con POST](#ProblemaConsultasConPOST)
  - [Funcionalidad Adicional](#FuncionalidadAdicional)
  - [Fábrica](#Fábrica)
  - [Registro](#Registro)
- [Corrección](#Corrección)
  - [Index](#Index)
  - [Registro](#Registro)
  - [Ingresar](#Ingresar)
  - [Home](#Home)
  - [Menu](#Menu)
  - [Perfil](#Perfil)
  - [Cerrar Sesion](#CerrarSesion)
  - [Editar Perfil](#EditarPerfil)

---



## Usuarios



### Algunos Jefes

Nombre                    | Rut                  | Contraseña
------------------------- | ---------------------|-------------------------------
Calista Cummings          | 17341224-k           | yhq5JHOEmYSBGptbsl20x4232tKqde
Kimora Ridley             | 33461543-k           | gPtfe7o8RCY7HfvzMH0eusZlPuhBnU
Skye Gray     		        | 48007583-8           | iNFX5ZcggNwFRVaNVByyuUCQ0Qc2wt


### Algunos Usuarios Normales

Nombre                    | Rut                  | Contraseña
------------------------- | ---------------------|-------------------------------
Cally Hopper              | 38578737-5           | vJNjK4Mvtgk4lfa7OOo8dYp7JEVBGY
Hunter Solomon            | 88772168-8           | 2o10ApTmC61xXCiz5UJUmX09u5hvhz
Arjan Mcdermott           | 80291272-2           | 8Uq9gHsVzfvlxgNPug3TCKWkECNj2l

---


## Tomar En Cuenta

### Generar contraseñas
Se hace en ../data/data_loader.php .
Para generar las contraseñas se usó la función generateRandomString(), que se 
encuentra en ../data/data_loader.php, que crea un string de largo 30. Con el string
se actualiza la contraseña en personal(grupo 62) y en usuarios(grupo 87) antes de la
migración de datos.


### Migración De Personal a Usuarios
Se hace en ../data/data_loader.php .
Se obtienen todas las filas de personal(grupo 62) y se modifican para poder insertarlas en usuarios(grupo 87).

### Problema Consultas Con POST
Cuando se actualiza la página en una pestaña con una consulta POST, se debe esperar a la 
notificación de confirmar reenvío de formulario. Se debe refrescar cada pestaña al usar el botón back.

### Funcionalidad Adicional
Agregamos un botón 'Random Search' en Home que crea una consulta de una tienda random.

### Registro
Al crear un nuevo usuario el rut debe estar sin puntos y con guión; contraseña entre 1 y 30, con letras y números.

### Fábrica
Todos los datos se pueden restaurar. Comunicar con grupo.

---

## Corrección

### Index
Opción para registrar o ingresar en la página.

### Registro
Se registra en la página. 

### Ingresar
Se ingresa a la página.

### Home
Página de compras.

### Menu
https://www.youtube.com/watch?v=rGCxtPLzwO8

### Perfil
Perfil del usuario.

### Cerrar Sesion
Cierra la sesión actual.

### Editar Perfil
Se pueden cambiar los datos del usuario.

---
