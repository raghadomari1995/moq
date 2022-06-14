@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Advertising</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                        <a href="{{route('admin.advertising.create')}}" class="btn btn-primary pull-right"><i class="feather icon-plus-square"></i> Add</a>
                            {{--                            <p class="card-text"></p>--}}
                            <div class="table-responsive">
                                <table class="table zero-configuration1">
                                    <thead>
                                    <tr>
                                        <th class="border-bottom">Name</th>
                                        <th class="border-bottom">price</th>
                                        <th class="border-bottom">Ad status</th>
                                        <th class="border-bottom">product status</th>
                                        <th class="border-bottom">year</th>
                                        <th class="border-bottom">color</th>
                                        <th class="border-bottom">type</th>
                                        <th class="border-bottom">user</th>
                                        <th class="border-bottom">category</th>
                                        <th class="border-bottom"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($advertising as $a)
            <tr>                
                <td><span class="fw-normal">{{ $a->name }}</span></td>
                <td><span class="fw-normal d-flex align-items-center">{{ $a->price }}</span></td>
                <td><span class="fw-normal text-success">{{ $a->status() }}</span></td>
                <td><span class="fw-normal text-success">{{ $a->status2() }}</span></td>
                <td><span class="fw-normal ">{{ $a->year }}</span></td>
                <td><span class="fw-normal ">{{ $a->color }}</span></td>
                <td><span class="fw-normal text-success">{{ $a->type() }}</span></td>
                <td><span class="fw-normal ">{{ $a->user() }}</span></td>
                <td><span class="fw-normal ">{{ $a->category() }}</span></td>
                                            <td>
                                            <a href="{{route('admin.advertising.show',$a->id)}}" class="btn btn-info btn-sm"><i class="feather icon-eye"></i></a>
                                                <a href="{{route('admin.advertising.edit',$a->id)}}" class="btn btn-info btn-sm"><i class="feather icon-edit"></i></a>
                                                <a onclick="fireDeleteEvent('{{'adv'.$a->id}}')" type="button" class="btn btn-danger"><i class="feather icon-trash"></i> </a>
                                                <form action="{{route('admin.advertising.destroy',$a->id)}}" method="POST" id="form-{{'adv'.$a->id}}">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
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