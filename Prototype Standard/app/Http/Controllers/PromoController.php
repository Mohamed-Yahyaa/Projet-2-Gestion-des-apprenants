<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion ;

class PromoController extends Controller
{
    //
    public function Display()
    {
        $table = Promotion::all();
        return view ("index",compact('table'));
    }

    public function Create()
    {
        return view ('create');
    }

    public function AddPromotion(Request $request)
    {
        $promotion = new promotion();
        $promotion->NamePromotion=$request->input('name');
        $promotion->save();
        if($promotion->save()){
            return redirect ('index');
        }

    }
    public function Edit($id){
        $promotion = Promotion::where('id',$id)->get();
        return view('edit',compact('promotion'));
    }

    public function Update(request $request ,$id){
        $promotion =Promotion::where('id',$id)->update([
            'NamePromotion'=>$request->name
        ]);
        return redirect('index');

    }

    public function Delete($id){
        $promotion=Promotion::where('id',$id)
        ->delete();
        return redirect('index');
    }
  
   
}
