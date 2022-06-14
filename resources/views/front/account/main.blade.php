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
                <img src="{{asset( Auth::user()->image )}}"/>
                </div>

                <div class="col-12 p-margin">{{ Auth::user()->name }}</div>
                <div class="col-12 p-margin">{{ Auth::user()->phone }}</div>
                <div class="col-12 p-margin">{{ Auth::user()->email }}</div>
                <div class="col-12 p-margin">{{ Auth::user()->gender }}</div>
                <div class="col-12 p-margin">{{ Auth::user()->date_of_birth }}</div>
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

