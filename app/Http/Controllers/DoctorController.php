<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Advertise;
use App\Message;
use App\Review;
use App\Specialization;
use App\Perfomance;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profilo = Doctor::all();

        $data = [
            'profilo' => $profilo,
        ];

        return view('guest.doctor.index', $data);
    }

    public function showProfile($id)
    {

        $doctor = Doctor::find($id);

        $data = [
            'profile' => $doctor,
        ];

        return view ('guest.doctor.show',$data);
        
    }

    public function search(Request $request)
    {
        $search = $request->all();
        $doctor = Doctor::all();
        $data = [
            'doctor' => $doctor,
        ];
        return view('search',$data);
    }

}
