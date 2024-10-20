# TPE_2024

## Tema
Venta de albumes de musica
## Integrantes
Salvador Tucci González.

## Diseño
![image](https://github.com/user-attachments/assets/08552594-4442-4db5-b627-84774fa7a280)

## Comportamiento
a Día de la fecha la base de datos consta de tres tablas con una relacion de 1 a N, donde, una banda (tabla "bandas") corresponde a varios álbumes (tabla "albumes").

la tabla "albumes" contiene como clave primaria a "id_album" con un auto incrementar, y contiene a "id_banda" como clave foránea relacionandola con "id_banda" de la tabla "bandas".  
la tabla "bandas" contiene como clave primaria a "id_banda" con un auto incrementar.  
la tabla "usuarios" contiene como clave primaria "id_usuario" con un auto incrementar.  
  

Home = Se visualizan todos los ítems cargados con el nombre de la categoría a la que pertenece.  
Description = SE visualiza cada ítem particularmente.  
Bands =  Se visualiza un listado con todas las categorías cargadas.  
Discography =  Se visualiza los ítems perteneciente a una categoría seleccionada.  
ShowLogin = El usuario administrador debe loguearse con usuario y contraseña.  
Logout = El usuario debe poder desloguearse.  

Solo los usuarios logueados pueden modificar las categorías y los ítems: 

Administrar Ítems (entidad del lado N de la relación):  
Lista de Items (Home).  
Agregar Items ( se elige la categoría a la que pertenecen utilizando un select que muestre el nombre de la misma) (ShowCreateAlbum).  
Eliminar Items (DeleteAlbum/id).  
Editar Items (ShowEditAlbum/id).  
Se sube una foto cuando se crea el ítem (por URL).

Administrar Categorías (entidad del lado 1 de la relación):  
Lista de Categorías (Bands).  
Agregar Categorías (ShowCreateBand).  
Eliminar Categorias (DeleteBand/id y ConfirmDeleteBand/id en caso de que la banda a eliminar contenga uno o mas albumes).  
Editar Categorías (ShowEditBand/id).  


# Informacion Necesaria
la Contrasenia del usuario "Demo" con el email "Demo@gmail.com" es: 123456789  
