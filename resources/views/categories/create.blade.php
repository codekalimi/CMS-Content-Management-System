@extends('layouts.app')

@section('content')
   <div class="card card-default">
       <div class="card card-header">Create a Categories</div>
       <div class="card-body">
           <form action="">
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
