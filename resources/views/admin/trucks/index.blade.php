@extends('admin.layouts.app')
@section('styles')
    
@endsection
@section('content')
<div class="container">
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12">
                <!-- New kanban board add button -->
                <a href="{{route('admin.heavy_trucks.create')}}" class="btn waves-effect waves-light green right">
                    {{__('site.add_new')}}
                </a>
                <!-- kanban container -->
                <div id="kanban-app"></div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s6">
                                <div class="card-title">
                                    {{__('truck.main')}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="page-length-option" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            @foreach(Config::get('app.locales') as $key => $value)
                                                <th>{{__('truck.name_'.$key)}}</th>
                                            @endforeach
                                            <th>{{__('truck.created_date')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($trucks) > 0)
                                            @foreach($trucks as $truck)
                                            <tr>
                                                <td>{{$truck->id}}</td>
                                                @foreach(Config::get('app.locales') as $key => $value)
                                                    <td>{{$truck->getTranslation('name', $key)}}</td>
                                                @endforeach  
                                                <td>{{Helper::getFormatedDateTime($truck->created_at)}}</td>
                                                <td> 
                                                    <span style="display: flex;">
                                                        <a href="{{route('admin.heavy_trucks.edit', $truck->id)}}" class="waves-effect waves-light btn btn-small">{{__('site.edit')}}</a>
                                                        <form action="{{route('admin.heavy_trucks.destroy', $truck->id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="waves-effect waves-light red btn btn-small ml-5">{{__('site.delete')}}</button>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="4">{{__('truck.no_truck_found')}}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            @foreach(Config::get('app.locales') as $key => $value)
                                                <th>{{__('truck.name_'.$key)}}</th>
                                            @endforeach
                                            <th>{{__('truck.created_date')}}</th>
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