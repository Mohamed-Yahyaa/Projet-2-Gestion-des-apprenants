<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

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


public function search(Request $request)
{
if($request->ajax()){
    $input = $request->key;
$output="";
$Promotion=Promotion::where('NamePromotion','like','%'.$input."%")
    ->orWhere('id','like','%'.$input."%")
->get();
if($Promotion)
{
foreach ($Promotion as $promotion) {
$output.='<tr>
<td>'.$promotion->id.'</td>
<td>'.$promotion->NamePromotion.'</td>
<td>
<a href="Edit/'.$promotion->id.'"><button>Edit</button></a>
<a href="Delete/'.$promotion->id.'"><button>Delete</button></a>
<td>
</tr>';
}
return Response($output);
   }
   }
}
}

