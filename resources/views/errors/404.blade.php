@extends('layouts.admin')

@section('content')
<div class="container text-center">
    <h1>Error</h1>
    <h2>Post non trovato</h2>
    <p>{{ $exception->getMessage() }}</p>
</div>
@endsection