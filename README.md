# TPE_2024

## Tema
Venta de albumes de musica
## Integrantes
Salvador Tucci González.

## Diseño
![image](https://github.com/user-attachments/assets/08552594-4442-4db5-b627-84774fa7a280)

## Comportamiento
a Día de la fecha la base de datos consta de dos tablas con una relacion de 1 a N, donde, una banda (tabla "bandas") corresponde a varios álbumes (tabla "albumes").

la tabla "albumes" contiene como clave primaria a "id_album" con un auto incrementar, y contiene a "id_banda" como clave foránea relacionandola con "id_banda" de la tabla "bandas".
la tabla "bandas" contiene como clave primaria a "id_banda" con un auto incrementar.
