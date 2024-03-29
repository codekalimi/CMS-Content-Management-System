@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-end mb-2">
       <a href=" {{ route('categories.create') }} " class="btn btn-success">Add Category</a>
   </div>
   <div class="card card-default">
       <div class="card card-header text-center">Categories</div>
       @if (count($categories) > 0)
       <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                             <td>{{$category->name}}</td>
                             <td>
                                 <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                             </td>
                             <td>
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$category->id}})"
                                            data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                             </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal -->
            <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                    <div class="modal-dialog ">
                      <!-- Modal content-->
                      <form action="" id="deleteForm" method="post">
                          <div class="modal-content">
                              <div class="modal-header bg-danger">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
                              </div>
                              <div class="modal-body">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <p class="text-center">Are You Sure Want To Delete ?</p>
                              </div>
                              <div class="modal-footer">
                                  <center>
                                      <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                      <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                                  </center>
                              </div>
                          </div>
                      </form>
                    </div>
                   </div>
        </div>
       @else
          <div class="card-body">
              <p class="text-secondary text-center h1">There is no category available.</p>
              <div class="d-flex justify-content-center mb-2">
                    <a href=" {{ route('categories.create') }} " class="btn btn-success">Add Category</a>
                </div>
          </div>
       @endif
   </div>
@endsection

@section('scripts')
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("categories.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection
