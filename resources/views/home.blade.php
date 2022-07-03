@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                                {{ __('Welcome') }} <b> {{ Auth::user()->name }} </b>
                            <a class="btn btn-sm btn-warning" style="float: right" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a href="/insert" class="btn btn-sm btn-success text-white float-right mr-2">Create Post</a>  
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
                @if (session('status'))
                    <div class="row">
                        <div class="col-md-12 text-center">
                              <div class="alert alert-warning alert-dismissible fade show" role="alert" id="success-alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row mt-3">
        @foreach($post as $posts)
        <div class="col-md-3 ">
            <div class="card m-2" style="width: 16rem;">
                <div class="card-header bg-secondary text-white">
                    <b class="card-title text-center">{{ $posts->title}}</b>
                   <a class="btn btn-sm btn-danger float-right" href="delete/{{  $posts->id }}" class="">Delete</a>
                </div>
                <img class="card-img-top" src="https://picsum.photos/seed/picsum/200/300" height="200" alt="Card image cap">
                <div class="card-body" style="height: 200px;">
                 
                  <p class="card-text">{!!Str::limit( $posts->content, 150)  !!} <br><a href="detail/{{  $posts->id }}" class="">Show More</a></p>
                  
                </div>
              </div>
        </div>
        @endforeach
        
    </div>
    @if ($post->hasPages())
    <div class="row mt-5">
        <div class="col-md-6">
             {{ $post->links() }}
        </div>
    </div>
    @endif
</div>
@endsection
