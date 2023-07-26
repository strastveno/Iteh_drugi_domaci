<?php

namespace App\Http\Controllers;
use App\Models\Lopte;
use Illuminate\Http\Request;

class UserLopteController extends Controller
{
    public function index($user_id)
    {
        $lopte=Lopte::get()->where('user_id', $user_id);
        if(is_null($lopte))
        return response()->json('Data not found',404);
        return response()->json($lopte);
    }
}
