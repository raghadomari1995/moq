@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Players</h4>
                        {{--                        @if(!isset($_GET['parent_id']))--}}
                        <a href="{{route('admin.players.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
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
                                        <th>Subscription</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($players as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($user->name,3)}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if(\Carbon\Carbon::parse($user->subscriptions()->orderBy('id','desc')->first()?->start_date) <= \Carbon\Carbon::now() && \Carbon\Carbon::parse($user->subscriptions()->orderBy('id','desc')->first()?->end_date) >= \Carbon\Carbon::now())
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
                                            <td>
{{--                                                <a href="{{route('admin.players.show',$user->id)}}" class="btn btn-info btn-sm"><i class="feather icon-eye"></i></a>--}}
                                                <a href="{{route('admin.players.edit',$user->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i></a>
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
