@extends('admin.layouts.app')
@section('styles')
    
@endsection
@section('content')
<div class="container">
    <section class="users-list-wrapper section">
        <div class="users-list-filter">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel">
                        <div class="row">
                            <form>
                                <div class="col s12 m6 l3">
                                    <div class="input-field">
                                        <label for="users-list-verified" class="active">{{__('vendor.status')}}</label>
                                        <select name="status">
                                            <option value="">{{__('site.all')}}</option>
                                            <option value="new" {{Request()->get('status') == 'new' ? 'selected' : null}}>{{__('contact.new')}}</option>
                                            <option value="viewed" {{Request()->get('status') == 'viewed' ? 'selected' : null}}>{{__('contact.viewed')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s12 m6 l3 display-flex align-items-center">
                                    <button type="submit" class="btn btn-block indigo waves-effect waves-light">{{__('site.show')}}</button>
                                    <a href="{{route('admin.contact_us_messages')}}" class="btn btn-block indigo waves-effect waves-light ml-3">{{__('site.reset')}}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section section-data-tables">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                        <h4 class="card-title">{{ __('contact.contact_us_messages') }}</h4>
                    </div>
                </div>
                        <div class="row">
                            <div class="col s12">
                                <table id="contact-table" class="display">
                                    <thead>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('contact.customer_name')}}</th>
                                            <th>{{__('contact.email')}}</th>
                                            <th>{{__('contact.phone')}}</th>
                                            <th>{{__('contact.status')}}</th>
                                            <th>{{__('contact.submission_date')}}</th>
                                            <th>{{__('site.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(sizeof($contactus_messages) > 0)
                                            @foreach($contactus_messages as $contactus)
                                            <tr>
                                                <td>{{$contactus->id}}</td>
                                                <td>{{$contactus->name}}</td>
                                                <td>{{$contactus->email}}</td>
                                                <td>{{$contactus->mobile}}</td>
                                                <td>{{ucwords($contactus->status)}}</td>
                                                <td>{{Helper::getFormatedDateTime($contactus->created_at)}}</td>
                                                <td>
                                                    <a href="{{route('admin.contact_us_messages.show', $contactus->id)}}" class="waves-effect waves-light btn btn-small">{{__('site.view')}}</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <td colspan="7">{{__('contact.no_message_found')}}</td>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{__('site.id')}}</th>
                                            <th>{{__('contact.customer_name')}}</th>
                                            <th>{{__('contact.email')}}</th>
                                            <th>{{__('contact.phone')}}</th>
                                            <th>{{__('contact.status')}}</th>
                                            <th>{{__('contact.submission_date')}}</th>
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
<script>
    $('#contact-table').DataTable({
        'scrollX':true
    });
</script>
@endsection