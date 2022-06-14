@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.advertising.update',$player->id)}}" method="POST" enctype="multipart/form-data">
                                <input required type="hidden" class="form-control game_name" name="user_id" value="{{ Auth::user()->id }}">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required value="{{ $player->name }}" type="text" class="form-control game_name" name="name" placeholder="name ">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Price </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required value="{{ $player->price }}" type="text" class="form-control game_name" name="price" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Year </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" value="{{ $player->year }}" class="form-control game_name" name="year" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Color </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" value="{{ $player->color }}" class="form-control game_name" name="color" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>City <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select required  id="city_id" name="city_id"
                                                                class="form-control select2">
                                                            <option selected disabled value="">Select</option>
                                                            @foreach(\App\City::all() as $country)
                                                                <option @if($player->city_id == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                               <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Region <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" value="{{$player->region}}" class="form-control" id="region" name="region">
                                                </div>
                                            </div>
                                                
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Image <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input  type="file" class="form-control" id="image" name="image">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Status <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="status2"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            <option @if($player->status2 == '1')selected @endif value="1">New</option>
                                                            <option @if($player->status2 == '2')selected @endif value="2">Used</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Type <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="type"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            <option @if($player->type == '1')selected @endif value="1">Sale</option>
                                                            <option @if($player->type == '2')selected @endif value="2">Swap</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Category <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="category_id"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            @foreach (\App\Category::all() as $cat )
                                                                <option @if($player->category_id == $cat->id )selected @endif  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Descrption <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required value="{{ $player->des }}" type="text" class="form-control" id="des" name="des">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Status <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="status"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            <option @if($player->status == '1')selected @endif value="1">Active</option>
                                                            <option @if($player->status == '2')selected @endif value="2">Inactive</option>
                                                            <option @if($player->status == '3')selected @endif value="3">Pending</option>
                                                            <option @if($player->status == '4')selected @endif value="4">Canceled</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Reject Note <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input  value="{{ $player->note }}" type="text" class="form-control" id="note" name="note">
                                                </div>
                                            </div>

                                            </div>



                                        
                                            
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

