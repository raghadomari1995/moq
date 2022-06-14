@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$user->name}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table  table-striped mb-0">
                                    <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>profile image</strong></td>
                                        <td>
                                            @if($user->image)
                                                <a href="{{asset($user->image)}}" target="_blank">Open link</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Join Date</strong></td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Experience </strong></td>
                                        <td>{{$user->exp }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Club/Academy name </strong></td>
                                        <td>{{$user->club_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Description </strong></td>
                                        <td>{{$user->description  }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Certifications</strong></td>
                                        <td>
                                            @if($user->certifications())
                                                @foreach( $user->certifications()->get() as $certification )
                                                Certification {{ $loop->iteration }} : <a href="{{asset($certification->file)}}" target="_blank">Open link</a> ,
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Role </strong></td>
                                        <td>{{$user->getRoleNames()->first()}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Country </strong></td>
                                        <td>{{$user->city->country->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City </strong></td>
                                        <td>{{$user->city->name}}</td>
                                    </tr>
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

