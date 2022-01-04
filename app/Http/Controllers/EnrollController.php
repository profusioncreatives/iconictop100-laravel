<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Enrollment;
use App\Payment;
use Illuminate\Support\Facades\Hash;
use Validator;
use Razorpay\Api\Api;
use Session;
use Illuminate\Support\Str;

class EnrollController extends Controller
{
    public function is_base64($str){
        if ( base64_encode(base64_decode($str, true)) === $str) {
           return true;
        } else {
           return false;
        }
    }

    public function stepone()
    {
        return view('step-one');
    }

    public function steptwo($id)
    {
        $email = base64_decode($id);
        $data = Enrollment::where('email', $email)->first();
        $api = new Api(setting('admin.razorpay_key'), setting('admin.razorpay_secret'));
        $order = $api->order->create(array('receipt'=>$data->receipt_id, 'amount'=>setting('site.fee_amount') * 100, 'currency'=>'INR'));
        $response = [
            'data' => $data,
            'order_id' => $order['id']
        ];

        if($this->is_base64($id) && Enrollment::where('email', $email)->exists()) {
            if(Enrollment::where('email', $email)->where('status', 'ACCOUNT')->exists()) {
                return redirect()->route('enroll.three', ['id' => $id])->with('success', 'Please fill the details!');
            } else if (Enrollment::where('email', $email)->where('status', 'PAYMENT')->exists()){
                return view('step-two', compact('response'));
            } else if (Enrollment::where('email', $email)->where('status', 'COMPLETED')->exists()){
                return redirect()->route('enroll.success', ['id' => $id])->with('success', 'You have already enrolled!');
            } else {
                return redirect()->route('enroll.one')->with('error', 'You need to enroll First!');
            }
        } else {
            abort(404);
        }
    }
    
    public function stepthree($id)
    {
        $email = base64_decode($id);
        if($this->is_base64($id) && Enrollment::where('email', $email)->exists()) {
            if(Enrollment::where('email', $email)->where('status', 'ACCOUNT')->exists()) {
                $data = Enrollment::where('email', $email)->first();
                return view('step-three')->with('data', $data); 
            } else if (Enrollment::where('email', $email)->where('status', 'PAYMENT')->exists()){
                return redirect()->route('enroll.two', ['id' => $id])->with('error', 'Please complete the payment first!');
            } else if (Enrollment::where('email', $email)->where('status', 'COMPLETED')->exists()){
                return redirect()->route('enroll.success', ['id' => $id])->with('success', 'You have already enrolled!');
            } else {
                return redirect()->route('enroll.one')->with('error', 'You need to enroll First!');
            }
        } else {
            abort(404);
        }
    }

    public function success($id)
    {
        $email = base64_decode($id);
        if($this->is_base64($id) && Enrollment::where('email', $email)->exists()) {
            if(Enrollment::where('email', $email)->where('status', 'ACCOUNT')->exists()) {
                return redirect()->route('enroll.three', ['id' => $id])->with('success', 'Please fill the details!');
            } else if (Enrollment::where('email', $email)->where('status', 'PAYMENT')->exists()){
                return redirect()->route('enroll.two', ['id' => $id])->with('error', 'Please complete the payment first!');
            } else if (Enrollment::where('email', $email)->where('status', 'COMPLETED')->exists()){
                return view('success');
            } else {
                return redirect()->route('enroll.one')->with('error', 'You need to enroll First!');
            }
        } else {
            abort(404);
        }
    }

    public function enroll(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|unique:enrollments|max:255|email',
            'phone' => 'required|unique:enrollments|regex:/^([0-9\s\-\+\(\)]*)$/|size:10'
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous() .'#enroll')
                    ->withErrors($validator)
                    ->withInput();
        }

        $hashid = base64_encode($request->email);
        Enrollment::create($request->all());
        Enrollment::where('email', $request->email)->update(['status' => 'PAYMENT', 'receipt_id'=>Str::random(20)]);
        return redirect()->route('enroll.two', ['id' => $hashid])->with('success', 'Thank you for filling form!'); 
    }

    public function pay(Request $request)
    {
        $input = $request->all();
        try
        {
            $api = new Api(setting('admin.razorpay_key'), setting('admin.razorpay_secret'));
            $attributes  = array('razorpay_signature'=>$input['razorpay_signature'], 'razorpay_payment_id'=>$input['razorpay_payment_id'], 'razorpay_order_id'=>$input['razorpay_order_id']);
            $order  = $api->utility->verifyPaymentSignature($attributes);
            
            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            $data = Enrollment::where('email', $payment->email)->first();
            $hashid = base64_encode($data->email);
            $input['receipt_id'] = $data->receipt_id;
            Payment::create($input);
            Enrollment::where('email', $data->email)->update(['status' => 'ACCOUNT']);
            return redirect()->route('enroll.three', ['id' => $hashid])->with('success', 'Payment successful!');
        } catch (Exception $e) {
            return  $e->getMessage();
            Session::put('error',$e->getMessage());
            return redirect()->back();
        }

    }

    public function account(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'pincode' => 'required|numeric|min:6',
            'about' => 'required',
            'experience' => 'required|max:255',
            'kind' => 'required|max:255',
            'image_1' => 'required|mimes:jpeg,png,jpg|max:4096',
            'image_2' => 'required|mimes:jpeg,png,jpg|max:4096',
            'image_3' => 'required|mimes:jpeg,png,jpg|max:4096'
        ]);

        $input = request()->except(['_token', 'image_1', 'image_2', 'image_3']);
        Enrollment::where('id', $input['id'])->update($input);

        $images = array('image_1', 'image_2', 'image_3');
        foreach ($images as $img) {
            if ($request->hasFile($img)) {
                $image = $request->file($img);
                $name = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('uploads', $name, 'public');

                Enrollment::where('id', $input['id'])->update([$img => $path]);
            }
        }
        Enrollment::where('id', $input['id'])->update(['status' => 'COMPLETED']);
        return redirect()->route('enroll.success'); 
    }
    
    public function redirect()
    {
        return redirect()->route('enroll.one');
    }
    
    public function closed()
    {
        return view('closed');
    }
}
