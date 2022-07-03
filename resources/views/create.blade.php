@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
       <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ Form::open(array('url' => 'doinsert', 'method' => 'post')); }}
                {{ Form::token(); }}
                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::User()->id }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        <option value="1">Book</option>
                        <option value="2">Magazine</option>
                        <option value="3">Pogramming</option>
                        <option value="4">Finance</option>
                        <option value="5">Design Graphic</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-right m-2">Submit</button>
                    <a href="/"  class="btn btn-secondary text-white float-right m-2">Back</a>
                {{ Form::close() }}
                    
                 
            </div>
        </div>
        
       </div>

    </div>
</div>
@endsection