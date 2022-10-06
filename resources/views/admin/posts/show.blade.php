@php
$isAuthor = $post->user_id === Auth::id()

@endphp


@extends('layouts.app')
@section('content')
<div class="container">
    <header class="h2"><strong>{{$post->title}}</strong></header>
    <div class="clearfix mb-4">
        <img class="showImage float-left mr-3 col-3" src="{{ asset('storage/'.$post->image ) }}" alt="{{ $post->slug }}" />
        <h1>{{$post->title}}</h1>
        <h4><strong>Categoria:</strong></h4>
        @if($post->category)
        <strong class="badge badge-{{$post->category->color}}">{{ $post->category->label }}</strong>
        
        @else
        <span>Nessuna</span>
        @endif
        <div>
         <h4>Tags :</h4> 
         @forelse($post->tags as $tag) 
         <span class="mr-2 badge" style="background-color:{{$tag->color}}">{{$tag->label}}</span> 
         @empty
         --
         @endforelse
       </div>
            <p>{{$post->content}}</p>
            @if($post->author)
            <div><strong>Autore: </strong> {{$post->author->name}}</div>
                @else 
                    <strong>Autore: Anonimo</strong>
                @endif
            
            <div class="offset-3"><time><strong>Creato il:</strong> {{$post->created_at}}</time></div>  
            <div class="offset-3"><time><strong>Ultima modifica il:</strong> {{$post->updated_at}}</time></div>
       
    </div>
    <footer class="d-flex align-items-center justify-content-{{ $isAuthor ? 'between' :'end' }} mt-5">
        <div>
        <a href="{{Route('admin.posts.index')}}" class="mt-5 btn btn-light p-1"><i class="fa-solid fa-house-user"></i></a>
        </div>
        @if($isAuthor)
        <div class="d-flex align-items-center justify-content-end mt-5">
        <a class="btn btn-small btn-warning mr-2" href="{{route('admin.posts.edit', $post)}}">
        <i class="fa-solid fa-pen-to-square"></i></a>
            <form action="{{Route('admin.posts.destroy',$post->id )}}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
        @endif
    </footer>
</div>

@endsection