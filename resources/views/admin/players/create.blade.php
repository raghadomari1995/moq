@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">create new Player</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.players.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Code</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="code" value="{{(\App\Player::orderBy('id','desc')->first())?\App\Player::orderBy('id','desc')->first()?->code+1:100000}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Email <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Full Name <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Phone <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="phone">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Date of birth <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="date" class="form-control" name="date_of_birth">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>School name <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="school_name">
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
                                                    <span>Gender <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="gender"
                                                            class="form-control" required>
                                                        <option selected disabled value="">Select</option>
                                                            <option value="male">male</option>
                                                            <option value="female">female</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Membership Type<strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required id="membership_id" name="membership_id" class="form-control">
                                                            @foreach(\App\Membership::all() as $membership)
                                                                <option value="{{$membership->id}}">{{$membership->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Group Type<strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required onchange="getValue('type','group')" id="type" name="type"
                                                            class="form-control">
                                                            <option selected disabled value="">Select</option>
                                                            @foreach(\App\GroupType::all() as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Group <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required id="group_id" name="group_id"
                                                            class="form-control">
                                                        <option selected disabled value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
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
                                                    <span>Home Address <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Training Location <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="traning_location">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Neighborhood <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="neighborhood">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Any Allergies?</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea  class="form-control" name="allergies"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Any Medical Conditions? <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="medical_conditions" value="0">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">No</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block mr-2">
                                                            <fieldset>
                                                                <div class="vs-radio-con vs-radio-success">
                                                                    <input type="radio" name="medical_conditions" value="1">
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <span class="">Yes</span>
                                                                </div>
                                                            </fieldset>
                                                        </li>   
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Medical Conditions Description</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea  class="form-control" name="medical_conditions_description"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>How Did You hear about {{setting('website_title',app()->getLocale())}} <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="hear_about_us">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Start Date <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="date" class="form-control" name="start_date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>End Date <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="date" class="form-control" name="end_date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Emergency Contact Details</h5>
                                                </div>
                                            </div>

                                            <div class="emergency_contact">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Full Name <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="contact_name[]" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Phone Number <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="contact_number[]" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Relation to Client <strong class="text-danger">*</strong></span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="contact_relation[]" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">                                                
                                                    <a href="#" id="new_contact" class="btn btn-primary pull-right waves-effect waves-light"><i class="feather icon-plus-square"></i> Add new Contact</a>
                                                </div>
                                            </div>
                                            <div class="emergency_contact_new"></div>

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
                        case 'group':
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

        $("#new_contact").click(function() {        
            $(".emergency_contact")
                .last()
                .clone()
                .appendTo($(".emergency_contact_new"))
                       
            return false;        
        });
    </script>
@endsection
