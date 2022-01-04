<div id="contactform" class="container py-5">
    <div class="row align-items-center justify-content-evenly">
        <div class="col-md-6">
            @if(Session::has('success'))
               <div class="alert alert-success mb-5">
                 {{ Session::get('success') }}
               </div>
            @endif
            <div class="text-effect-md mb-5 mb-md-3 p-xl-4 text-break">
                <h2 class="h2">CONTACT US</h2>
                <span class="text-big">CONTACT US</span>
            </div>
        </div>
        <div class="col-md-4">
            {!! Form::open(['route'=>'contact']) !!}
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
                    {!! Form::label('inputRole', 'What defines you best', ['class'=>'form-label mb-0']) !!}
                    {!! Form::select('role', array(''=>'Choose...', 'Makeup Artists'=>'Makeup Artists', 'Participant'=>'Participant', 'Sponsor'=>'Sponsor', 'Media & Press'=>'Media & Press', 'Other'=>'Other'), '', ['id'=>'inputRole','class'=>'form-select form-select-lg ' . ($errors->has('role')?'is-invalid':'') ]) !!}
                    <div class="invalid-feedback">
                        {{ $errors->first('role') }}
                    </div>
                </div>
                <div class="mb-3">
                    {!! Form::label('inputMessage', 'Your Message', ['class'=>'form-label']) !!}
                    {!! Form::textarea('message', old('message'), ['id'=>'inputMessage','class'=>'form-control form-control-lg ' . ($errors->has('message')?'is-invalid':''), 'rows'=>'3']) !!}
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-lg btn-iconic-secondary w-100 py-2">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
