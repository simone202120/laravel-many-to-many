@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group mb-3">
                <label for="category_id">Category</label>

                <select name="category_id" class="form-control" id="category_id">
                    <option {{(old('category_id')==" ")?'selected':''}} value="">Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option {{(old('category_id')==$category->id)?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>    
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}">
                <small id="title" class="form-text text-muted">Titolo Post </small>
            </div>
            <div class="form-group">
                <label for="content">Corpo del Post</label>
               <textarea class="form-control" id="content" name='content'>
               {{old('content', $post->content)}}
               </textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Modifica Post</button>

        </form>

    </div>



@endsection