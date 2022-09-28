<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TimController extends Controller
{
    public function index()
    {
        $data_user = User::all();
        return view('portal.index', ['data_user' => $data_user]);
    }
}
