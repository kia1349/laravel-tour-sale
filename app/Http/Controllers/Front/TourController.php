<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tour;
use App\Date;

class TourController extends Controller
{
    public function show(Tour $tour)
    {
        $show = 'tour';
        return view('front.tour_detail', compact('tour'));
    }

    public function reservationStep1(Date $date)
    {
        $tour = $date->tour;
        if((!$tour) or ($tour->status !== 1)){
            return 'tour not found.'; 
        }
        return view('front.reservation_step1', compact('tour', 'date'));
    }

    public function reservationStep2(Request $request, Date $date, $adult)
    {
        $adult = intval($adult);
        if($adult > 5){
            return response('too much participants');
        }

        $tour = $date->tour;
        if((!$tour) or ($tour->status !== 1)){
            return 'tour not found.'; 
        }

        $total_price = $date->price * $adult;
        $currency = $date->currency;
        
        return view('front.reservation_step2', compact('tour', 'date', 'adult', 'total_price', 'currency'));
    }

}
