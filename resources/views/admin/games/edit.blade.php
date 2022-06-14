@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit  game</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.games.update',$game->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-body">
                                    <div class="row">
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name {{$locale}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control game_name" name="name[{{$locale}}]" value="{{$game->translate($locale)->name}}">
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
                                                    <input type="date" class="form-control" name="date" value="{{$game->date}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Opponent team</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="opponent_team" value="{{$game->opponent_team}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Our score <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" required id="our_score" name="our_score"
                                                           class="form-control" value="{{$game->our_score}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Opponent score <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" required id="opponent_score" name="opponent_score"
                                                           class="form-control" value="{{$game->opponent_score}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Completed <strong class="text-danger">*</strong></span>
                                                </div>
{{--                                                <input type="hidden" name="group_id" value="{{$game->group_id}}">--}}
{{--                                                <input type="hidden" name="city_id" value="{{$game->city_id}}">--}}
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="completed" value="true" {{($game->completed == 'true')?'checked':''}}>
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
                                                                    <input type="radio" name="completed" value="false" {{($game->completed == 'false')?'checked':''}}>
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
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-responsive table-bordered text-center">
                                                        <thead class="thead-dark">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th colspan="2">IN</th>
                                                            <th colspan="2">OUT</th>
                                                            <th >Goals</th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th>Minute</th>
                                                            <th>Second</th>
                                                            <th>Minute</th>
                                                            <th>Second</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($game->group->players as $user)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{\Illuminate\Support\Str::words($user->name,3)}}</td>
                                                                <td><input type="number" name="in_minute[]" class="form-control" value="{{$user->play_minutes()->where('game_id',$game->id)->first()?->in_minute}}"></td>
                                                                <td><input type="number" name="in_second[]" class="form-control" value="{{$user->play_minutes()->where('game_id',$game->id)->first()?->in_second}}"></td>
                                                                <td><input type="number" name="out_minute[]" class="form-control" value="{{$user->play_minutes()->where('game_id',$game->id)->first()?->out_minute}}"></td>
                                                                <td><input type="number" name="out_second[]" class="form-control" value="{{$user->play_minutes()->where('game_id',$game->id)->first()?->out_second}}"></td>
                                                                <td><input type="number" name="goals[]" class="form-control" value="{{$user->play_minutes()->where('game_id',$game->id)->first()?->goals}}"></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
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

