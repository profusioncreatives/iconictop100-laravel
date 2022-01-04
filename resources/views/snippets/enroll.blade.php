@if(setting('site.registration'))
<div class="container py-5">
    <div class="row align-items-center justify-content-evenly">
        <div class="col-md-4">
            <div class="text-effect-md mb-5 mb-md-3 p-xl-4">
                <h2 class="h2">ENROLL NOW</h2>
                <span class="text-big">ENROLL NOW</span>
            </div>
        </div>
        <div class="col-md-4">
            {!! Form::open(['route'=>'enroll.one']) !!}
                <div class="mb-3">
                    {!! Form::label('inputName', 'Full Name', ['class'=>'form-label mb-0']) !!}
                    {!! Form::text('name', old('name'), ['id'=>'inputName','class'=>'form-control form-control-lg ' . ($errors->has('name')?'is-invalid':'') ]) !!}
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>
                <div class="mb-3">
                    {!! Form::label('inputEmail', 'Email', ['class'=>'form-label mb-0']) !!}
                    {!! Form::text('email', old('email'), ['id'=>'inputEmail','class'=>'form-control form-control-lg ' . ($errors->has('email')?'is-invalid':'') ]) !!}
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
                <div class="mb-3">
                    {!! Form::label('inputPhone', 'Phone Number', ['class'=>'form-label mb-0']) !!}
                    {!! Form::text('phone', old('phone'), ['id'=>'inputPhone','class'=>'form-control form-control-lg ' . ($errors->has('phone')?'is-invalid':'') ]) !!}
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-lg btn-iconic-secondary w-100 py-2">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@else
@include('snippets.contact')
@endif