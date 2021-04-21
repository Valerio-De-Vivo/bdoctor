<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
class ApiControllerDottori extends Controller
{
    public function index(){
        $dottore = Doctor::all();
        return response()->json([
            'succes'=> true,
            'response'=>$dottore
        ]);
    }
}
