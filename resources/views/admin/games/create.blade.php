@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new game</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.games.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name {{$locale}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name[{{$locale}}]" placeholder="name {{$locale}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Date</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="date" class="form-control" name="date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Opponent team</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="opponent_team">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Game Groups</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="group_id" class="form-control">
                                                        <option selected disabled value="">Select</option>
                                                        @foreach(\App\Group::all() as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
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
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Area <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" required id="area" name="area"
                                                                class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Address <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" required id="address" name="address"
                                                                class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Our score <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" required id="our_score" name="our_score"
                                                                class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Opponent score <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" required id="opponent_score" name="opponent_score"
                                                                class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Completed <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con vs-radio-success">
                                                                        <input type="radio" name="completed" value="true">
                                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                                        <span class="">Completed</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con vs-radio-success">
                                                                        <input type="radio" name="completed" value="false">
                                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                                        <span class="">not completed</span>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                         </ul>
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

