<?php

namespace App\Http\Controllers;
use App\Models\Lopte;
use Illuminate\Http\Request;

class TypeLopteController extends Controller
{
    public function index($type_id)
    {
        $lopte=Lopte::get()->where('type_id', $type_id);
        if(is_null($lopte))
        return response()->json('Data not found',404);
        return response()->json($lopte);
    }
}
