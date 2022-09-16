<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Controllers\VerifyEmailController;



class DataUserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('auth.verification-user', ['user' => $user]);
    }

    public function updateDataUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email|unique:users,email'
        ]);

        $ruleEmail = User::where('email', $request->email)->get();

        if($ruleEmail->count() > 0){
            return redirect()->route('index.data-user')->with('error', ' Email Sudah Ada!');
        }

        if ($validator->fails()) {
            return redirect()->route('index.data-user')->with('error', ' Semua Harus diisi dengan benar!');
        }

        $user = User::findOrFail($id);
        $user->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email
        ]);

        return redirect()->route('portal')->with('success', ' Sukses Login');
    }
}
