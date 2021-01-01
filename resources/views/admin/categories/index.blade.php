@extends('admin.layouts.app')
@section('content')
<div class="container">
    {{-- <div class="row">
        <div class="col s12 m12 l12">
            <div class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">
                        <a class="waves-effect waves-light btn float-right">button</a>
                    </h4>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h4 class="card-title">{{ __('category.categories') }}</h4>
                                <h4 class="card-title">
                                    <a href="{{ route('admin.categories.create') }}" class="waves-effect waves-light green btn float-right mb-2">{{__('site.add_new')}}</a>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            @foreach(Config::get('app.locales') as $key => $value)
                                                <th>{{__('site.name_'.$key)}}</th>
                                            @endforeach
                                            <th>{{__('category.parent_category')}}</th>
                                            <th>{{__('category.type')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($categories) > 0)
                                            @foreach($categories as $category)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                @foreach(Config::get('app.locales') as $key => $value)
                                                    <td>{{$category->getTranslation('name', $key)}}</td>
                                                @endforeach    
                                                <td>{{$category->parent['name']}}</td>
                                                <td>{{$category->type}}</td>
                                                <td>
                                                    <a href="{{route('admin.categories.show', $category->id)}}" class="waves-effect waves-light btn btn-small">{{__('site.view')}}</a>
                                                    <br> <br>
                                                    <a href="{{ route('admin.categories.edit',$category->id) }}" class="waves-effect waves-light btn btn-small">{{__('site.edit')}}</a>
                                                    <br> <br>
                                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="waves-effect waves-light red btn btn-small">{{__('site.delete')}}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="5">No category found</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            @foreach(Config::get('app.locales') as $key => $value)
                                                <th>{{__('site.name_'.$key)}}</th>
                                            @endforeach
                                            <th>{{__('category.parent_category')}}</th>
                                            <th>{{__('category.type')}}</th>
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