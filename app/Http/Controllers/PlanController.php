<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Subscription;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
          $plans = Plan::all();
          $id = Auth::id();
          $activePlan = Subscription::where('user_id', '=', $id)->first();
          $data = [
            'plans'=>$plans,
            'activeplan'=>$activePlan
          ];
          return view('plans.index', $data);
    }

    public function show(Plan $plan, Request $request)
    {
            if($request->user()->subscribedToPlan($plan->stripe_plan, 'main')) {
                return redirect()->route('home')->with('success', 'You have already subscribed the plan');
            }
            return view('plans.show', compact('plan'));
     }
}
