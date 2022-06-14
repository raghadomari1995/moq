@extends('admin.layouts.master')
@php
        $users = \Illuminate\Support\Facades\DB::table('e_users')->whereRaw('LENGTH(phone) > 6')->get();
 @endphp
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        {{--                        @if(!isset($_GET['parent_id']))--}}
                        {{--                            <a href="{{route('admin.services.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>--}}
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
                                        <th>Full Name</th>
                                        <th>Phone</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        @if($user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                    {{$user->first_name.' '.$user->last_name}}
                                            </td>
                                            <td>
                                                @if(isset($user->phone))
                                                {{$user->phone}}
                                                @endif
                                            </td>

                                        </tr>
                                        @endif
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
