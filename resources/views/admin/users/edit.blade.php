@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{$user->name}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-body">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Email</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input  type="email" class="form-control" name="email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="name" value="{{$user->name}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Phone</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Password</span>
                                                    </div>
                                                    <div class="col-md-8"><strong class="text-danger">If You don't want to change it leave it blank</strong>
                                                        <input type="password" class="form-control" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Image</span>
                                                    </div>
                                                    <div class="col-md-8"><strong class="text-danger">If You don't want to change it leave it blank</strong>
                                                        <a href="{{asset($user->image)}}" target="_blank">open link</a>
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                </div>
                                                @if(!$user->hasRole('super_admin'))
                                                  
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Country</span>
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
                                                            <span>City</span>
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
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>Role</span>
                                                        </div>
                                                        <div class="col-md-8">  
                                                            <select name="type" class="form-control" required>
                                                                <option selected disabled value="">Select</option>
                                                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                                                    <option
                                                                        value="{{$role->name}}" {{ ( $user->type == $role->name )?'selected':'' }}>{{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif

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
