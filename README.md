Prueba usuarios
========

Prueba Rubén Díaz Barragán
# Clonar proyecto en symfony y iniciar web server symfony

1.- `git clone https://github.com/totel/user_api.git`

2.- `composer install`

3.- `php bin/console server:start`

4.- Entrar en http://127.0.0.1:8000/

# BBDD

1.- Creamos BBDD y ponemos parametros en parameters.yml

2.- Importamos el dump o creamos los usuarios a través de la API

# API ENDPOINTS

GET users
> /api/user

GET user
> /api/user/{user_id}

CREATE user
> /api/user
fields: name, surname, password y roles (ROLE_ADMIN, ROLE_PAGE1, ROLE_PAGE2)


UPDATE user
> /api/user/{user_id}

DELETE user
> /api/user/{user_id}




