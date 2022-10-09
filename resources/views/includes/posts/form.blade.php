@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


@if($post->exists)
<form action="{{route('admin.posts.update', $post)}}" enctype="multipart/form-data" method="POST">
    @method('PUT')
@else
<form action="{{route('admin.posts.store')}}" enctype="multipart/form-data" method="POST">

@endif

            @csrf
  <div class="d-flex">
    <div class="form-group col-9">
      <label for="title">TITOLO</label>
      <input type="text" class="form-control marginNegative" id="title" name="title" value="{{ old('title', $post->title ) }}" aria-describedby="emailHelp">
      <small class="form-text text-muted">We'll never share your Privacy with anyone else.</small>
    </div>
    <div class="ms-2 col-3">
    <div class="form-group">
    <label for="category_id">CATEGORIA</label>
    <select class="form-control" id="category_id" name="category_id">
      <option>Nessuna Categoria</option>
      @foreach( $categories as $category )
      <option 
      @if (old('category_id', $post->category_id) == $category->id ) selected @endif
       value="{{$category->id}}"><strong >{{$category->label}}</strong> </option>
      @endforeach
    
    </select>
  </div>
    </div>

  </div>
  @if(count($tags))
    <div class="col-12 marginNegative">
      <fieldset>
        <legend>Tags</legend>
        @foreach($tags as $tag)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox"
           id="tag-{{$tag->label}}"
            name="tags[]"
             value="{{ $tag->id }}"
             @if(in_array($tag->id,old('tags',$prev_tags))) checked @endif>
          <label class="form-check-label" for="tag-{{$tag->label}}">{{ $tag->label }}</label>
        </div>
        @endforeach
      </fieldset>
    </div>
  @endif
  
 
  <div class="form-group">
    <label for="content">CONTENUTO</label><br>
    <textarea name="content" id="content" placeholder="content" row="10" cols="50">{{old('content',$post->content )}}</textarea>
  </div>
  
    <div class="form-group">
    <label for="image">IMMAGINE</label>
    <br>
    <input type="file" name="image" id="image-field" placeholder="Url">
    </div>
  
  <div class="col-1">
    <img class="img-fluid" id="preview" src="{{ $post->image ? asset('storage/'.$post->image ) : 'https://cdn3.vectorstock.com/i/1000x1000/35/52/placeholder-rgb-color-icon-vector-32173552.jpg' }}"alt="{{ $post->slug }}">
  </div>

    <footer class="d-flex justify-content-between align-items-center mt-5">
        <a class="btn btn-light" href="{{route('admin.posts.index')}}">HOMEPAGE</a>
        <button class="btn btn-primary" type="submit" href="#">SALVA</button>
    </footer>
    </form>