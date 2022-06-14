@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        {{--                        @if(!isset($_GET['parent_id']))--}}
                                                    <a href="{{route('admin.users.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                        {{--                        @endif--}}
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Experience</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($user->name,3)}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->getRoleNames()->first()}}</td>
                                            <td>{{$user->exp}}</td>
                                            <td>
                                                <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-info btn-sm"><i class="feather icon-eye"></i></a>
                                                <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i></a>
                                                <a href="" class="btn btn-info btn-sm"><i class="fa fa-ban"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
@section('script')
    <script>
        $(document).ready(function() {
            $('.zero-configuration1').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'pdf', 'print',
                ]
            } );
        } );
    </script>
@endsection
