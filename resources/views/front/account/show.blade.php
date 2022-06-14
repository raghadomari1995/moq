@extends('layouts.app')
@section('content')
<div class="container">
    <section id="basic-horizontal-layouts " class="moq-margin">
        <div class="row match-height">
            <div class="col-md-4">
            <div class="usr-side">
        <div class="row">
            <div  class="col-md-4"><img style="width:100%;" src="{{ asset($user->image) }}"/></div>
            <div  class="col-md-8 usr-name">{{$user->name}}
            <p>{{$user->city->name}}</p>
            </div>
           
        </div>
    </div>

    <div class="btns">
      <a class="wapp" href="https://api.whatsapp.com/send?phone={{$user->phone}}"><i class="fa fa-whatsapp" aria-hidden="true"></i>{{__('Send Message')}}</a>
      <a class="wapp2" href="">{{$user->phone}}</a>
    </div>
            </div>
            <div class="col-md-8">
                <div class="col-12 p-margin">
                    <div class="ads-list page-ads">
	<div class="-ads-container">
		@foreach ($user->ads as $ad )
			@include('front.ads.card2')
		@endforeach
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

