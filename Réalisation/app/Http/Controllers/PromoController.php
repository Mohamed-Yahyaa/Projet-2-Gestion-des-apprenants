<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use App\Models\Student;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    //
    public function Display()
    {
        $table = Promotion::all();
        return view ("Promotion.index",compact('table'));
    }

    public function Create()
    {
        return view ('Promotion.create');
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
            $Student = Student::where('PromotionID',$id)
            ->join("promotion","students.PromotionID","=","promotion.id")
            ->get();
            $promotion = Promotion::where('id',$id)->get();
            return view("promotion.Edit",compact('promotion','Student'));
        
    }

    
       

        public function Update(Request $request, $id){

            Promotion::where("id",$id)->update([
                       "NamePromotion" => $request->input('name'),
   
                   ]);
               $url="edit/".$id;
                   return redirect($url);
    }

        public function Delete($id){
            $promotion =  Promotion::where("id",$id)->delete();
             if($promotion){
                 return redirect('index');
             }
    }

}
