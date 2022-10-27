<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Student;


class PromoController extends Controller
{

    public function index()
    {

        return view('promotion.index',['promotion' => Promotion::all()]);
    }

    public function create()
    {
        return view('promotion.create');
    }


    public function store(Request $request)
    {
        $promotion=new Promotion();
        $promotion->NamePromotion=$request->input('NamePromotion');
        $promotion->save();

        return redirect()->route('promotion.index');
    }


    public function show($promotion)
    {
       return view('promotion.show',[ 'promotion' =>Promotion::findOrFail($promotion)]);
    }


    public function edit($id)
    {
        $students=Student::all()->where('PromotionID', $id);
        return view('promotion.edit',['promotion'=>Promotion::findOrFail($id),'students'=>$students ]);
    }


    public function update(Request $request, $promotion)
    {
        $toUpdate=Promotion::findOrFail($promotion);
        $toUpdate->NamePromotion=strip_tags($request->input('NamePromotion'));
        $toUpdate->save();

        return back();
    }


    public function destroy($id)
    {
        $promotion=Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->route('promotion.index');
    }

    public function search(Request $request){
        if($request->ajax()){
            $output="";
            $promotions=Promotion::where('NamePromotion','LIKE','%'.$request->search."%")->get();
            if($promotions){
                foreach($promotions as $promotion){
                    $output.='<tr>.
                    <td>'.$promotion->id.'</td>
                    <td>'.$promotion->NamePromotion.'</td>
                    <td>
                    <a href="'.route('promotion.edit',$promotion->id).'" style=" text-decoration: none;
                    font-family: 6px;
                    color: white;
                    padding:5px 5px;
                    float :left;
                    
                    background-color: #4CAF50;
                    
                    width:50px;
                    font-weight: 500;">Edit</a>
                        <form action="'.route('promotion.destroy',$promotion->id).'" method="POST">
                        <input type="hidden" name="_token" value="yb5AihWDKb7pZahkmAzVDUI5s5u0fCXfajDetPDe">
                        <input type="hidden" name="_method" value="DELETE">
                        <input  type="submit" value="Delete" style=" background-color: #ff0000; /* Green */
                        border: none;
                        color: white;
                        float :right;
                        padding: 5px 5px;
                        text-align: center;
                        font-weight: 500;
                        text-decoration: none;
                        display: inline-block;
                       
                        font-size: 16px;" />
                    </form>

                    </td>
                    
                    </tr>';
                    
                  
                }
                return Response($output);

            }
        }

    }
}