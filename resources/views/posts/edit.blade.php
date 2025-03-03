@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Editar Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título</label>
                <input type="text" name="title" id="title" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Contenido</label>
                <textarea name="content" id="content" rows="8" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image_url" class="block text-gray-700 font-bold mb-2">URL de la imagen (opcional)</label>
                <input type="url" name="image_url" id="image_url"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('image_url', $post->image_url) }}">
                @error('image_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('posts.show', $post) }}" class="mr-4 px-4 py-2 text-gray-600 hover:text-gray-800">Cancelar</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Actualizar Post
                </button>
            </div>
        </form>
    </div>
@endsection
