<?php

namespace App\Http\Strategy;
use App\Event;

class EventStrategy implements ListStrategyInterface {

    public function oldToNew($request)
    {
        return $request->sort(function ($a, $b) {
            return strtotime($a->event_date) > strtotime($b->event_date);
        })->values()->all();
       

    }
    public function newToOld($request)
    {
 
        return $request->sort(function ($a, $b) {
            return strtotime($a->event_date) < strtotime($b->event_date);
        })->values()->all();
    }
    public function aToz($request)
    {
        
        return $request->sortBy('title')->values()->all();;
    }

}