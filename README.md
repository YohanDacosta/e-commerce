# E-commerce Platform API REST con Symfony, API Platform y JWT

Una aplicación de **E-commerce** desarrollada con **PHP 8.2** / **Symfony 7.2** / **API Platform 4.1** / **JWT** usando **LexikJWTAuthenticationBundle 3.1** / **DTOs** / **Docker Compose**. 
La cual permite a los usuarios explorar productos, gestionar un carrito de compras y realizar pedidos de forma segura.

---

## Tecnologías utilizadas

-   PHP 8.2 (FPM)
-   Symfony 7
-   API Platform
-   Doctrine ORM
-   MariaDB 10.11.2
-   Nginx (stable-alpine)
-   LexikJWTAuthenticationBundle (JWT)
-   Symfony Serializer y DTOs
-   Docker
-   Docker Compose

---

## Características principales

-   Gestión de **Usuarios** (login con JWT)
-   Gestión de **Productos**
-   Gestión de **Categorias**
-   Gestión de **Orden**
-   Gestión de **Orden por Productos**
-   DTOs para exponer solo los campos necesarios en la API para la Entidad Usuario
-   Autenticación y autorización con **JWT**
-   API RESTful lista para consumir desde frontend o mobile
-   Soporte para tests unitarios y funcionales

---

## Instalación con Docker

1. **Clonar el repositorio**

````bash
git clone https://github.com/YohanDacosta/e-commerce.git
cd e-commerce

````
2. **Crear los contenedares e imagenes**

````bash
docker-compose exec up -d --build

````
4. **Instalar dependencias**

````bash
docker-compose exec -it php bash
composer install

````
5. **Postman**

````bash
"http://localhost:8060/api/users" [Get] - Obtener todos los usuarios en la Base de Datos.
