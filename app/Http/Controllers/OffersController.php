<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Support\Facades\Session;
use App\User;
use Validator;

class OffersController extends Controller
{

    public function index(){

        $equipments = config('equipments');
        return view('offers.findCar',[
            'equipments' => $equipments,
        ]);
    }

    public function ajaxGetBrand(Request $request){
        $data = [];

        if ($request->has('search')) {
            $search = $request->search;
            $data = App\Models\CarBrand::where('name', 'like', "%$search%")->get();
        }

        return response()->json($data);
    }

}
