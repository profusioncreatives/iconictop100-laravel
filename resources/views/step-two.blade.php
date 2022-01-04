@extends('layouts.master')

@section('title')
Payment
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
                <div class="col-12 text-center mb-5">
                    <div class="text-heading text-gold-gradient mb-4">PAYMENT GATEWAY</div>
                    <ul class="progressbar">
                        <li class="done">STEP 1</li>
                        <li class="current">STEP 2</li>
                        <li>STEP 3</li>
                    </ul>
                </div>
                <div class="col-12 text-center">
                    <h5 class="h5" style="opacity: 0.8;">Redirect to Payment Gateway</h5>
                    <button id="rzp-button1" hidden>Pay</button>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script>
                        var options = {
                            "key": "{{ setting('admin.razorpay_key') }}",
                            "amount": "{{ setting('site.fee_amount') * 100 }}",
                            "currency": "INR",
                            "name": "{{ setting('site.title') }}",
                            "description": "{{ setting('site.description') }}",
                            "image": "{{ asset('images/logo.png') }}",
                            "order_id": "{{ $response['order_id'] }}",
                            "callback_url": "{{ route('enroll.pay') }}",
                            "prefill": {
                                "name": "{{ $response['data']->name }}",
                                "email": "{{ $response['data']->email }}",
                                "contact": "{{ $response['data']->phone }}"
                            },
                            "theme": {"color": "#FCD74B"},
                            "modal": {
                                "ondismiss": function(){
                                    window.location.reload();
                                }
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        document.getElementById('rzp-button1').onclick = function(e){
                            rzp1.open();
                            e.preventDefault();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customjs')
<script>
    $(window).on('load', function() {
        jQuery('#rzp-button1').click();
    });
</script>
@endsection