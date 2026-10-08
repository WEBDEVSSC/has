🛡️ HAS - Hostigamiento y Acoso Sexual

HAS es una plataforma web integral desarrollada en Laravel, diseñada para gestionar, recibir y dar seguimiento oportuno a denuncias relacionadas con situaciones de Hostigamiento y Acoso Sexual. El sistema garantiza la confidencialidad, trazabilidad y seguridad de la información tanto para las víctimas/denunciantes como para el equipo administrativo.

📌 Tabla de Contenidos

✨ Funcionalidades Principales

🌐 Micrositio (Atención al Usuario)

⚙️ Panel Administrativo

🛠️ Stack Tecnológico

📋 Requisitos del Sistema

🚀 Guía de Instalación

🔒 Seguridad y Confidencialidad

📄 Licencia

✨ Funcionalidades Principales

El sistema está estructurado en dos módulos clave:

🌐 Micrositio (Atención al Usuario)

📝 Registro de Denuncias: Formulario intuitivo y guiado para el registro seguro e inmediato de incidencias de acoso u hostigamiento sexual.

🔎 Consulta y Seguimiento: Módulo para verificar en tiempo real el estado y avances de la investigación mediante un código o folio único confidencial.

🔄 Registro de Reincidencias: Permite anexar nuevos hechos, testimonios o evidencias a un caso guardado previamente.

⚙️ Panel Administrativo

📊 Dashboard Centralizado: Control visual de las denuncias recibidas, pendientes, en proceso y concluidas.

🕵️ Gestión y Seguimiento de Casos: Herramientas para cambiar el estatus del expediente, asignar responsables de la investigación y anexar observaciones.

📂 Historial e Insumos: Consulta completa de la cronología del caso, incluyendo todas las reincidencias reportadas por la persona denunciante.

🛠️ Stack Tecnológico

Core Framework: Laravel 10.x / 11.x

Backend: PHP 8.2+

Frontend: Blade, Tailwind CSS / Bootstrap, JavaScript

Base de Datos: MySQL / PostgreSQL

Servidor Recomendado: Nginx / Apache

📋 Requisitos del Sistema

Asegúrate de contar con lo siguiente instalado en tu entorno local o servidor:

PHP >= 8.2

Composer >= 2.5

Servidor de Base de Datos (MySQL, MariaDB o PostgreSQL)

Node.js & NPM >= 18.x

🚀 Guía de Instalación

Sigue estos pasos para clonar e instalar el proyecto en tu entorno local de desarrollo:

1. Clonar el repositorio

git clone https://github.com/tu-usuario/has-laravel.git
cd has-laravel


2. Instalar dependencias de PHP

composer install


3. Instalar dependencias de Node.js

npm install


4. Configurar variables de entorno

Copia el archivo .env.example para crear el archivo .env:

cp .env.example .env


5. Generar la clave de la aplicación

php artisan key:generate


6. Configurar la Base de Datos

Abre el archivo .env y configura tus credenciales de acceso a la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=has_db
DB_USERNAME=root
DB_PASSWORD=tu_contraseña


7. Ejecutar migraciones y datos de prueba

php artisan migrate --seed


8. Compilar los recursos del frontend

npm run dev


9. Iniciar el servidor local

php artisan serve


Abre tu navegador y navega a: http://127.0.0.1:8000

🔒 Seguridad y Confidencialidad

Dada la naturaleza delicada de la información procesada por la plataforma HAS, se aplican las siguientes medidas:

🔐 Autenticación Basada en Roles: Control de acceso estricto al panel administrativo.

🛡️ Protección de Datos Sensibles: Encriptación de campos delicados en la base de datos.

🚫 Protección CSRF y Sanitización: Prevención de ataques comunes según los estándares de Laravel.

📄 Licencia

Este proyecto está distribuido bajo la licencia MIT. Para más información, consulta el archivo LICENSE.