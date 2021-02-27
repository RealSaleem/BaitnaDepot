@extends('layouts.app')
@section('styles')
<style>
    input:not([type]),
    input[type=text]:not(.browser-default),
    input[type=password]:not(.browser-default),
    input[type=email]:not(.browser-default),
    input[type=url]:not(.browser-default),
    input[type=time]:not(.browser-default),
    input[type=date]:not(.browser-default),
    input[type=datetime]:not(.browser-default),
    input[type=datetime-local]:not(.browser-default),
    input[type=tel]:not(.browser-default),
    input[type=number]:not(.browser-default),
    input[type=search]:not(.browser-default),
    textarea.materialize-textarea {

        border-bottom: none !important;
    }
</style>
@endsection
@section('content')
<div class="container">
    @section('heading')
    {{ __('working_hours.main') }}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="centered-table" class="card card card-default scrollspy">
                <div class="card-content">
                    <form method="POST" action="{{route('update_contractor_working_hours')}}">
                        @csrf
                        <input type="hidden" name="vendor_id" value="{{$vendor_id}}">
                        <table class="bordered responsive-table centered">
                            <thead>
                                <th>{{__('working_hours.day')}}</th>
                                <th>{{__('working_hours.status')}}</th>
                                <th>{{__('working_hours.start_time')}}</th>
                                <th>{{__('working_hours.end_time')}}</th>
                            </thead>
                            @foreach($working_times as $working_time)
                            <input type="hidden" name="hour_row_ids[]" value="{{$working_time->id}}">
                            <tr>
                                <td style="width:25%;">
                                    <input type="text" value="{{ $working_time->day->getLocaleName() }}" readonly>
                                </td>
                                <td style="width:25%;">
                                    <select name="status[]">
                                        <option value="{{AppConstant::CLOSE}}" {{$working_time->status == 0 ? 'selected' : ''}}>{{ __('working_hours.closed') }}</option>
                                        <option value="{{AppConstant::OPEN}}" {{$working_time->status == 1 ? 'selected' : ''}}>{{ __('working_hours.open') }}</option>
                                    </select>
                                </td>
                                <td style="width:25%;">
                                    <input type="time" name="start_times[]" value="{{$working_time->start_time}}">
                                </td>
                                <td style="width:25%;">
                                    <input type="time" name="end_times[]" value="{{$working_time->end_time}}">
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit">{{ __('site.save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection