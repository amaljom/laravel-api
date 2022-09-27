@extends('layouts.app')

@section('content')
@if ( session ('edited'))
    <div>
        {{ session('edited') }} è stato modificato
    </div>
    @elseif(session ('created'))
        {{ session('created') }} è stata creata
@endif
<div class="card w-25 mx-auto text-center">
    <div>
        <img  src="{{ asset('storage/' . $Post->post_image) }}" alt="">
    </div>
    <p> {{ $Post->author}}</p>
    <h2> {{ $Post->title}}</h2>
    <p> {{ $Post->post_content}}</p>
    <!-- CATEGORY -->
    <div>
        <h3>
        Category:
        <span>
            @if(isset($Post->category))
                {{$Post->category->name }}
            @else
                no category
            @endif
        </span>
        </h3>
    </div>
    <!-- TAGS -->
    <div>
        <h3>
            Tags:
            <span>
                @if(isset($Post->tags))
                    @foreach($Post->tags as $tag)
                        {{$tag->name }}
                    @endforeach
                @else
                    no tags
                @endif
            </span>
        </h3>
    </div>
    <p> {{ $Post->post_date}}</p>
</div>
    
@endsection