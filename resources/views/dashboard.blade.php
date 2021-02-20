@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="container">
            @section('heading')
                {{ __('Welcome to Dashboard') }}
            @endsection
            <div class="section">
                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>
@endsection
