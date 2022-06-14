@extends('layouts.app')
@section('content')

<div class="container">

<?php
$ads = $cats;
?>
@if(!isset( $cats ))
<div class="ads-list home-ads">
	<h3 class="section-title">{{ __('Search Result') }}</h3>
	<div class="home-ads-container">
		@foreach ($ads as $ad )
      @include('front.ads.card')
		@endforeach
	</div>
</div>
@endsection
@else
<div class="no-result">{{__('No Result Found')}}</div>
@endif