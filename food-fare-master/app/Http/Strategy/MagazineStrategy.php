<?php

namespace App\Http\Strategy;


class MagazineStrategy implements ListStrategyInterface {

    public function oldToNew($request)
    {
        return $request->sort(function ($a, $b) {
            return strtotime($a->created_at) > strtotime($b->created_at);
        })->values()->all();
       

    }
    public function newToOld($request)
    {
 
        return $request->sort(function ($a, $b) {
            return strtotime($a->created_at) < strtotime($b->created_at);
        })->values()->all();
    }
    public function aToz($request)
    {
        
        return $request->sortBy('title')->values()->all();;
    }

}