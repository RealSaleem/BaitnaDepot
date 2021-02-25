@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{ __('ads.advertisement_banners') }}
    @endsection
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s2 right">
                <!-- New kanban board add button -->

                <a href="{{ route('admin.advertisements.create') }}" class="btn btn-primary"><i class="material-icons left">add</i>
                    {{__('site.add_new')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">

                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('site.title_en')}}</th>
                                            <th>{{__('site.title_ar')}}</th>
                                            <th>{{__('site.image')}}</th>
                                            <th>{{__('site.sort_order')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($advertisements) > 0)
                                            @foreach($advertisements as $advertisement)
                                            <tr>
                                                <td>{{$advertisement->id}}</td>
                                                <td>{{$advertisement->title_en}}</td>
                                                <td>{{$advertisement->title_ar}}</td>
                                                <td>
                                                    @if($advertisement->image != null)
                                                        <img src="{{$advertisement->image}}" style="width:100px;">
                                                    @else
                                                        <img src="{{asset('app-assets/images/no-image.png')}}" style="width:100px">
                                                    @endif
                                                </td>
                                                <td>{{$advertisement->sort}}</td>

                                                <td style="text-align: center;">
                                                    <!-- Dropdown Trigger -->
                                                    <a class="dropdown-trigger" href="#" data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

                                                </td>
                                                <ul id="dropdown1" class="dropdown-content">
                                                    <li><a href="{{ route('admin.advertisements.edit',$advertisement->id) }}"><i class="Small material-icons">edit</i> {{__('site.edit')}}</a></li>
                                                    <form action="{{route('admin.advertisements.destroy', $advertisement->id)}}" method="POST" id="delete-row-{{$advertisement->id}}" class="hide">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="waves-effect waves-light red accent-2 btn btn-small mb-2 hide">{{__('site.delete')}}</button>
                                                    </form>

                                                    <li class="divider" tabindex="-1"></li>
                                                    <li>
                                                        <a href="javascript:;" data-value="{{$advertisement->id}}" type="submit" class="delete-record"><i class=" material-icons">delete_forever</i> {{__('site.delete')}}</a>
                                                    </li>
                                                </ul>




                                            </tr>
                                            @endforeach
                                        @else
                                        <td colspan="4">{{ __('site.no_record_found') }}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('site.title_en')}}</th>
                                            <th>{{__('site.title_ar')}}</th>
                                            <th>{{__('site.image')}}</th>
                                            <th>{{__('site.sort_order')}}</th>
                                            <th>{{__('site.actions')}}</th>
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
    $(function() {
        $('#page-length-option').DataTable({
            // "responsive": true,
            // "lengthMenu": [
            //   [10, 25, 50, -1],
            //   [10, 25, 50, "All"]
            // ]
            'scrollX': true
        });
    });
</script>
<script>
    // function confirm_delete(){
    $('.delete-record').click(function(e) {
        e.preventDefault();
        var rowId = $(this).attr('data-value');
        console.log(rowId);
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
                    // this.submit();
                    $('#delete-row-' + rowId).submit();
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
