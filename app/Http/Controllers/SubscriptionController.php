<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan)
    {
          if($request->user()->subscribedToPlan($plan->stripe_plan, 'main')) {
              return redirect()->route('plans.index')->with('success', 'Hai già la promozione attiva!');
          }
          $plan = Plan::findOrFail($request->get('plan'));

          $request->user()
              ->newSubscription('main', $plan->stripe_plan);

          $newSub = New Subscription();
          $id = Auth::id();
          $newSub->user_id = $id;
          $newSub->name = $request->get('plan-name');
          $newSub->save();

          return redirect()->route('plans.index')->with('success', 'Promozione attivata con successo');
    }
}
