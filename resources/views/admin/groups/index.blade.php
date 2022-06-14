@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Groups</h4>
                        <a href="{{route('admin.groups.create',['company_id'=>request()->get('company_id')])}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Age Under</th>
                                        <th>Type</th>
                                        <th>No of players</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$group->name}}</td>
                                            <td>{{$group->age}}</td>
                                            <td><?php print_r( $group->type->name ) ?></td>
                                            <td>{{$group->players()->count()}}</td>
                                            <td>
                                                <a href="{{route('admin.groups.add_users',$group->id)}}" class="btn btn-primary">Manage Coach</a>
                                                <a href="{{route('admin.groups.view_users',$group->id)}}" class="btn btn-primary">View Coachs</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>No of players</th>
                                        <th>Options</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
