@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="section section-data-tables">
       
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h4 class="card-title">Vendor Promote Requests</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                         <tr>
                                            <th>ID</th>
                                            <th>Vendor Name</th>
                                            <th>Promote On </th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th style="text-align: center;"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          @if($Promote)
                                        @foreach($Promote as $P)
                                            
                                        <tr>
                                            <td>{{$P->id}}</td>
                                            <td>{{$P->User->name}}</td>
                                            <td>{{$P->Promote_On}}</td>
                                            <td>{{$P->Date_From}}</td>
                                            <td>{{$P->Date_To}}</td>

                                            <td style="text-align: center;">
                                                <a href="#" class="waves-effect waves-light btn btn-small">Approve</a>
                                                <a href="#" class="waves-effect waves-light red accent-2 btn btn-small">Decline</a>

                                            </td>


                                        </tr>
                                       
                                        @endforeach
                                        @endif
<!--  -->
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vendor Name</th>
                                            <th>Promote On </th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th style="text-align: center;"> Action</th>
                                        </tr>
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