@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-end mb-2">
       <a href=" {{ route('posts.create') }} " class="btn btn-success">Add Post</a>
   </div>
   <div class="card card-default">
       <div class="card card-header text-center">Posts</div>
       @if (count($posts) > 0)
       <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                             <td>{{$post->title}}</td>
                             <td>
                                 <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
                             </td>
                             <td>
                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$post->id}})"
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
                                  <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title text-center">DELETE POST</h4>
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
              <p class="text-secondary text-center h1">There is no post available.</p>
              <div class="d-flex justify-content-center mb-2">
                    <a href=" {{ route('posts.create') }} " class="btn btn-success">Add Post</a>
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
        var url = '{{ route("posts.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection
