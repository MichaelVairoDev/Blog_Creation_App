# 📝 Blog Creation App

## 📋 Descripción

Una aplicación de blog moderna y minimalista construida con Laravel 11. La plataforma permite crear, editar y publicar artículos, así como interactuar a través de comentarios. Diseñada con una interfaz limpia y responsive utilizando Tailwind CSS.

## 📸 Capturas de Pantalla

### 🏠 Página Principal

![Página Principal](/screenshots/home.png)
_Vista del listado de posts con previsualizaciones_

### 📖 Vista de Post

![Post](/screenshots/post.png)
_Vista detallada de un post con sus comentarios_

### ✏️ Creación de Post

![Crear Post](/screenshots/create.png)
_Formulario para crear un nuevo post_

## 🚀 Tecnologías Utilizadas

- 🎯 Laravel 11
- 🎨 Tailwind CSS
- 🗃️ SQLite
- 📱 Diseño Responsive

## ⚙️ Requisitos

- PHP 8.2 o superior
- Composer
- SQLite

## 🛠️ Instalación

1. **Clonar el repositorio**
```bash
git clone <url-del-repositorio>
cd Blog_Creation_App
```

2. **Instalar dependencias**
```bash
composer install
```

3. **Configurar el entorno**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Crear la base de datos SQLite**
```bash
touch database/database.sqlite
```

5. **Ejecutar las migraciones y seeders**
```bash
php artisan migrate --seed
```

6. **Iniciar el servidor**
```bash
php artisan serve
```

## 🔍 Características

- 📝 Creación y edición de posts
- 💬 Sistema de comentarios
- 🖼️ Soporte para imágenes en posts
- 📱 Diseño responsive
- 🎨 Interfaz moderna con Tailwind CSS

## 📊 Estructura de la Base de Datos

### Posts
- 📌 ID
- 📝 Título
- 🔗 Slug
- 📄 Contenido
- 🖼️ URL de imagen
- 📊 Estado (borrador/publicado)
- ⏰ Timestamps

### Comentarios
- 📌 ID
- 🔗 ID del post
- 👤 Nombre del autor
- 💭 Contenido
- ⏰ Timestamps

## 🗂️ Estructura del Proyecto

```
Blog_Creation_App/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── layouts/
│       └── posts/
└── routes/
    └── web.php
```

## 🧪 Testing

```bash
php artisan test
```

## 📝 API Endpoints

### Posts
- GET / - Página principal con listado de posts
- GET /posts/create - Formulario de creación
- POST /posts - Crear nuevo post
- GET /posts/{post} - Ver post específico
- GET /posts/{post}/edit - Editar post
- PUT /posts/{post} - Actualizar post
- DELETE /posts/{post} - Eliminar post

### Comentarios
- POST /posts/{post}/comments - Crear comentario
- DELETE /posts/{post}/comments/{comment} - Eliminar comentario

## 👥 Contribución

Las contribuciones son bienvenidas. Por favor, sigue estos pasos:

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT.

---

⌨️ con ❤️ por [Michael Vairo]
