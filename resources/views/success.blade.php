@extends('layouts.master')

@section('title')
Success
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-12 py-5">
            <div class="text-heading text-gold-gradient mb-4">
                <img src="/images/check-circle.svg" alt="Done">
                Done
            </div>
            <p class="text-base text-success">
                Your form has been<br> Submitted Succesfully
            </p>
        </div>
        <hr class="bg-light">
        <div class="col-12 my-4 text-white">
            <p class="text-base mb-1" style="opacity: 0.7;">Go back to<p>
            <a href="#" class="h5 op-1">HOME</a>
            <p class="text-base" style="opacity: 0.7;">or<br><br>
            You can checkout our <br>Social Media handles</p>
        </div>
        <div class="col-12 col-lg-4 mb-5">
            <div class="icon-gold-gradient border-gold-gradient">
                {!! menu('social', 'snippets.social') !!}
            </div>
        </div>
    </div>
</div>
@endsection
