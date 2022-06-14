@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add new group</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('admin.groups.store')}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4 text-center">
                                                    <span>Type <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <select required id="type" name="type"
                                                            class="form-control">
                                                            @foreach(\App\GroupType::all() as $type)
                                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-4 text-center">
                                                    <span>Group Name <strong class="text-danger">*</strong></span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input required type="text" class="form-control" name="name">
                                                </div>
                                            </div>
                                        </div>

{{--                                        @foreach(config('translatable.locales') as $locale)--}}
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-4 text-center">
                                                        <span>Age</span>
{{--                                                        <span>Name {{$locale}}</span>--}}
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        under
{{--                                                        {{\Illuminate\Support\Facades\Lang::get('messages.under',[],$locale)}}--}}
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input required type="number" class="form-control" name="age">
{{--                                                        <input required type="number" class="form-control" name="name[{{$locale}}]">--}}
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        years
{{--                                                        {{\Illuminate\Support\Facades\Lang::get('messages.years',[],$locale)}}--}}
                                                    </div>
                                                </div>
                                            </div>
{{--                                        @endforeach--}}
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
