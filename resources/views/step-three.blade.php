@extends('layouts.master')

@section('title')
Account
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
            {!! Form::open(['route'=>'enroll.account', 'files' => true,'class'=>'row mb-3 g-3 text-white btn-16']) !!}
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
            <div class="col-12 text-center mb-5">
                <div class="text-heading text-gold-gradient mb-4">ENTER THE DETAILS</div>
                <ul class="progressbar">
                    <li class="done">STEP 1</li>
                    <li class="done">STEP 2</li>
                    <li class="current">STEP 3</li>
                </ul>
            </div>
            <div class="col-12 mb-5">
                <p class="text-subheading">PERSONAL DETAILS <i class="fas fa-star-of-life text-danger"
                        style="font-size: .5rem;vertical-align: text-top;"></i></p>
                <fieldset class="row g-3">
                    <div class="col-12">
                        {!! Form::label('inputName', 'Full Name', ['class'=>'form-label']) !!}
                        {!! Form::text('name', $data->name, ['id'=>'inputName','class'=>'form-control form-control-lg ' . ($errors->has('name')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputEmail', 'Email', ['class'=>'form-label']) !!}
                        {!! Form::text('email', $data->email, ['id'=>'inputEmail','class'=>'form-control form-control-lg ' . ($errors->has('email')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputPhone', 'Phone Number', ['class'=>'form-label']) !!}
                        {!! Form::text('phone', $data->phone, ['id'=>'inputPhone','class'=>'form-control form-control-lg ' . ($errors->has('phone')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mb-5">
                <p class="text-subheading">RESIDENTIAL DETAILS <i class="fas fa-star-of-life text-danger"
                        style="font-size: .5rem;vertical-align: text-top;"></i></p>
                <fieldset class="row g-3">
                    <div class="col-12">
                        {!! Form::label('inputAddress', 'Address', ['class'=>'form-label']) !!}
                        {!! Form::text('address', $data->address, ['id'=>'inputAddress','class'=>'form-control form-control-lg ' . ($errors->has('address')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('inputCity', 'City', ['class'=>'form-label']) !!}
                        {!! Form::text('city', $data->city, ['id'=>'inputCity','class'=>'form-control form-control-lg ' . ($errors->has('city')?'is-invalid':''), 'placeholder'=>'Eg: Mumbai']) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('inputState', 'State', ['class'=>'form-label']) !!}
                        {!! Form::text('state', $data->state, ['id'=>'inputState','class'=>'form-control form-control-lg ' . ($errors->has('state')?'is-invalid':''), 'placeholder'=>'Eg: Maharashtra']) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('state') }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::label('inputPincode', 'Pincode', ['class'=>'form-label']) !!}
                        {!! Form::text('pincode', $data->pincode, ['id'=>'inputPincode','class'=>'form-control form-control-lg ' . ($errors->has('pincode')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('pincode') }}
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mb-5">
                <p class="text-subheading">TELL US MORE ABOUT YOURSELF <i class="fas fa-star-of-life text-danger"
                        style="font-size: .5rem;vertical-align: text-top;"></i></p>
                <fieldset class="row g-3">
                    <div class="col-12">
                        {!! Form::label('inputAbout', 'How you started your Makeup Journey', ['class'=>'form-label']) !!}
                        {!! Form::textarea('about', $data->about, ['id'=>'inputAbout','class'=>'form-control form-control-lg ' . ($errors->has('about')?'is-invalid':''), 'rows'=>'3']) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('about') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputExperience', 'Numbers of Years/Months of Experience', ['class'=>'form-label']) !!}
                        {!! Form::text('experience', $data->experience, ['id'=>'inputExperience','class'=>'form-control form-control-lg ' . ($errors->has('experience')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('experience') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputKind', 'What kind of Makeup do you excel in?', ['class'=>'form-label']) !!}
                        {!! Form::text('kind', $data->kind, ['id'=>'inputKind','class'=>'form-control form-control-lg ' . ($errors->has('kind')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('kind') }}
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mb-5">
                <p class="text-subheading">YOUR SOCIAL MEDIA LINKS</p>
                <fieldset class="row g-3">
                    <div class="col-md-6">
                        {!! Form::label('inputInstagram', 'Instagram Profile Link', ['class'=>'form-label']) !!}
                        {!! Form::text('instagram_link', $data->instagram_link, ['id'=>'inputInstagram','class'=>'form-control form-control-lg ' . ($errors->has('instagram_link')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('instagram_link') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputFacebook', 'Facebook Profile Link', ['class'=>'form-label']) !!}
                        {!! Form::text('facebook_link', $data->facebook_link, ['id'=>'inputFacebook','class'=>'form-control form-control-lg ' . ($errors->has('facebook_link')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook_link') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputYoutube', 'Youtube Channel Link', ['class'=>'form-label']) !!}
                        {!! Form::text('youtube_link', $data->youtube_link, ['id'=>'inputYoutube','class'=>'form-control form-control-lg ' . ($errors->has('youtube_link')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('youtube_link') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('inputOtherlink', 'Any other link you want to share?', ['class'=>'form-label']) !!}
                        {!! Form::text('other_link', $data->other_link, ['id'=>'inputOtherlink','class'=>'form-control form-control-lg ' . ($errors->has('other_link')?'is-invalid':'') ]) !!}
                        <div class="invalid-feedback">
                            {{ $errors->first('other_link') }}
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 mb-5">
                <p class="text-subheading">SHOW YOUR WORK <i class="fas fa-star-of-life text-danger"
                        style="font-size: .5rem;vertical-align: text-top;"></i></p>
                <p>
                    Upload 3 Pictures<br>
                    <span class="text-caption">File should be in jpg, jpeg or png formats only.</span>
                </p>
                <fieldset class="row g-3">
                    <div class="col-md-4">
                        {!! Form::file('image_1', ['accept'=>'image/x-png,image/jpeg', 'id'=>'inputImage1','class'=>($errors->has('image_1')?'is-invalid':''), 'hidden']) !!}
                        <button class="btn btn-lg btn-upload w-100" type="button"
                            onclick="document.getElementById('inputImage1').click();">
                            Choose File <img class="ms-auto" src="/images/upload-cloud.svg">
                        </button>
                        <div class="invalid-feedback">
                            {{ $errors->first('image_1') }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::file('image_2', ['accept'=>'image/x-png,image/jpeg', 'id'=>'inputImage2','class'=>($errors->has('image_2')?'is-invalid':''), 'hidden']) !!}
                        <button class="btn btn-lg btn-upload w-100" type="button"
                            onclick="document.getElementById('inputImage2').click();">
                            Choose File <img class="ms-auto" src="/images/upload-cloud.svg">
                        </button>
                        <div class="invalid-feedback">
                            {{ $errors->first('image_2') }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        {!! Form::file('image_3', ['accept'=>'image/x-png,image/jpeg', 'id'=>'inputImage3','class'=>($errors->has('image_3')?'is-invalid':''), 'hidden']) !!}
                        <button class="btn btn-lg btn-upload w-100" type="button"
                            onclick="document.getElementById('inputImage3').click();">
                            Choose File <img class="ms-auto" src="/images/upload-cloud.svg">
                        </button>
                        <div class="invalid-feedback">
                            {{ $errors->first('image_3') }}
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-12 text-center">
                <input type="hidden" name="id" value="{{ $data->id }}">
                <button type="submit" class="btn btn-lg btn-iconic-primary-outline px-5">Finish</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
