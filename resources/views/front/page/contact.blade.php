@extends('layouts.app')
@section('content')
<div class="container">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            
            <div class="col-md-8">
                <div class="">
                    <div class="-header">
                        <h4 class="card-title">{{__('Contact Us')}} </h4>
                    </div>
                    <div class="-content">
                        <div class="form-body">
                            <form class="form form-" action="" method="POST" enctype="multipart/form-data">
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
                                                        <span>{{__('Email')}} </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>{{__('Phone')}} </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>{{__('Message')}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea required  class="form-control" id="des" name="des"></textarea>
                                                </div>
                                            </div>
                                            </div>



                                        
                                            
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">{{__('Send')}}</button>
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

