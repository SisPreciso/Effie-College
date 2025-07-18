<?php

namespace App\Http\Controllers;

use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class PDFCasesController extends Controller
{
    /**
     * @param User $user
     * @return mixed
     */
    public function index(User $user)
    {
        // return $user->username;
        $pdf = PDF::loadView('cases-pdf.index', compact('user'));

        return $pdf->stream('caso-' . $user->username . '.pdf');
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('cases-pdf.index', compact('user'));
    }
}
