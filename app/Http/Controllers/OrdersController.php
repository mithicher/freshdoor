<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use App\Order;
use App\Facades\Cart as CartFacade;
use Illuminate\Support\Str;
use DB;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        // dd(CartFacade::get()['products']);
        DB::beginTransaction();

        // Get Cart Details from Session
        $cartProducts = CartFacade::get()['products'];
        $cartTotal = CartFacade::cartTotal();
        $cartDiscount = CartFacade::getDiscount();
        $cartNetTotal = CartFacade::netTotal();

        // 1. Capture payment in Stripe only if paymentType == 'Online payment'
        if (session('paymentType') === 'Online payment') {
            try {
                Stripe::setApiKey(config('services.stripe.secret'));
                $customer = Customer::create([
                    'description' => $request->get('name'),
                    'source' => $request->get('stripeToken')
                ]);
                
                $response = Charge::create([
                    'customer' => $customer->id,
                    'amount' => $cartNetTotal * 100, // Stripe amount in cents
                    'currency' => 'INR'
                ]);
            } catch (\Exception $ex) {
                DB::rollback();
                session()->flash('error', 'Oh no, your payment has failed - You transaction has failed due to some technical error. Please try again.');
                // session()->flash('error', $ex->getMessage());
                return redirect()->back();
            } 
        }

        try {
             // 2. Save order details in orders table
             Order::create([
                'user_id' => auth()->user()->id,
                'address' => session('address', ''),
                'city' => session('city', ''),
                'pincode' => session('pincode', ''),

                'amount' => $cartTotal,
                'discount_amount' => $cartDiscount,
                'net_total' => $cartNetTotal,
                'products' => $cartProducts,
               
                'payment' => session('paymentType', ''),
                'payment_id' => $response->id ?? Str::random(8)
            ]);
        
            // auth()->user()->orders()->create($order);
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', $e);
            return redirect()->back();
        }

        // 3. Clear session data from Cart
        CartFacade::clear();

        DB::commit();

        return redirect()->to('order-complete');
    }
}
