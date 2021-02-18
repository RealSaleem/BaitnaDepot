@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{ route('admin.notification.create') }}" class="btn waves-effect waves-light green right">
                    {{__('notification.create')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h4 class="card-title"> {{__('notification.notification')}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Body </th>
                                            <th>URL</th>
                                            <th>Image</th>
                                            <th style="text-align: center;"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Notification as $Noti)
                                        <tr>
                                            <td>{{$Noti->id}}</td>
                                            <td>{{$Noti->title}}</td>
                                            <td>{{$Noti->body}}</td>
                                            <td>{{$Noti->url}}</td>


                                            <td>
                                                @if($Noti->image != null)
                                                    <img src="{{Helper::getImage($Noti->image)}}" style="width:100px;">
                                                @else
                                                    <img src="{{asset('app-assets/images/no-image.png')}}" style="width:100px">
                                                @endif

                                            </td>
                                            <td>
                                             <a href="{{ route('admin.notification.edit',$Noti->id) }}" class="waves-effect waves-light btn btn-small mb-2"><i class="Medium material-icons" style="font-size: 30px;">edit</i></a>
                                            <form action="{{ route('admin.notification.destroy',$Noti->id) }}" method="POST" class="delete-record">
                                               @method('DELETE')
                                               @csrf
                                               <button class="waves-effect waves-light red accent-2 btn "> <i class="Medium material-icons" style="font-size: 30px;">delete_forever</i></button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Body </th>
                                            <th>URL</th>
                                            <th>Image</th>
                                            <th style="text-align: center;"> Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
@section('scripts')
{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
<script>
    $(function () {
        $('#page-length-option').DataTable({
            // "responsive": true,
            // "lengthMenu": [
            //   [10, 25, 50, -1],
            //   [10, 25, 50, "All"]
            // ]
            'scrollX':true
        });
    });
</script>
<script>
    // function confirm_delete(){
    $('.delete-record').submit(function(e) {
        e.preventDefault();

        swal({
            // title: "{!! trans('toaster.confirm_delete') !!}",
            text: "{!! trans('toaster.confirm_delete') !!}",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: {
                cancel: {
                text: "{!! trans('site.cancel') !!}",
                value: false,
                visible: true,
                className: ""
              },
              confirm: {
                text: "{!! trans('site.ok') !!}",
                value: true,
                visible: true,
                className: ""
              }
            },
            closeOnClickOutside: false
        })
        .then((isConfirm) => {
            console.log(isConfirm);
          if (isConfirm) {
            this.submit();
            return true;
            // swal("Poof! Your imaginary file has been deleted!", {
            //   icon: "success",
            // });
          } else {
            return false;
            // swal("Your imaginary file is safe!");
          }
        });
    // }
    });
</script>
@endsection
