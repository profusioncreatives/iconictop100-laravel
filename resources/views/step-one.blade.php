@extends('layouts.master')

@section('title')
Enroll
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 py-5">
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
            {!! Form::open(['route'=>'enroll','class'=>'row mb-3 g-4 text-white btn-16']) !!}
            <div class="col-12 text-center mb-4">
                <div class="text-heading text-gold-gradient mb-4">ENTER THE DETAILS</div>
                <ul class="progressbar">
                    <li class="current">STEP 1</li>
                    <li>STEP 2</li>
                    <li>STEP 3</li>
                </ul>
            </div>
            <div class="col-12">
                <p class="text-caption fw-normal">All fields are required</p>
            </div>
            <div class="col-12">
                {!! Form::label('inputName', 'Full Name', ['class'=>'form-label', 'style'=>'opacity: 0.6;']) !!}
                {!! Form::text('name', old('name'), ['id'=>'inputName','class'=>'form-control form-control-lg ' . ($errors->has('name')?'is-invalid':'') ]) !!}
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::label('inputEmail', 'Email', ['class'=>'form-label', 'style'=>'opacity: 0.6;']) !!}
                {!! Form::text('email', old('email'), ['id'=>'inputEmail','class'=>'form-control form-control-lg ' . ($errors->has('email')?'is-invalid':'') ]) !!}
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::label('inputPhone', 'Phone Number', ['class'=>'form-label', 'style'=>'opacity: 0.6;']) !!}
                {!! Form::text('phone', old('phone'), ['id'=>'inputPhone','class'=>'form-control form-control-lg ' . ($errors->has('phone')?'is-invalid':'') ]) !!}
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>
            </div>
            <div class="col-12 text-center mt-5">
                <button type="submit" class="btn btn-14 btn-iconic-primary-outline py-2 px-5">Done</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
