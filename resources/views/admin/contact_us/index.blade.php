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
                    <a href="{{ route('admin.ContactUsDetails.create') }}" class="btn waves-effect waves-light green right">
                        {{__('contactus.add')}}
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col s12">
            <div class="container">
                <div>
                    <h5>Contact Us details :</h5>
                </div>
                <!-- users view start -->
                <div class="section users-view">
                    <!-- users view card details start -->
                    <div class="card">
                        @foreach($ContactUsDetails as $CUD)
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12">
                                    <table class="striped">
                                        <tbody>



                                        <tr>
                                            <th>ID</th>
                                            <td class="users-view-username">{{$CUD->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td class="users-view-name">{{$CUD->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile </th>
                                            <td class="users-view-email">{{$CUD->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{$CUD->address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Facebook</th>
                                            <td>{{ucwords($CUD->facebook)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Instagram</th>
                                            <td>{{ucwords($CUD->instagram)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Twitter</th>
                                            <td>{{ucwords($CUD->twitter)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Snapchat</th>
                                            <td>{{ucwords($CUD->snapchat)}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.ContactUsDetails.edit',$CUD->id) }}" class="waves-effect waves-light btn btn-small mb-2"><i class="Medium material-icons" style="font-size: 30px;">edit</i></a>
                                            </td>
                                            <td style="float: right;">
                                                <form action="{{ route('admin.ContactUsDetails.destroy',$CUD->id) }}" method="POST" class="delete-record">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="waves-effect waves-light red accent-2 btn "> <i class="Medium material-icons" style="font-size: 30px;">delete_forever</i></button>
                                                </form>
                                            </td>
                                        </tr>










                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                @endforeach
                    <!-- users view card details ends -->
                </div>
                <!-- users view ends -->
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
