@extends('layouts.app')
@section('content')
<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{ route('admin.categories.create') }}" class="btn waves-effect waves-light green right">
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
                                <h4 class="card-title">{{ __('category.categories') }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('site.name_en')}}</th>
                                            <th>{{__('site.name_ar')}}</th>
                                            <th>{{__('category.parent_category')}}</th>
                                            <th>{{__('category.type')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($categories) > 0)
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name_en}}</td>
                                                <td>{{$category->name_ar}}</td>
                                                <td>{{$category->parent != null ? $category->parent->getLocaleName() : null}}</td>
                                                <td>{{$category->type}}</td>
{{--                                                <td>--}}
{{--                                                    <a href="{{route('admin.categories.show', $category->id)}}" class="waves-effect waves-light btn btn-small mb-2">{{__('site.view')}}</a>--}}
{{--                                                    <a href="{{ route('admin.categories.edit',$category->id) }}" class="waves-effect waves-light btn btn-small mb-2">{{__('site.edit')}}</a>--}}
{{--                                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" class="delete-record">--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="waves-effect waves-light red accent-2 btn btn-small mb-2">{{__('site.delete')}}</button>--}}
{{--                                                    </form>--}}
{{--                                                </td>--}}






                                                <td style="text-align: center;">
                                                    <!-- Dropdown Trigger -->
                                                    <a class="dropdown-trigger" href="#" data-target='dropdown1'><i class="Small material-icons" style="font-size: 30px;">list</i></a>

                                                </td>
                                                <ul id="dropdown1" class="dropdown-content">
                                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" id="delete-row-{{$category->id}}" class="hide">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="waves-effect waves-light red accent-2 btn btn-small mb-2  hide">{{__('site.delete')}}</button>
                                                    </form>
                                                    <li><a href="{{ route('admin.categories.show', $category->id) }}"><i class="Small material-icons">visibility</i> {{__('site.edit')}}</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li><a href="{{ route('admin.categories.edit',$category->id) }}"><i class="Small material-icons">edit</i> {{__('site.edit')}}</a></li>
                                                    <li class="divider" tabindex="-1"></li>
                                                    <li>
                                                        <a href="javascript:;" data-value="{{$category->id}}" type="submit" class="delete-record"><i class=" material-icons">delete_forever</i> {{__('site.delete')}}</a>
                                                    </li>
                                                </ul>


                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="6">{{ __('site.no_record_found') }}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('site.name_en')}}</th>
                                            <th>{{__('site.name_ar')}}</th>
                                            <th>{{__('category.parent_category')}}</th>
                                            <th>{{__('category.type')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        {{-- $categories->links('pagination.default') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
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
