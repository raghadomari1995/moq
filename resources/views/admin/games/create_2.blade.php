@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new game</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.games.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Major</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select id="major" name="major" class="form-control">
                                                        <option selected disabled>Select Major</option>
                                                        @foreach(\App\Category::where('parent_id',0)->get() as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" id="subject_holder">

                                        </div>
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <span>Name {{$locale}}</span>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input required type="text" class="form-control" name="name[{{$locale}}]" placeholder="name {{$locale}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <input type="hidden" name="company_id" value="{{auth()->user()->companies()->first()->id}}">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Image</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Description</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Start Date</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="datetime-local" class="form-control" name="start_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>End Date</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="datetime-local" class="form-control" name="end_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Number Of Trials</span><strong class="text-danger"> Put 0 for always</strong>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" min="0" class="form-control" name="no_of_trials">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Game Mode</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="game_mode" class="form-control">
                                                        <option selected disabled>Select Game Mode</option>
                                                            <option value="learning">learning</option>
                                                            <option value="exam">exam</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Game Status</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="active" class="form-control">
                                                        <option selected disabled>Select Game Status</option>
                                                        <option value="1">active</option>
                                                        <option value="0">not active</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Working Days</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="working_days[]" class="select2 form-control" multiple>
                                                        <option value="every_day">every day</option>
                                                        <option value="Saturday">Saturday</option>
                                                        <option value="Sunday">Sunday</option>
                                                        <option value="Monday">Monday</option>
                                                        <option value="Tuesday">Tuesday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thursday">Thursday</option>
                                                        <option value="Friday">Friday</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Working Hours From</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="time" class="form-control" name="working_hours_from">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Working Hours To</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="time" class="form-control" name="working_hours_to">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Over All Time Of Game</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="overall_time_of_game">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>No Of Questions</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control" name="no_of_questions">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Video</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="video" accept="video/mp4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>PDF</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="pdf" accept="application/pdf">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <span>Game Groups</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select name="groups[]" class="select2 form-control" multiple>
                                                        @foreach(auth()->user()->companies()->first()->groups as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div
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
        $('#major').change(function (event){
            $.ajax({
                url: "{{route('get_major_data')}}",
                data:{'major_id':event.target.value},
            }).done(function(response) {
                $('#subject_holder').append(response.data);
            });
        });
    </script>
@endsection
