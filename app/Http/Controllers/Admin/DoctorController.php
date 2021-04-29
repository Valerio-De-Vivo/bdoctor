<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Doctor;
use App\Performance;
use App\Specialization;
use App\Review;
use App\Message;

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
        $rev = Review::where('doctor_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $messages = Message::where('doctor_id', '=', $id)->orderBy('created_at', 'desc')->get();


        $data = [
            'item' => $profilo,
            'rev' => $rev,
            'mess' => $messages

        ];

        return view('admin.profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();

        $profilo = Doctor::find($id);

        $specialization = Specialization::all();

        $performance = Performance::all();

        $data =
        [
          'specializations' => $specialization,
          'performance' => $performance,
          'dati_dottore' => $profilo
        ];

        return view('admin.create', $data);
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
                'address'=>'required|max:200',
                'city'=>'required|max:100',
                'specialization'=>'required',
            ]);

        $data_doctor = Doctor::find($id);
        $newDoctor = new Doctor();

        $newDoctor->user_id = $id;

        $newDoctor->name = $data_doctor-> name;
        $newDoctor->surname = $data_doctor-> surname;


        $newDoctor->fill($data);

        $newDoctor->save();

        if(array_key_exists('specializations',$data)){
            $newDoctor->specializations()->sync($data['specializations']);
        }

        if(array_key_exists('performances',$data)){
            $newDoctor->perfomances()->sync($data['performances']);
        }

        return redirect()->route('crea-dottore')->with('status', 'Modifiche aggiornate');
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

        return view('admin.profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = Auth::id();
        $doctor = Doctor::where('user_id', $id)->first();

        $specialization = Specialization::all();
        $performance = Performance::all();

        $data =
        [
          'dati_dottore' => $doctor,
          'specializations' => $specialization,
          'performance' => $performance,
        ];

        return view('admin.create',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::id();
        // $doctor = Doctor::find($id);
        $doctor = Doctor::where('user_id', $id)->first();


        $data = $request->all();

        // dd($doctor);

        // $request->validate(
        //     [
        //     'address'=>'required|max:200',
        //     'city'=>'required|max:100',
        //     'specialization'=>'required',
        //     ]);

        $doctor->update($data);
        if(array_key_exists('specializations',$data)){
            $doctor->specializations()->sync($data['specializations']);
          }

        if(array_key_exists('perfomances',$data)){
            $doctor->perfomances()->sync($data['perfomances']);
          }

        return redirect()->route('crea-dottore')->with('status','Modifiche aggiornate');
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

        return redirect()->route('guest.home')->with('status','Eliminato');

    }
}
