<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'orderno',
        'address',
        'city',
        'pincode',
        'phone',
        'amount',
        'discount_amount',
        'net_total',
        'status',
        'payment',
        'payment_id',
        'products',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'amount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'net_total' => 'decimal:2',
        'products' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->orderno = self::getNextOrderNumber();
        });
    }

    /**
     * https://laracasts.com/discuss/channels/general-discussion/custom-sequence-number-generation-for-order
     *
     * @return void
     */
    public static function getNextOrderNumber()
    {
        // Get the last created order
        $lastOrder = Order::orderBy('created_at', 'desc')->first();

        if ( ! $lastOrder )
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.

            $number = 0;
        else 
            $number = substr($lastOrder->orderno, 3);

        // If we have ORD000001 in the database then we only want the number
        // So the substr returns this 000001

        // Add the string in front and higher up the number.
        // the %05d part makes sure that there are always 6 numbers in the string.
        // so it adds the missing zero's when needed.
    
        return 'ORD' . sprintf('%06d', intval($number) + 1);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function scopeOfUser($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    public function scopeOrderStatus($query, $status)
    {
        if ($status === 'all') return $this;
        
        return $query->where('status', $status);
    }
}
