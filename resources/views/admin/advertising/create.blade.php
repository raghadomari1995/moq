@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.advertising.store')}}" method="POST" enctype="multipart/form-data">
                                <input required type="hidden" class="form-control game_name" name="user_id" value="{{ Auth::user()->id }}">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name" placeholder="name ">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Price </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="price" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Year </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="year" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Color </span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="color" placeholder=" ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Country <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select required onchange="getValue('country_id','city')" id="country_id" name="country_id"
                                                                class="form-control select2">
                                                            <option selected disabled value="">Select</option>
                                                            @foreach(\App\Country::all() as $country)
                                                                <option
                                                                    value="{{$country->id}}">{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>City <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select required id="city_id" name="city_id"
                                                                class="form-control">
                                                            <option selected disabled value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Image <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="file" class="form-control" id="image" name="image">
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
                                                            <option value="1">New</option>
                                                            <option value="2">Used</option>
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
                                                            <option value="1">Sale</option>
                                                            <option value="2">Swap</option>
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
                                                                <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Descrption <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" id="des" name="des">
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

