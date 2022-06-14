@extends('admin.layouts.master')
@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                            <i class="feather icon-clock mr-25"></i><span class="d-none d-sm-block">Play Minutes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="subscriptions-tab" data-toggle="tab" href="#subscriptions" aria-controls="information" role="tab" aria-selected="false">
                            <i class="feather icon-dollar-sign mr-25"></i><span class="d-none d-sm-block">Subscriptions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="reports-tab" data-toggle="tab" href="#reports" aria-controls="information" role="tab" aria-selected="false">
                            <i class="feather icon-save mr-25"></i><span class="d-none d-sm-block">Medical reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="attendance-tab" data-toggle="tab" href="#attendance" aria-controls="attendance" role="tab" aria-selected="false">
                            <i class="feather icon-activity mr-25"></i><span class="d-none d-sm-block">Attendance</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="attendance-tab" data-toggle="tab" href="#notes" aria-controls="notes" role="tab" aria-selected="false">
                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Notes</span>
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit media object start -->
                        <div class="media mb-2">
                            <a class="mr-2 my-25" href="#">
                                <img src="{{asset($player->image)}}" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                            </a>
                            <div class="media-body mt-50">
                                <h4 class="media-heading">{{$player->name}}</h4>
                            </div>
                        </div>
                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form method="post" action="{{route('admin.players.update',$player->id)}}" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{$player->email}}" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Full Name</label>
                                            <input required type="text" class="form-control" value="{{$player->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Phone</label>
                                            <input required type="text" class="form-control" value="{{$player->phone}}" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Legal Gurdian Full Name</label>
                                            <input required type="text" class="form-control" value="{{$player->guardian_name}}" name="guardian_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select onchange="getValue('country_id','city')" id="country_id" name="country_id"
                                                class="form-control select2">
                                            <option disabled value="">Select</option>
                                            @foreach(\App\Country::all() as $country)
                                                <option
                                                    value="{{$country->id}}" {{($player->country_id == $country->id)?'selected':''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Neighborhood</label>
                                            <input required type="text" class="form-control" value="{{$player->neighborhood}}" name="neighborhood">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Any Allergies?</label>
                                            <textarea  class="form-control" name="allergies">{{$player->allergies}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <input required type="date" class="form-control" value="{{$player->date_of_birth}}" name="date_of_birth">
                                    </div>
                                    <div class="form-group">
                                        <label>School name</label>
                                        <input required type="text" class="form-control" value="{{$player->school_name}}" name="school_name">
                                    </div>
                                    <div class="form-group">
                                        <label>In Case Of Emergency Contact Name</label>
                                        <input required type="text" class="form-control" value="{{$player->emergency_contact_name}}" name="emergency_contact_name">
                                    </div>
                                    <div class="form-group">
                                        <label>In Case Of Emergency Contact Number</label>
                                        <input required type="text" class="form-control" value="{{$player->emergency_contact_number}}" name="emergency_contact_number">
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender"
                                                class="form-control" required>
                                            <option selected disabled value="">Select</option>
                                            <option value="male" {{($player->gender == 'male')?'selected':''}}>male</option>
                                            <option value="female" {{($player->gender == 'female')?'selected':''}}>female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select id="city_id" name="city_id"
                                                class="form-control">
                                            <option selected disabled>{{trans('sidebar.select')}}</option>
                                            @if($player->city_id )
                                                <option selected value="{{$player->city_id}}">{{\App\City::find($player->city_id)->name}}</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Any Medical Conditions?</label>
                                        <textarea  class="form-control" name="medical_conditions">{{$player->medical_conditions}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>How Did You hear about {{setting('website_title',app()->getLocale())}}</label>
                                        <input required type="text" class="form-control" name="hear_about_us" value="{{$player->hear_about_us}}">
                                    </div>


                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                        Changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                    <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                        <!-- users edit Info form start -->
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Game</th>
                                        <th colspan="2">IN</th>
                                        <th colspan="2">OUT</th>
                                        <th>Coach</th>
                                        <th>Date</th>
                                        <th>Total minutes</th>
                                        <th>Total Goals</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Minute</th>
                                        <th>Second</th>
                                        <th>Minute</th>
                                        <th>Second</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $total_minutes = 0;
                                    $total_seconds = 0;
                                    @endphp
                                    @foreach($player->play_minutes as $play_minute)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$play_minute->game->name}}</td>
                                            <td>{{$play_minute->in_minute}}</td>
                                            <td>{{$play_minute->in_second}}</td>
                                            <td>{{$play_minute->out_minute}}</td>
                                            <td>{{$play_minute->out_second}}</td>
                                            @php
                                                $total = calcMinutes($play_minute->in_minute,$play_minute->in_second,$play_minute->out_minute,$play_minute->out_second);
                                                $calc_total = calcTotal($total_minutes,$total_seconds,$total['minutes'],$total['seconds']);
                                                $total_minutes = $calc_total['minutes'];
                                                $total_seconds = $calc_total['seconds'];
                                             @endphp
                                            <td>{{$play_minute->game->user->name}}</td>
                                            <td>{{$play_minute->game->created_at->format('Y-m-d')}}</td>
                                            <td>{{$total['minutes'].':'.$total['seconds']}}</td>
                                            <td>{{$play_minute->goals}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="6"><strong>Total Played</strong></th>
                                            <th colspan="3" class="text-success"><strong>{{$total_minutes.':'.$total_seconds}}</strong></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- users edit Info form ends -->
                    </div>
                    <div class="tab-pane" id="subscriptions" aria-labelledby="subscriptions-tab" role="tabpanel">
                        <!-- users edit Info form start -->
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($player->subscriptions as $sub)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sub->start_date}}</td>
                                            <td>{{$sub->end_date}}</td>
                                            <td>
                                                @if(\Carbon\Carbon::parse($sub->start_date) <= \Carbon\Carbon::now() && \Carbon\Carbon::parse($sub->end_date) >= \Carbon\Carbon::now())
                                                    <div class="badge badge-success mr-1 mb-1">
                                                        <i class="feather icon-check"></i>
                                                        <span>Active</span>
                                                    </div>
                                                @else
                                                    <div class="badge badge-danger mr-1 mb-1">
                                                        <i class="feather icon-slash"></i>
                                                        <span>Out Of Date</span>
                                                    </div>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
                                <form method="post" enctype="multipart/form-data" action="{{route('admin.players.addmembership')}}" >
                                    @csrf
                                    <h3 class="mb-2">Renewal Membership</h3>
                                    <input type="hidden"  name="client_id" value="{{$player->id}}">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Membership Type<strong class="text-danger">*</strong></span>
                                        </div>
                                        <div class="col-md-8">
                                            <select required id="type_id" name="type_id" class="form-control">
                                                @foreach(\App\Membership::all() as $membership)
                                                    <option value="{{$membership->id}}">{{$membership->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Start Date</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input required type="date" class="form-control" name="start_date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>End Date</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input required type="date" class="form-control" name="end_date">
                                        </div>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- users edit Info form ends -->
                    </div>
                    <div class="tab-pane" id="reports" aria-labelledby="reports-tab" role="tabpanel">
                        <!-- users edit Info form start -->
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>file</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($player->medical_reports as $report)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$report->name}}</td>
                                            <td><a href="{{asset($report->image)}}" target="_blank">Open link</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form method="post" enctype="multipart/form-data" action="{{route('admin.reports.store')}}" >
                                @csrf
                                <h3 class="mb-2">Add Medical report</h3>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Name</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input required type="text" class="form-control" name="name">
                                        <input type="hidden"  name="player_id" value="{{$player->id}}">
                                        <input type="hidden"  name="user_id" value="{{auth()->id()}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>File</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input required type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                </div>
                            </form>
                        </div>

                        <!-- users edit Info form ends -->
                    </div>
                    <div class="tab-pane" id="attendance" aria-labelledby="attendance-tab" role="tabpanel">
                        <!-- users edit Info form start -->
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>date</th>
                                        <th>group</th>
                                        <th>status</th>
                                        <th>coach</th>
                                        <th>Notes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($player->attendances as $report)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$report->date}}</td>
                                            <td>{{$report->group->name}}</td>
                                            <td>{{$report->status}}</td>
                                            <td>{{$report->user->name}}</td>
                                            <td><a href="{{route('admin.attendance.show', $report->id)}}">View notes</a> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form method="post" enctype="multipart/form-data" action="{{route('admin.attendance.store')}}" >
                                @csrf
                                <h3 class="mb-2">Add Attendance</h3>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Date</span>
                                    </div>
                                    <div class="col-md-8">
                                        <input required type="date" class="form-control" name="date">
                                        <input type="hidden"  name="player_id" value="{{$player->id}}">
                                        <input type="hidden"  name="user_id" value="{{auth()->id()}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Name</span>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text"  name="name" value="" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Status</span>
                                    </div>
                                    <div class="col-md-8">
                                        <select required id="status" name="status"
                                                class="form-control">
                                            <option selected disabled value="">Select</option>
                                            <option value="present">present</option>
                                            <option value="late">late</option>
                                            <option value="absent">absent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Group</span>
                                    </div>
                                    <div class="col-md-8">
                                        <select required id="group_id" name="group_id"
                                                class="form-control">
                                            <option selected disabled value="">Select</option>
                                            @foreach($player->groups as $group)
                                                <option value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Note</span>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                </div>
                            </form>
                        </div>

                        <!-- users edit Info form ends -->
                    </div>
                    <div class="tab-pane" id="notes" aria-labelledby="notes-tab" role="tabpanel">
                        <!-- users edit Info form start -->
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>date</th>
                                        <th>Notes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($player->notes as $note)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$note->created_at}}</td>
                                            <td>{{$note->text}}</td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <form method="post" enctype="multipart/form-data" action="{{route('admin.notes.store')}}" >
                                @csrf
                                <h3 class="mb-2">Add Note</h3>

                                <input type="hidden"  name="note_groupable_id" value="{{$player->id}}">
                                <input type="hidden"  name="note_groupable_type" value="{{get_class($player)}}">

                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <span>Note</span>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Save</button>
                                </div>
                            </form>
                        </div>

                        <!-- users edit Info form ends -->
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
