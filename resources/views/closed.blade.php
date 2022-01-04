@extends('layouts.master')

@section('title')
Registration Unavailable
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 py-5">
            <div class="row mb-3 g-4 text-white btn-16">
                @if(Session::get('error'))
                <div class="alert alert-warning" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif
                {!! Session::forget('error') !!}
                @if(Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                {!! Session::forget('success') !!}
                <div class="col-12 text-center">
                    @if(!empty(setting('site.registration_image')))
                    <img src="{{ Voyager::image(setting('site.registration_image')) }}" class="img-fluid w-75" alt="Queue">
                    @else
                    <img src="{{ asset('images/queue-animate.svg') }}" class="img-fluid w-75" alt="Queue">
                    @endif
                    <h5 class="h5" style="opacity: 0.8;">Sorry! Currently we are not processing any registration </h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection