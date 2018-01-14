<?php

namespace App\Http\Controllers;

use App\AuctionAds;
use App\Http\Requests\AuctionAdsRequest;

class AuctionAdsController extends Controller
{
    public function getAll($userId = null)
    {
        if ($userId) {
            $query = \App\Models\AuctionAds::whereAuthorId($userId);
        } else {
            $query = \App\Models\AuctionAds::query();
        }

        return $query->get();
    }

    public function create(AuctionAdsRequest $request)
    {
       $model = new \App\Models\AuctionAds();
       $model->fill($request->all());
       $model->save();
       return $model;
    }
}
