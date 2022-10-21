<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\promotion;

class PromotionController extends Controller
{
    // Display 
   
   public function Display()
   {
    $table= promotion::all();
    return view("index",compact('table'));
   }

   public function Create ()
   {
    return view ('create');
   }


   public function AddPromotion(Request $request) {
    $promotion = new promotion();
    $promotion->NamePromotion =$request->input('name');
    $promotion->save();
    if($promotion->save()){
        return redirect('index');
    }
   }




    
}
