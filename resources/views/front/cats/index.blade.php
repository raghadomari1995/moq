@extends('layouts.app')
@section('content')

<div class="container">

<div class="home-cats">
	<h3 class="section-title">{{ __('Categories') }}</h3>
	<div class="cats-container">
    <?php
    //print_r($cats->cats());
    ?>
		@foreach ($cats->cats() as $cat )
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