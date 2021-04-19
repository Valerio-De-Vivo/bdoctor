<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Performance;
use App\Specialization;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = Auth::id();

        $profilo = Doctor::find($id);

        $data = [
            'item' => $profilo
          ];

        return view('da mettere', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialization = Specialization::all();

        $performance = Performance::all();

        $data =
        [
          'specializations' => $specialization,
          'performance' => $performance,
        ];

        return view('da mettere', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $id = Auth::id();

        $request->validate(
            [
              'telephone'=>'required|max:20',
            ]);
        
        $newDoctor = new Doctor();

        $newDoctor->user_id= $id;

        $cv = Storage::put('cv', $data['cv']);
        $data['cv'] = $cv;

        $newDoctor->fill($data);

        $newDoctor->save();

        if(array_key_exists('specializations',$data)){
            $newDoctor->specializations()->sync($data['specializations']);
        }

        if(array_key_exists('performances',$data)){
            $newDoctor->perfomances()->sync($data['performances']);
        }

        return redirect()->route('da mettere')->with('status', 'Benvenuto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);

        $data = [
            'profile' => $doctor
        ];

        return view('da mettere', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        $specialization = Specialization::all();
        $performance = Performance::all();

        $data =
        [
          'doctor' => $doctor,
          'specializations' => $specialization,
          'performances' => $performance,
        ];

        return view('da mettere',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $data = $request->all();
        
        $request->validate(
            [
              'telephone'=>'required|max:20',
            ]);
        
        if(array_key_exists('cv',$data)){
            $cv = Storage::put('cv', $data['cv']);
            $data['cv'] = $cv;
        }

        $doctor->update($data);

        if(array_key_exists('specializations',$data)){
            $doctor->specializations()->sync($data['specializations']);
          }

        if(array_key_exists('perfomances',$data)){
            $doctor->perfomances()->sync($data['perfomances']);
          }
        
        return redirect()->route('da mettere')->with('status','Modificato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $doctor->specializations()->sync([]);
        $doctor->perfomances()->sync([]);

        $doctor->delete();

        return redirect()->route('profilo.index')->with('status','Eliminato');

    }
}
