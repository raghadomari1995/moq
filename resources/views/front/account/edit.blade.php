@extends('layouts.app')
@section('content')
<div class="container">
    <section id="basic-horizontal-layouts " class="moq-margin">
        <div class="row match-height">
            <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item"><a class="dropdown-item" href="{{ route('my-account') }}">{{ __('My Acoount') }}</a></li>
                <li class="list-group-item"><a class="dropdown-item" href="{{ route('edit-my-account') }}">{{ __('Edit My Acoount') }}</a></li>
                <li class="list-group-item"><a class="dropdown-item" href="{{ route('my-ads') }}">{{ __('My Ads') }}</a></li>
                <li class="list-group-item"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="feather icon-power"></i> {{__('Logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form></li>

            </ul>
            </div>
            <div class="col-md-8">
                <div class="col-12 p-margin">
                <form class="form-horizontal" action="{{route('edit-my-account2')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Email')}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input  type="email" class="form-control" name="email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Name')}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="name" value="{{$user->name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Phone')}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Password')}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Image')}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <a href="{{asset($user->image)}}" target="_blank">open link</a>
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                                  
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{__('Country')}}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select onchange="getValue('country_id','city')" id="country_id" name="country_id"
                                                                    class="form-control select2">
                                                                <option selected disabled value="">Select</option>
                                                                @foreach(\App\Country::all() as $country)
                                                                    <option
                                                                        value="{{$country->id}}" {{(\App\City::find($user->city_id)->country_id == $country->id)?'selected':''}}>{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{__('City')}}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select id="city_id" name="city_id"
                                                                    class="form-control">
                                                                <option selected disabled value="">Select</option>
                                                                @if($user->city_id )
                                                                    <option selected value="{{$user->city_id}}">{{\App\City::find($user->city_id)->name}}</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                

                                            </div>
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('Save')}}</button>
                                        </div>
                                    </div>
                </div>
                </form>

                
            </div>
            
        </div>
    </section>
@endsection
@section('script')
    <script>
        function getValue(id, type) {
            $.ajax({
                url: '{{route("getSelectValue")}}',
                type: 'GET',
                data: {
                    'id': $('#' + id + ' :selected').val(),
                    'type': type
                },
                dataType: 'json',
                success: function (response) {
                    var data = response.data;
                    var target = $('#' + type + '_id');
                    switch (type) {
                        case 'city':
                            target.empty();
                            target.append('<option selected disabled>Select</option>');
                            break;
                        default:
                            target.empty();
                            break;
                    }
                    data.forEach(function (value) {
                        target.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function () {

                }

            });
        }//end getValue
    </script>
@endsection

