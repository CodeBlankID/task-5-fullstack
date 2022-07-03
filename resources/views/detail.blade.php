@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="card" style="width: 100%;height:100%">
          
            <div class="card-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="/">Home</a></li>
                      <li class="breadcrumb-item">Detail</li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $post->title}}</li>
                    </ol>
                  </nav>
            </div>
            <div class="card-body">
              <img class="card-img-top mb-3" src="https://picsum.photos/seed/picsum/200/300" height="280"  alt="Card image cap">
              <h3 class="card-title">{{ $post->title}}</h3>
              <p class="card-text m-0"> <i>category : {!! $post->category->title !!} </i></p>
              <p class="card-text m-0"> <i>author : {!! Auth::user()->name  !!} </i></p>
              <br>
              
              <p class="card-text">{!! $post->content !!}</p>
            </div>
            <div class="card-footer text-muted">
              <a href="/delete/{{ $post->id }}" class="btn btn-danger btn-sm m-2 float-right">Delete</a>
              <a href="/" class="btn btn-secondary btn-sm m-2 float-right">Back</a>
            </div>
          </div>

    </div>
</div>
@endsection