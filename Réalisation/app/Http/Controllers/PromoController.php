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

        return redirect()->route('promotion.index');
    }


    public function destroy($id)
    {
        $todelete=Promotion::findOrFail($id);
        $todelete->delete();
        return redirect(route('promotion.index'));
    }

    public function search(Request $request){
        if($request->ajax()){
            $output="";
            $promotions=Promotion::where('NamePromotion','LIKE','%'.$request->search."%")->get();
            if($promotions){
                foreach($promotions as $promotion){
                    $output.='<tr>.
                    <td>'.$promotion->NamePromotion.'</td>
                    <td>
                        <a href="'.route('promotion.edit',$promotion->id).'">Edit</a>
                        <form action="'.route('promotion.destroy',$promotion->id).'" method="POST">
                        <input type="hidden" name="_token" value="yb5AihWDKb7pZahkmAzVDUI5s5u0fCXfajDetPDe">
                        <input type="hidden" name="_method" value="DELETE">
                        <input  type="submit" value="Delete" />
                    </form>

                    </td>
                    
                    </tr>';
                    
                  
                }
                return Response($output);

            }
        }

    }
}