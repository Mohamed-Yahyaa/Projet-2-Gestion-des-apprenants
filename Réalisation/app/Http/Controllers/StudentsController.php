<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //
    public function Display(){
        $Student = Student::select("*")->get();
        return $Student;
    }

    public function create(){

        return view ('create');
    }

    public function AddPromotion(Request $request){
            $id = $request->id ;
        $Student = new student();
        $Student ->First_name=$request->input('name');
        $Student ->Last_name=$request->input('lastname');
        $Student ->Email=$request->input('email');
        $Student ->PromotionID = $id;
        $Student ->save();
        return redirect("edit/".$id);
      
    }

    public function Edit($id){
        $Student = Student::where('Id_student',$id)->get();
        return view("student.edit",compact('Student'));
    }

    public function Update(Request $request,$id){
        Student::where("Id_student",$id)->update([
            "First_name" => $request->first_name,
            'Last_name' => $request->last_name,
            'Email' => $request->email,

        ]);
    $url="Edit/".$request->idPromotion;
        return redirect($url);
    }
    
    public function Delete($id,$idd){
        $promotion = Student:: where("Id_student",$id)->delete();
        if($promotion){
            $url="Edit/".$idd;
            return redirect($url);
        }


    }
}
