@extends('layouts.app')

@section('content')
    <div class="card card-defualt">
        <div class="card-header text-center">Create a Post</div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ isset($posts)? route('posts.update',$posts->id) : route('posts.store') }}" method="post">
                @csrf
                @if (isset($posts))
                    @method('PUT')
                @endif
                <div class="form-group">
                  <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ isset($posts)? $posts->title : '' }}">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" value="{{ isset($posts)? $posts->description : '' }}">
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" name="content" id="content" rows="3">{{ isset($posts)? $posts->content : '' }}</textarea>
                </div>
                <div class="form-group">
                  <label for="image">Select Image</label>
                  <input type="file" class="form-control-file" name="image" id="image" value="{{ isset($posts)? $posts->image : '' }}">
                </div>
                <div class="form-group">
                  <label for="published_at">Published At</label>
                  <input type="date" class="form-control" name="published_at" id="published_at" value="{{ isset($posts)? $posts->published_at : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($posts)? "Update Post" : 'Submit' }}</button>
            </form>
        </div>
    </div>
@endsection
