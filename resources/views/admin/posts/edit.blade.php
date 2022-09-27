@extends('layouts.app')

@section('content')

<form class="w-50 mx-auto" action="{{ route('admin.posts.update', $Post->id) }} " method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="author">author</label>
        <input type="text" name='author' class="form-control" id="author" value="{{ $Post->author }}">
    </div>

    <div class="form-group">
        <label for="title">title</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $Post-> title}}">
    </div>


    <div class="form-group">
        <label for="post_content">post content</label>
        <input type="text" name='post_content' class="form-control" id="post_content" value="{{ $Post->post_content }}">
    </div>

    <div class="form-group">
        <label for="post_image">image url</label>
        <input type="text" name='post_image' class="form-control" id="post_image" value="{{ $Post-> post_image}}">
    </div>

    <div class="form-group">
        <label for="post_date">date</label>
        <input type="date" name='post_date' class="form-control" id="post_date" value="{{ $Post->post_date }}">
    </div>

    
    <input type="submit" value="invia" class="btn btn-primary">
</form>
@endsection