<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Advertise;
use App\Message;
use App\Review;
use App\Specialization;
use App\Performance;
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
        $spec = Specialization::find($id);
        $perf = Performance::find($id);
        $rev = Review::where('doctor_id', '=', $id)->orderBy('created_at', 'desc')->get();
        // $rev = Review::find($id);

        // dd($rev);


        $data = [
            'profile' => $doctor,
            'specialization' => $spec,
            'performance' => $perf,
            'rev' => $rev
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
