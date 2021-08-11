<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class TimerController extends Controller
{

    public function __construct()
    {
        $this->middleware('autenticador');
    }
    
    public function index()
    {
       
        return view('timer.index');
    }

    public function updateTotalTime(Request $request)
    {
        $total = $request->totalTime;
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->totalTime += $total;
        $user->save();

        return redirect()->route('timer');
    }

    public function ranking () 
    {
        $users = User::query()->orderBy('totalTime', 'desc')->limit(10)->get();

        return view('timer.ranking', compact('users'));
    }
}