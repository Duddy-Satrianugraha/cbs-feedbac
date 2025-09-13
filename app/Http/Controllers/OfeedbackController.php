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

    public function show($id){
        $user = Auth::user();
        $feedback = Ofeedback::where('npm', $user->username)->find($id);
        if (!$feedback) {
            return redirect()->back()->with('msg', 'danger-Feedback tidak ditemukan');
        }
        return view('mhs.feedback.show', compact('feedback'));
    }

    public function cetak($id){

        $user = Auth::user();
        $feedback = Ofeedback::where('npm', $user->username)->find($id);
        if (!$feedback) {
            return redirect()->back()->with('msg', 'danger-Feedback tidak ditemukan');
        }
        //return view('mhs.pdf.station', compact('feedback'));
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('mhs.feedback.station', compact('feedback'))
                  ->setPaper('A4', 'potrait'); // bisa A6/A7 dan landscape biar cocok ukuran name tag

        return $pdf->stream('nametag_'.$user->username.'.pdf');

    }

}
