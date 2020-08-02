<?php
namespace App\Http\Strategy;
//Handle any payment related Issues
interface ListStrategyInterface{
/*Algorithms for the pattern*/
    public function oldToNew($request);

    public function newToOld($request);
    
    public function aToz($request);
}