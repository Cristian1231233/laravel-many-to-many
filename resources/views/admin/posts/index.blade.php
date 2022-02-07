@extends('layouts.admin')

@section('content')

    <div class="container">
       
      @if(session('delete'))
        <div class="alert alert-info" role="alert">
            {{session('delete')}}
        </div>
      @endif

            <h1>Elenco posts</h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Text</th>
                    <th scope="col">Category</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->content}}</td>
                            @if ($post->category)
                                <td>{{$post->category->name}}</td>
                            @else
                                -
                            @endif
                              
                            <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info">Show</a></td>
                            <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success">Edit</a></td>
                            <td>
                              <form onsubmit="return confirm('Confermi eliminazione di: {{ $post->title }}?')" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                 <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>
                            </td>

                        </tr>
                  @endforeach
                  <tr>
                </tbody>
              </table>
                        
                  {{ $posts->links() }}
    </div>
    <div class="container">
      @foreach ($categories as $category)
          <h2>{{ $category->name }}</h2>
            <ul>
              @forelse ($category->posts as $post_category)
                  <li>
                      <a href="{{ route('admin.posts.show', $post_category) }}">{{ $post_category->title }}</a>
                  </li>
              @empty
                 <li>Nessun post presente</li>
              @endforelse
                
            </ul>
            
      @endforeach
    </div>
    
@endsection