<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Crear posts de ejemplo
        $posts = [
            [
                'title' => 'Introducción a Laravel 11',
                'content' => 'Laravel 11 trae nuevas características emocionantes como la nueva sintaxis de rutas, mejoras en el sistema de caché, y mucho más. En este artículo exploraremos las principales novedades de esta versión.',
                'image_url' => 'https://picsum.photos/800/400',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mejores Prácticas en PHP',
                'content' => 'El desarrollo en PHP moderno requiere seguir ciertas prácticas para mantener un código limpio y mantenible. Hablaremos sobre patrones de diseño, principios SOLID y tips de optimización.',
                'image_url' => 'https://picsum.photos/800/401',
                'status' => 'published',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'title' => 'Desarrollo Web Full Stack',
                'content' => 'El desarrollo full stack implica dominar tanto el frontend como el backend. Veremos las tecnologías más demandadas en 2024 y cómo comenzar tu camino como desarrollador full stack.',
                'image_url' => 'https://picsum.photos/800/402',
                'status' => 'published',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'title' => 'Seguridad en Aplicaciones Web',
                'content' => 'La seguridad es fundamental en el desarrollo web moderno. Aprende sobre las mejores prácticas de seguridad, prevención de ataques XSS, CSRF, inyección SQL y cómo implementar autenticación segura en tus aplicaciones.',
                'image_url' => 'https://picsum.photos/800/403',
                'status' => 'published',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'title' => 'APIs RESTful con Laravel',
                'content' => 'Diseña e implementa APIs RESTful escalables utilizando Laravel. Cubriremos autenticación con tokens, versionado de API, rate limiting, y cómo documentar tu API utilizando Swagger/OpenAPI.',
                'image_url' => 'https://picsum.photos/800/404',
                'status' => 'published',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'title' => 'Testing en Laravel',
                'content' => 'Aprende a escribir pruebas unitarias y de integración efectivas en Laravel. Descubre cómo usar PHPUnit, crear factories, mocks y cómo implementar TDD en tu flujo de desarrollo.',
                'image_url' => 'https://picsum.photos/800/405',
                'status' => 'published',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'title' => 'Docker para Desarrolladores PHP',
                'content' => 'Containeriza tus aplicaciones PHP con Docker. Aprenderás a crear Dockerfiles, configurar docker-compose para desarrollo local, y preparar tus aplicaciones para producción.',
                'image_url' => 'https://picsum.photos/800/406',
                'status' => 'published',
                'created_at' => now()->subDays(6),
                'updated_at' => now()->subDays(6),
            ],
            [
                'title' => 'Optimización de Rendimiento en Laravel',
                'content' => 'Mejora el rendimiento de tus aplicaciones Laravel. Técnicas de caché, optimización de consultas, lazy loading vs eager loading, y cómo usar Redis para mejorar la velocidad de tu aplicación.',
                'image_url' => 'https://picsum.photos/800/407',
                'status' => 'published',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(7),
            ],
            [
                'title' => 'Arquitectura Limpia en PHP',
                'content' => 'Implementa una arquitectura limpia en tus proyectos PHP. Aprende sobre Domain-Driven Design, separación de responsabilidades, y cómo estructurar tu código para mantenerlo escalable y mantenible.',
                'image_url' => 'https://picsum.photos/800/408',
                'status' => 'published',
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create($postData);

            // Crear comentarios para cada post
            $comments = [
                [
                    'author_name' => 'Juan Pérez',
                    'content' => '¡Excelente artículo! Me ayudó mucho a entender el tema.',
                    'created_at' => now()->subHours(rand(1, 24)),
                ],
                [
                    'author_name' => 'María García',
                    'content' => 'Muy bien explicado. ¿Podrías hacer un artículo sobre patrones de diseño?',
                    'created_at' => now()->subHours(rand(1, 24)),
                ],
                [
                    'author_name' => 'Carlos Rodríguez',
                    'content' => 'Me gustaría ver más ejemplos prácticos sobre este tema.',
                    'created_at' => now()->subHours(rand(1, 24)),
                ],
                [
                    'author_name' => 'Ana Martínez',
                    'content' => '¿Tienen algún curso o taller sobre este tema? Me interesa profundizar más.',
                    'created_at' => now()->subHours(rand(1, 24)),
                ],
            ];

            foreach (array_slice($comments, 0, rand(2, 4)) as $commentData) {
                $post->comments()->create($commentData);
            }
        }
    }
}
