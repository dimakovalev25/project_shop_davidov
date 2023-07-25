<?php

namespace App\Models\Models;

use App\Mail\SendSubscriptionMessage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    use HasFactory;


    public function scopeActiveByProductId($query, $product_id)
    {
        return $query->where('status', 0)->where('product_id', $product_id);
    }
    protected $fillable = ['email', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function sendEmailBySubscription(Product $product)
    {
        $subscriptions = self::activeByProductId($product->id)->get();

        foreach ($subscriptions as $subscr){
            Mail::to($subscr->email)->send(new SendSubscriptionMessage($product));

            $subscr->status = 1;
            $subscr->save();
        }

    }

}
