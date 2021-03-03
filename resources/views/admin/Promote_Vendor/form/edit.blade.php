@extends('layouts.app')
@section('content')
    <div class="container">
        @section('heading')
            {{ __('Edit Promote Request') }}
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
                                <form action="{{Route('admin.UpdatePromote')}}" method="post" >
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <input type="hidden"  value="{{$Promote->id}}" name="Promote_id">

                                        <div class="row input-field col s4 m8 l4 h-100">
                                            <select name="PromoteOn" data-placeholder="{{__('product.select_colors')}}" class="
                                            form-control" id="multiple-select2-icons"  >
                                                <option  value="{{$Promote->Promote_On}}" selected >Top-{{$Promote->Promote_On}}</option>
                                                <option  value=""  >Promoted To </option>
                                                <option  value="1"  >Top-1</option>
                                                <option  value="2"  >Top-2</option>
                                                <option  value="3"  >Top-3</option>
                                            </select>
                                            @if($errors->has('PromoteOn'))
                                                <small class="errorTxt">
                                                    <div class="error mt-1">{{ $errors->first('PromoteOn') }}</div>
                                                </small>
                                            @endif
                                        </div>

                                        <div class="input-field col m4 s4 h-100">
                                            <input id="From" type="date" name="DateFrom" value="{{$Promote->Date_From}}" >
                                            <label for="From">From :</label>

                                            @if($errors->has('DateFrom'))
                                                <small class="errorTxt">
                                                    <div class="error mt-1">{{ $errors->first('DateFrom') }}</div>
                                                </small>
                                            @endif
                                        </div>



                                        <div class="input-field col m4 s4 h-100">
                                            <input id="To" type="date" name="DateTo" value="{{$Promote->Date_To}}" >
                                            <label for="To">To :</label>

                                            @if($errors->has('DateTo'))
                                                <small class="errorTxt">
                                                    <div class="error mt-1">{{ $errors->first('DateTo') }}</div>
                                                </small>
                                            @endif
                                        </div>

                                    </div>



                                    <button class="btn cyan waves-effect waves-light right mb-2 mr-4" type="submit" name="submit">Update</button>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
