@extends('admin.layouts.master')
@section('content')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Notes</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
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
                                    @foreach($atten->notes as $note)
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

                                <input type="hidden"  name="note_groupable_id" value="{{$atten->id}}">
                                <input type="hidden"  name="note_groupable_type" value="{{get_class($atten)}}">

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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

