@extends('admin.layouts.master')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit About Us </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="{{route('storeprivcy')}}" method="POST" enctype="multipart/form-data">
                                <input required type="hidden" class="form-control game_name" name="user_id" value="{{ Auth::user()->id }}">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="col-md-12">
                                            
                                         <textarea name="text[en]" id="editor1" rows="10" cols="80">
                                            {!! $p->translate('en')->text !!}
                                        </textarea>
                                        <br>
                                        <textarea name="text[ar]" id="editor2" rows="10" cols="80">
                                            {!! $p->translate('ar')->text !!}
                                        </textarea>
                                    </div>

                                        



                                        
                                            <br>
                                        <div class="col-md-8 mt-20">
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
        function getValue(id, type) {
            $.ajax({
                url: '{{route("getSelectValue")}}',
                type: 'GET',
                data: {
                    'id': $('#' + id + ' :selected').val(),
                    'type': type
                },
                dataType: 'json',
                success: function (response) {
                    var data = response.data;
                    var target = $('#' + type + '_id');
                    switch (type) {
                        case 'city':
                            target.empty();
                            target.append('<option selected disabled>Select</option>');
                            break;
                        default:
                            target.empty();
                            break;
                    }
                    data.forEach(function (value) {
                        target.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function () {

                }

            });
        }//end getValue
    </script>
@endsection

