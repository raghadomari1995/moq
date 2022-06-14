@extends('layouts.app')
@section('content')
<div class="container">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            
            <div class="col-md-8">
                <div class="">
                    <div class="-header">
                        <h4 class="card-title">{{__('Add new')}} </h4>
                    </div>
                    <div class="-content">
                        <div class="form-body">
                            <form class="form form-" action="{{route('addads')}}" method="POST" enctype="multipart/form-data">
                                <input required type="hidden" class="form-control game_name" name="user_id" value="{{ Auth::user()->id }}">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Name')}} </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Price')}} </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="price" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Year')}} </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="year" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Color')}} </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="color" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('City')}} <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select required onchange="getValue('country_id','city')" id="city_id" name="city_id"
                                                                class="form-control ">
                                                            <option selected disabled value="">Select</option>
                                                            @foreach(\App\City::all() as $country)
                                                                <option
                                                                    value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Region')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" id="region" name="region">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Image')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="file" class="form-control" id="image" name="image">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Status')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="status2"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            <option value="1">New</option>
                                                            <option value="2">Used</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Type')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="type"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            <option value="1">Sale</option>
                                                            <option value="2">Swap</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Category')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="category_id"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            @foreach (\App\Category::all() as $cat )
                                                                <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Descrption')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea required  class="form-control" id="des" name="des"></textarea>
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
                </div>
            </div>
            <div class="col-md-4"></div>
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

