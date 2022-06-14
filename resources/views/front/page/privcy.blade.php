@extends('layouts.app')
@section('content')

<div class="container">
<h1 class="page-title">{{ $p->translate(app()->getLocale())->name }}</h1>
<div class="page-text">
{!! $p->translate(app()->getLocale())->text !!}
</div>

@endsection