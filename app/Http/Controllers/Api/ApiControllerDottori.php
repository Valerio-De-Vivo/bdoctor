<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use App\Review;
use App\Specialization;

class ApiControllerDottori extends Controller
{
    public function index(){
        $dottore = Doctor::all();
        $review = Review::all();
        $specialization = Specialization::all();

        return response()->json([
            'succes'=> true,
            'response'=>$dottore,
            'review' => $review,
            'specialization' => $specialization
        ]);
    }
}
