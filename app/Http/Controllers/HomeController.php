<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Application|Factory|RedirectResponse|View
     */
    public function home()
    {
        if (in_array(Auth::user()->situation, ['ADMINISTRADOR', 'TUTOR', 'JURADO']))
            return Redirect::route('home');
        else
            return view('thanks');
        // return view('home');
    }

    /**
     * @return Application|Factory|View
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * @return Application|Factory|View
     */
    public function tutorHome()
    {
        return view('tutorHome');
    }

    /**
     * @return Application|Factory|View
     */
    public function juryHome()
    {
        return view('juryHome');
    }
}
