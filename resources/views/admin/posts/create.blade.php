@extends('layouts.admin')

@section('content')

    <div class="container">

        <h1>Crea un nuovo post</h1>

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
          </div>
        @endif
        

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input value="{{ old('title') }}" type="text" name="title" class="form-control @error('title') is-invalid
                @enderror" id="title" placeholder="titolo">
                @error('title')
                   <p> {{ $message }} </p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Descrizione</label>
                <textarea class="form-control @error('title') is-invalid
                @enderror" name="content" id="content" rows="3">{{ old('content') }}</textarea>
                @error('content')
                <p> {{ $message }} </p>
                @enderror
              </div>
              <div class="mb-3">
                  <label for="category_id" class="form-label">Inserisci una categoria</label>
                <select name="category_id" id="category_id" class="form-select" form-label="Seleziona una categoria">
                    <option value="" >Selezionare una categoria</option>
                    @foreach ($categories as $category)
                   <option
                        @if ($category->id == old('category_id')) selected @endif
                      
                     value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach                   
                  </select>
                  <h2>Tag</h2>
                  @foreach ( $tags as $tag)
                  <span class="d-inline-block mr-3">
                    <input type="checkbox"
                       name="tags[]"
                       value="{{ $tag->id }}"
                       id="tag{{ $loop->iteration }}"
                       @if (in_array($tag->id, old('tags', []))) checked @endif
                         >
                       
                      <label for="tag{{ $loop->iteration }}">{{ $tag->name }}</label>
                  </span>
                  @endforeach
            </div>
              <button class="btn btn-success" type="submit">Invia</button>
              <button class="btn btn-secondary" type="reset">Reset</button>
        </form>

    </div>
                
    
@endsection