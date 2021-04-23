<?php

namespace App\Http\Controllers\Admin;

use App\Chart;
use App\Review;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::id();

      $month = date('n');
      $year = date('Y');
      $monthName = array('','gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre');

      $label = array();
      $message = array();
      $review = array();
      for ($i=0; $i < 7; $i++) {
        $labelMonth = $month;
        $messages = Message::where('doctor_id', '=', $id)->whereMonth('created_at', '=', $labelMonth)->get();
        $reviews = Review::where('doctor_id', '=', $id)->whereMonth('created_at', '=', $labelMonth)->get();
        array_push($label, $labelMonth);
        array_push($message, count($messages));
        array_push($review, count($reviews));
        if ($month == 1) {
          $month = 12;
        }
        else {
          $month--;
        }
      }

      $labelFirst = array_reverse($label);
      $messFirst = array_reverse($message);
      $revFirst = array_reverse($review);

      $label = array();
      $message = array();
      $review = array();
      for ($i=0; $i < 7; $i++) {
        $labelYear = $year;
        $messages = Message::where('doctor_id', '=', $id)->whereYear('created_at', '=', $labelYear)->get();
        $reviews = Review::where('doctor_id', '=', $id)->whereYear('created_at', '=', $labelYear)->get();
        array_push($label, $labelYear);
        array_push($message, count($messages));
        array_push($review, count($reviews));
        $year--;
      }
      $labelSecond = array_reverse($label);
      $messSecond = array_reverse($message);
      $revSecond = array_reverse($review);

      for ($i=0; $i < 7; $i++) {
        $labelFirst[$i] = $monthName[$labelFirst[$i]];
      }

      $data = [
          'messFirst' => $messFirst,
          'labelFirst' => $labelFirst,
          'revFirst' => $revFirst,
          'messSecond' => $messSecond,
          'labelSecond' => $labelSecond,
          'revSecond' => $revSecond,
      ];

      return view('admin.statistics', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chart $chart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        //
    }
}
