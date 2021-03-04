@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')
<div class="container">
    @section('heading')
        {{__('promote.promote-requests')}}
    @endsection
    <div class="section section-data-tables">

        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                         <tr>
                                            <th>{{__('promote.id')}}</th>
                                            <th>{{__('promote.name')}}</th>
                                            <th>{{__('promote.promote-on')}}</th>
                                            <th>{{__('promote.from')}}</th>
                                            <th>{{__('promote.to')}}</th>
                                             <th>{{__('promote.status')}}</th>
                                            <th style="text-align: center;"> {{__('promote.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          @if($Promote)
                                        @foreach($Promote as $P)

                                        <tr>
                                            <td>{{$P->id}}</td>
                                            <td>{{$P->vendor->name_en}}</td>
                                            <td>{{$P->Promote_On}}</td>
                                            <td>{{$P->Date_From}}</td>
                                            <td>{{$P->Date_To}}</td>
                                            <td>{{App\Helpers\Helper::getPromoteStatus($P->Promote_Status)}} </td>

                                            <td style="text-align: center;" >
                                                <!-- Dropdown Trigger -->
                                                <a class='dropdown-trigger' href='#' data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

                                            </td>
                                            <ul id='dropdown1' class='dropdown-content' style="width: 200px;">
                                                <li><a href="{{url('admin/Promote_edit/'.$P->id)}}"><i class="Medium material-icons" style="font-size: 30px;">edit</i> {{__('promote.edit')}}</a></li>
                                                <li><a href="{{url('admin/approve_promote/'.$P->id)}}"><i class="Medium material-icons" style="font-size: 30px;">done_all</i> {{__('promote.approve')}}</a></li>
                                                <li> <a href="{{url('admin/decline_promote/'.$P->id)}}"><i class="Medium material-icons" style="font-size: 30px;">cancel</i> {{__('promote.decline')}}</a></li>
                                            </ul>


                                        </tr>

                                        @endforeach
                                        @endif
<!--  -->

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>{{__('promote.id')}}</th>
                                        <th>{{__('promote.name')}}</th>
                                        <th>{{__('promote.promote-on')}}</th>
                                        <th>{{__('promote.from')}}</th>
                                        <th>{{__('promote.to')}}</th>
                                        <th>{{__('promote.status')}}</th>
                                        <th style="text-align: center;"> {{__('promote.action')}}</th>
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
