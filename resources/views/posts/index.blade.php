@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($post->image_url)
                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-800">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($post->content, 150) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $post->created_at->format('d M, Y') }}</span>
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
                </div>
            </div>
        @endforeach
    </div>
@endsection
