@extends('layouts.app')
@section('styles')
<style>
input:not([type]), input[type=text]:not(.browser-default), input[type=password]:not(.browser-default), input[type=email]:not(.browser-default), input[type=url]:not(.browser-default), input[type=time]:not(.browser-default), input[type=date]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=number]:not(.browser-default), input[type=search]:not(.browser-default), textarea.materialize-textarea {

    border-bottom:none !important;   
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <div id="centered-table" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">{{ __('working_hours.main') }}</h4>
                    <form method="POST" action="{{route('update_contractor_working_hours')}}">
                        @csrf
                        <input type="hidden" name="vendor_id" value="{{$vendor_id}}">
                        <table class="bordered responsive-table centered">
                            <th>Day</th>
                            <th>Status</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        @foreach($working_times as $working_time)
                            <input type="hidden" name="working_hours[hour_row_ids][]" value="{{$working_time->id}}">
                            <tr>
                                <td style="width:25%;">
                                    <input type="text" value="{{ $working_time->day->getLocaleName() }}" readonly>
                                </td>
                                <td style="width:25%;">
                                    <select name="working_hours[status][]">
                                        <option value="0">{{ __('working_hours.closed') }}</option>
                                        <option value="1">{{ __('working_hours.open') }}</option>
                                    </select>
                                </td>
                                <td style="width:25%;">
                                    <input type="time" name="working_hours[start_times][]">
                                </td>
                                <td style="width:25%;">
                                    <input type="time" name="working_hours[end_times][]">
                                </td>
                            </tr>
                        @endforeach
                        </table>
                        {{--  @foreach($working_times as $working_time)
                        <div class="row">
                            <div class="input-field col m3 s3">
                                <input type="text" name="{{$working_time->day->name_en}}" value="{{ $working_time->day->getLocaleName() }}" readonly>
                            </div>
                            <div class="input-field col m3 s3">
                                <select name="status[]">
                                    <option value="0">{{ __('working_hours.closed') }}</option>
                                    <option value="1">{{ __('working_hours.open') }}</option>
                                </select>
                            </div>
                            <div class="input-field col m3 s3">
                                <input type="time" name="start_time[]">
                                <label for="start_time" class="active">{{ __('working_hours.start_time') }}</label>
                            </div>
                            <div class="input-field col m3 s3">
                                <input type="time" name="end_time[]">
                                <label for="end_time">{{ __('working_hours.end_time') }}</label>
                            </div>
                        </div> 
                        @endforeach --}}
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