@extends('layouts.app')

@section('content')
   <div class="card card-default">
       <div class="card card-header">Create a Categories</div>
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
       <form action="{{ route('categories.store') }}" method="POST">
               @csrf
               <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" id="name" placeholder="Type catagory name" name="name" class="form-control">
               </div>
               <div class="form-group">
                   <button class="btn-success">Add Category</button>
               </div>
           </form>
       </div>
   </div>
@endsection
