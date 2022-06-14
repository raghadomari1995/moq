@extends('layouts.app')
@section('content')
<div class="home-form">

<div class="shi">
  <img src="{{asset('img/shai.png')}}" />
  <div class="float-text">
	{{ $settings[2]->translate(app()->getLocale())->value }}
  </div>
</div>

<div class="main-form">
<form class="form form-horizontal" action="{{ route('search') }}" method="GET" enctype="multipart/form-data">
{{csrf_field()}}
<input required type="text" class="form-control" name="s" placeholder="{{__('Search ...')}}">
<select name="group_id" class="form-control">
                                                        <option selected disabled value="">{{__('Select')}}</option>
                                                        @foreach(\App\City::all() as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>

<button type="submit" class="btn btn-primary mr-1 mb-1">{{__('Search')}}</button>

</form>
</div>

<div class="line">
  <img src="{{asset('img/line.png')}}" />
</div>

<div class="car">
  <img src="{{asset('img/car.png')}}" />
  <div class="float-text">
	{{ $settings[3]->translate(app()->getLocale())->value }}
  </div>
</div>

</div>
<div class="container">

<div class="home-cats">
	<h3 class="section-title">{{ __('Categories') }}</h3>
	<div class="cats-container">
		@foreach ($home_cats as $cat )
			<div class="cat-block">
				<div class="cat-block-image">
					<a href="{{route('category', $cat->id)}}"><img src="{{ asset($cat->image) }}"/></a>
				</div>
				<h5 class="caegory-name"><a class="" href="{{route('category', $cat->id)}}">{{ $cat->translate(app()->getLocale())->name }}</a></h5>
			</div>
		@endforeach
	</div>
</div>

<div class="ads-list home-ads">
	<h3 class="section-title">{{ __('Latest ads') }}</h3>
	<div class="home-ads-container">
		@foreach ($ads as $ad )
      @include('front.ads.card')
		@endforeach
	</div>
</div>
@endsection