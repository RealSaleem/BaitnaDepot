@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
@endsection
@section('content')




</style>


<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{ route('admin.promo_code.create') }}" class="btn waves-effect waves-light green right">
                    {{__('vendor.generate_promo')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h4 class="card-title"> {{__('vendor.generate_promo')}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>valid From </th>
                                            <th>Valid Till</th>
                                            <th>Type</th>
                                            <th>Value</th>
                                            <th>User Allow</th>
                                            <th> Send</th>
                                            <th style="width: 15px;"> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($PromoCode as $PC)
                                            <tr>
                                                <td>{{$PC->id}}</td>
                                                <td>{{$PC->name}}</td>
                                                <td>{{$PC->valid_from}}</td>
                                                <td>{{$PC->valid_til}}</td>
                                                <td>{{$PC->type}}</td>
                                                <td>{{$PC->value}}</td>
                                                <td>{{$PC->num_of_user}}</td>
                                        <td>
                                            <select id="promo_type" name="promo_type">
                                                   <option>Action </option>
                                                   <option value="1" >Send To All  </option>
                                                   <option value="2">Send To Vendors  </option>
                                                   <option value="2">Send To Users  </option>
                                            </select>
                                        </td>

                                        <td>
                                        <a href="{{ route('admin.promo_code.edit',$PC->id) }}" class="waves-effect waves-light btn btn-small mb-2"><i class="Medium material-icons" style="font-size: 30px;">edit</i></a>
                                        <form action="{{ route('admin.promo_code.destroy',$PC->id) }}" method="POST" class="delete-record">
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
                                            <th>Name</th>
                                            <th>valid From </th>
                                            <th>Valid Till</th>
                                              <th>Type</th>
                                            <th>Value</th>
                                          
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