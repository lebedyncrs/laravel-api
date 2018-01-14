<?php

namespace App\Models;

class AuctionAds extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'auction_ads';

    protected $fillable = [
        'name', 'description', 'need_tow_truck', 'location', 'car_model', 'days_term', 'money_budget', 'author_id'
    ];

    public $timestamps = false;
}