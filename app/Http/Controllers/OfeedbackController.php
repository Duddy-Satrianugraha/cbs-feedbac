<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ofeedback;

class OfeedbackController extends Controller
{
    public function index(){
        $user = Auth::user();
        $feedback = Ofeedback::where('npm', $user->username)->get();
        return view('mhs.feedback.list', compact('feedback'));
    }


}
