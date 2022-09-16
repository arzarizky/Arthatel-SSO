<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class PortalController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::HOME;

    public function portal ()
    {
        $data_user = User::all();
        return view('portal.index', ['data_user' => $data_user]);
    }
}
