@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($post->image_url)
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
        @endif
        <div class="p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
            <div class="prose max-w-none mb-8">
                {{ $post->content }}
            </div>
            <div class="flex justify-between items-center mb-8">
                <span class="text-gray-500">{{ $post->created_at->format('d M, Y') }}</span>
                <div class="flex space-x-2">
                    <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro?')">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sección de comentarios -->
            <div class="border-t pt-8">
                <h2 class="text-2xl font-bold mb-4">Comentarios</h2>

                <!-- Formulario de comentarios -->
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-8">
                    @csrf
                    <div class="mb-4">
                        <label for="author_name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                        <input type="text" name="author_name" id="author_name" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Comentario</label>
                        <textarea name="content" id="content" rows="4" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Publicar Comentario
                    </button>
                </form>

                <!-- Lista de comentarios -->
                <div class="space-y-6">
                    @foreach($post->comments()->latest()->get() as $comment)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="font-bold">{{ $comment->author_name }}</h3>
                                    <span class="text-sm text-gray-500">{{ $comment->created_at->format('d M, Y H:i') }}</span>
                                </div>
                                <form action="{{ route('comments.destroy', [$post, $comment]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar este comentario?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                            <p class="text-gray-700">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
