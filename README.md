# 🐳 WordPress + MySQL en Docker

Este entorno Docker provee una instalación lista para desarrollo local de WordPress con base de datos MySQL y configuración PHP personalizada.

---

## 🔧 Requisitos

- Docker
- Docker Compose
- (Opcional) Make o bash para comandos rápidos

---

## 🚀 Servicios

### 📦 WordPress

- Imagen: `wordpress:6.5`
- Puerto expuesto: `${WORDPRESS_PORT}` (por defecto `81`)
- Monta `./wp-content` y opcionalmente `./html`
- Configuración PHP personalizada desde `./config/php.ini`

### 🐬 MySQL

- Imagen: `mysql:8.0`
- Puerto expuesto: `${MYSQL_PORT}` (por defecto `33061`)
- Datos persistentes en volumen `db_data`

---

## ⚙️ Configuración

### Variables de entorno (archivo `.env`)

```env
# Nombre del proyecto para Docker (prefijo de los contenedores)
COMPOSE_PROJECT_NAME=la-aldea

WORDPRESS_PORT=81
MYSQL_PORT=33061
´´´

Puedes cambiar estos valores si tienes conflicto de puertos con otros proyectos.

---

🧪 Modificar configuración PHP
El archivo ./config/php.ini permite personalizar el comportamiento de PHP en WordPress. Ejemplo incluido:

upload_max_filesize = 128M
post_max_size = 128M
memory_limit = 256M
max_execution_time = 300
max_input_time = 300


🏁 Uso
Levantar los servicios:
bash
docker-compose --env-file .env up -d

Ver logs:
bash

docker-compose logs -f

Detener los servicios:
bash
docker-compose down

📁 Estructura del proyecto
bash
.
├── docker-compose.yml
├── .env
├── wp-content/           # Tu contenido personalizado de WordPress
├── config/
│   └── php.ini           # Configuración PHP personalizada
└── html/                 # (opcional) Sobrescribe todo el core WP (⚠️ usar con precaución)

🔐 Acceso a la base de datos
Host: localhost

Puerto: ${MYSQL_PORT} (default 33061)

Usuario: wordpress

Contraseña: wordpress

Base de datos: wordpress

Puedes conectarte con clientes como DBeaver o TablePlus para depurar la base de datos.



🧹 Notas
No usar ./html vacío, ya que sobreescribirá los archivos core de WordPress.

Las credenciales y puertos son solo para desarrollo local.



📦 Empaquetado del tema
Este proyecto incluye un script llamado package-theme.sh que permite generar un archivo .zip con los archivos necesarios para subir e instalar el tema directamente desde el administrador de WordPress.

🧾 ¿Qué hace el script?
Comprime el contenido del theme en un archivo asur-base-theme.zip.

Excluye archivos innecesarios como:

.git/, node_modules/, dist/, .vscode/, .DS_Store, archivos temporales, etc.

Archivos de desarrollo como package.json, package-lock.json, .gitignore, y scripts .sh.

▶️ Cómo usarlo
Desde la raíz del theme, ejecuta:

./package-theme.sh
Esto generará el archivo asur-base-theme.zip que puedes subir directamente desde el administrador de WordPress (Apariencia → Temas → Añadir nuevo → Subir tema).

💡 Asegúrate de haber generado previamente los assets finales (CSS, JS) y de que vendor/ esté incluido si usas Composer con Carbon Fields.

✅ TODOs
 Automatizar la limpieza y generación de assets (CSS/JS) antes del empaquetado, usando herramientas como Vite, Webpack o npm scripts.


📌 Próximos pasos sugeridos
Integrar phpMyAdmin (servicio adicional)

Añadir Xdebug para debugging en VSCode



🎯 Sección Hero (Custom Post Type + Carbon Fields)
La sección principal del sitio (Hero) es administrable desde el panel de WordPress mediante un CPT personalizado llamado Hero.

🧱 ¿Qué contiene?
Cada entrada del CPT Hero permite configurar:

Frase principal (headline)

Bajada de texto

Texto y enlace de dos botones (opcional)

Imagen de fondo de pantalla completa

🧩 ¿Cómo se usa?
Ve a Hero > Añadir nuevo.

Completa los campos disponibles (texto, enlaces, imagen de fondo).

Solo se mostrará el último Hero publicado en el home (modo OnePage).

🔌 Campos creados con Carbon Fields
Los campos personalizados se cargan desde:

/inc/carbon-fields/hero-fields.php
⚠️ Requisitos
Carbon Fields debe estar instalado vía Composer y cargado correctamente desde functions.php:

require_once __DIR__ . '/vendor/autoload.php';
\Carbon_Fields\Carbon_Fields::boot();
```
