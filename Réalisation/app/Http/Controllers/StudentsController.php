<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
   
   
    public function create($PromotionID)
    {
        
        return view('student.create',["PromotionID" => $PromotionID]);
    }
    
    public function store(Request $request)
    {
        $student=new Student();
        $student->First_name=$request->input('First_name');
        $student->Last_name=$request->input('Last_name');
        $student->Email=$request->input('Email');
        $student->PromotionID=$request->input('PromotionID');

        $student->save();

        return redirect()->route('promotion.edit',$student->PromotionID);
    }
    public function edit($id){

        return view('student.edit',['student'=>Student::findOrFail($id)]);
    }
    public function update(request $request, $id){
        $student=Student::findOrFail($id);
        $student->First_name=strip_tags($request->input('First_name'));
        $student->Last_name=strip_tags($request->input('Last_name'));
        $student->Email=strip_tags($request->input('Email'));
        $student->PromotionID=strip_tags($request->input('PromotionID'));

        $student->save();

        return redirect()->route('promotion.edit', $student->PromotionID);

    }

    public function destroy($id){
        $student=Student::findOrFail($id);
        $student->delete();
        return redirect()->route('promotion.edit', $student->PromotionID);

    }

    public function search1(Request $request){
        $output="";
        $id = $request->PromotionID;
        $students=Student:: where([
            ['PromotionID','=',$id],
            ['First_name','Like',$request->search.'%']
        ])->get();

        foreach($students as $student)
        {
            $output.=
            '<tr>
            <td> '.$student->First_name.' </td>
            <td> '.$student->Last_name.' </td>
            <td> '.$student->Email.' </td>
            <td> 
            <a href="'.route('student.edit',$student->Id_student).'">Edit</a>
                <form action="'.route('student.destroy',$student->Id_student).'" method="POST">
                    <input type="hidden" name="_token" value="yb5AihWDKb7pZahkmAzVDUI5s5u0fCXfajDetPDe">
                    <input type="hidden" name="_method" value="DELETE">
                    <input  type="submit" value="Delete" />
                </form>

        </td>
            </td>
           
            </tr>';
        }
        return response($output);
    }
 } 