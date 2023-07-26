<?php

namespace App\Http\Controllers;

use App\Http\Resources\LopteCollection;
use App\Http\Resources\LopteResource;
use App\Models\Lopte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LopteController extends Controller
{
    public function index()
    {
    $lopte=Lopte::all();
    return new LopteCollection($lopte);
    }

    public function show(Lopte $lopte)
    {
       return new LopteResource($lopte);
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'price'=>'required',
            'type_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $lopte=Lopte::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'type_id'=>$request->type_id,
            'user_id'=>Auth::user()->id,
        ]);

        return response()->json(['Lopte su uspesno kreirane.', new LopteResource($lopte)]);
    }

    public function update(Request $request, Lopte $lopte)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'price'=>'required',
            'type_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $lopte->name=$request->name;
        $lopte->description=$request->description;
        $lopte->price=$request->price;
        $lopte->type_id=$request->type_id;

        $lopte->save();

        return response()->json(['Lopte su uspesno apdejtovane.',new LopteResource($lopte)]);
    }

    public function destroy(Lopte $lopte)
    {
        $lopte->delete();

        return response()->json('Lopte su uspesno obrisane.');
    }
}
