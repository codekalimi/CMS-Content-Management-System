@extends('layouts.app')

@section('content')
    <div class="card card-defualt">
        <div class="card-header text-center">
            {{isset($posts)?"Edit Post": "Create a new Post"}}
        </div>
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
            <form action="{{ isset($posts)? route('posts.update',$posts->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
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
                <input id="content" type="hidden" name="content" value="{{isset($posts)?$posts->content: ""}}">
                    <trix-editor input="content"></trix-editor>
                </div>
                @if (isset($posts))
                    <div class="form-group">
                    <img src="{{ asset('storage/'.$posts->image) }}" alt="" width="100">
                    </div>
                @endif
                <div class="form-group">
                  <label for="image">Select Image</label>
                  <input type="file" class="form-control-file" name="image" id="image" value="{{ isset($posts)? $posts->image : '' }}">
                </div>
                <div class="form-group">
                  <label for="published_at">Published At</label>
                  <input type="text" class="form-control" name="published_at" id="published_at" value="{{ isset($posts)? $posts->published_at : '' }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($posts)? "Update Post" : 'Submit' }}</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
{{-- trix editor js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    {{-- flatpickr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.2/flatpickr.min.js"></script>

    <script>
        flatpickr("#published_at", {
            enableTime: true
        });

    </script>
@endsection

@section('styles')
{{-- trix editor css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    {{-- flatpickr css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.2/flatpickr.min.css">
@endsection
