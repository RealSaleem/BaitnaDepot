@extends('layouts.app')
@section('content')
<div class="container">
    @section('heading')
        {{__('promote.submit')}}
    @endsection
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    @if(Session::has('Success'))
                    <div class="Alert alert-success">
                        {{Session::get('Success')}}
                    </div>
                    @endif
                    <div class=" row pt-4">

                        <div class="col s12">

                            @if(isset($check) ? $check->Promote_Status == 1 : NULL )
                            <div class="Alert alert-danger center mb-4 card pb-2 pt-2" style="color: forestgreen;font-size: 24px; ">
                                <p> Promotion period will expire on {{$check->Date_To}} </p>
                            </div>
                            @endif
                            @if(isset($check) ? $check->Promote_Status !== 0 : true )
                            <form action="{{url('/promote_me')}}" method="post">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="row input-field col s4 m8 l4 h-100">
                                        <select name="PromoteOn" data-placeholder="{{__('product.select_colors')}}" class="
                                            form-control" id="multiple-select2-icons">
                                            <option value="">{{__('promote.promote-to')}} </option>
                                            <option value="1">Top-1</option>
                                            <option value="2">Top-2</option>
                                            <option value="3">Top-3</option>
                                        </select>
                                        @if($errors->has('PromoteOn'))
                                        <small class="errorTxt">
                                            <div class="error mt-1">{{ $errors->first('PromoteOn') }}</div>
                                        </small>
                                        @endif
                                    </div>
                                    <div class="input-field col m4 s4 h-100">
                                        <input id="From" type="date" name="DateFrom" min="{{date('Y-m-d')}}">
                                        <label for="From">{{__('promote.pro-from')}} :</label>

                                        @if($errors->has('DateFrom'))
                                        <small class="errorTxt">
                                            <div class="error mt-1">{{ $errors->first('DateFrom') }}</div>
                                        </small>
                                        @endif
                                    </div>
                                    <div class="input-field col m4 s4 h-100">
                                        <input id="To" type="date" name="DateTo" min="{{date('Y-m-d', strtotime('+1 day'))}}">
                                        <label for="To">{{__('promote.pro-till')}} :</label>
                                        @if($errors->has('DateTo'))
                                        <small class="errorTxt">
                                            <div class="error mt-1">{{ $errors->first('DateTo') }}</div>
                                        </small>
                                        @endif
                                    </div>
                                </div>
                                <button class="btn cyan waves-effect waves-light right mb-2 mr-4" type="submit" name="submit">{{__('promote.submit')}}</button>
                            </form>
                            @else
                            <div class="Alert alert-danger center mb-4 card pb-2 pt-2" style="color: forestgreen;font-size: 24px; ">
                                <p> You Are Already Applied for promote, You will be informed if ADMIN approve your request</p>
                            </div>
                            @endif
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
