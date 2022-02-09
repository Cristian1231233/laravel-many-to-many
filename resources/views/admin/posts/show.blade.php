@extends('layouts.admin')

@section('content')

    <div class="container">
       
            <div>Show</div>
            <h1>{{ $post->title }}</h1>
            @forelse($post->tags as $tag)
                <span class="badge bg-primary">{{$tag->name}}</span>
            @empty
                -
            @endforelse
            @if ($post->category)
                <h2>Categoria: {{ $post->category->name }}</h2>
            @endif
            <div><strong>Descrizione:</strong> {{ $post->content }}</div>
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success">Edit</a>
            <form class="mt-1" onsubmit="return confirm('Confermi eliminazione di: {{ $post->title }}?')" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-danger">Delete</button> 
            </form>
    </div>
    
@endsection