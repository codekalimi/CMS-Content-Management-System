@extends('layouts.app')

@section('content')
   <div class="card card-default">
       <div class="card card-header">Update Categories</div>
       <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       <form action="{{ route('categories.update', $categories->id) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="form-group">
                   <label for="name">Name</label>
                    <input type="text" id="name" value="{{$categories->name}}" placeholder="Type catagory name" name="name" class="form-control">
               </div>
               <div class="form-group">
                   <button class="btn-success">Update Category</button>
               </div>
           </form>
       </div>
   </div>
@endsection
