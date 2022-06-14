@extends('layouts.app')
@section('content')

<div class="container">
<?php $ad = $ads;?>
<div class="row">
    <div class="col-md-6">
        <h3 class="section-title">{{ $ads->name }}</h3>
        <?php
        
        ?>
        <span class="city">{{ $ads->country()->name }} - {{ $ads->city() }}</span>
    </div>
    <div class="col-md-6 single-ads">
        <span class="type type-{{ $ads->type }}">{{$ads->typefront}}</span>
        <h5 class="price single link-type-{{ $ads->type }}">{{ $ads->price }} {{ __( 'JD' ) }}</h5>
        <div class="clearfix"></div>
    </div>

    <div class="col-md-8">
    <img style="width:100%;" src="{{ asset($ad->image) }}"/>

    <table class="table table-bordered pro-hh">
 
  <tbody>
  <tr>
    <td class="hh">{{__('Type')}}</td>
    <td>{{$ad->type()}}</td>
  </tr>
  <tr>
    <td class="hh">{{__('Status')}}</td>
    <td>{{$ad->status2()}}</td>
  </tr>
  <tr>
    <td class="hh">{{__('Year')}}</td>
    <td>{{$ad->year}}</td>
  </tr>
  <tr>
    <td class="hh">{{__('Color')}}</td>
    <td>{{$ad->color}}</td>
  </tr>
  </tbody>
</table>
<p class="ads-des">{{$ad->des}}<p>
<div class="clearfix"></div>
<ul class="ads-cats">
            <li>{{ $ad->category() }}</li>
          </ul>
    </div>
    <div class="col-md-4">
    <div class="usr-side">
        <div class="row">
            <div  class="col-md-4"><img style="width:100%;" src="{{ asset($ad->user2()->image) }}"/></div>
            <div  class="col-md-8 usr-name">{{$ad->user()}}
            <p>{{$ad->user2()->city->name}}</p>
            </div>
            <div class="col-md-12 btn-usr">
                <a href="{{ route('show-user',$ad->user2()->id) }}">{{__('View Profile')}}</a>
            </div>
        </div>
    </div>

    <div class="btns">
      <a class="wapp" href="https://api.whatsapp.com/send?phone={{$ad->user2()->phone}}"><i class="fa fa-whatsapp" aria-hidden="true"></i>{{__('Send Message')}}</a>
      <a class="wapp2" href="">{{$ad->user2()->phone}}</a>
    </div>
    </div>
</div>

<div class="ads-list home-ads">
	<h3 class="section-title">{{ __('Latest ads') }}</h3>
	<div class="home-ads-container">
		@foreach ($adss as $ad )
			@include('front.ads.card')
		@endforeach
	</div>
</div>

@endsection