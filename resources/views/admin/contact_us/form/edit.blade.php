@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div id="Form-advance" class="card card card-default scrollspy">
                    <div class="card-content">
                        <h4 class="card-title">{{ __('contactus.contactus') }}</h4>
                        <form method="post" action="{{ route('admin.ContactUsDetails.update',$GetContactUsDetail->id) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            @include('admin.contact_us.form.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
