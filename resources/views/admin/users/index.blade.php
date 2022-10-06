@extends('layouts.app')
@section('content')
<div class="container">
<a class="btn btn-primary mb-4" href="#"><i class="fa-solid fa-user-plus"></i>   Aggiungi un nuovo utente</a>
<table class="table table-light table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">telefono</th>
            <th scope="col">Data di nascita</th>
        </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <th>{{$user->id}}</th>
                <td>{{$user->UserDetail->first_name}}</td>
                <td>{{$user->UserDetail->last_name}}</td>
                <td>{{$user->UserDetail->phone}}</td>
                <td>{{$user->UserDetail->birthyear}}</td>
            </tr>
            @empty Nessun Utente
            @endforelse
        </tbody>
               
</div>
@endsection