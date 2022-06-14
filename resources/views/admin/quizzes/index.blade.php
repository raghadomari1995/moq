@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quizzes</h4>
                        <a href="{{route('admin.quizzes.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quizzes as $quiz)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{\Illuminate\Support\Str::words($quiz->name,3)}}</td>
                                            <td>{{$quiz->code}}</td>
                                            <td>

                                                <a href="{{route('admin.quizzes.edit',$quiz->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i></a>
                                                <a href="{{route('admin.questions.index',$quiz->id)}}" class="btn btn-info btn-sm" title="View questions"><i class="feather icon-help-circle"></i></a>
                                                {{--                                                <a onclick="fireDeleteEvent({{$game->id}})" type="button" class="btn btn-danger btn-sm"><i class="feather icon-trash"></i></a>--}}
                                                {{--                                                <form action="{{route('admin.users.destroy',$game->id)}}" method="POST" id="form-{{$game->id}}">--}}
                                                {{--                                                    {{csrf_field()}}--}}
                                                {{--                                                    {{method_field('DELETE')}}--}}
                                                {{--                                                </form>--}}
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
            $('.zero-configuration1').DataTable( {} );
        } );

    </script>
@endsection
