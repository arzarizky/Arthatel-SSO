<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfilUserController extends Controller
{
    public function updateProfilUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name'    => ['string'],
            'last_name'     => ['string'],
            'email'         => ['email', 'unique:users,email,' . $user->id],
            'avatar'        => ['image', 'mimes:png,jpg,svg,jpeg', 'max:2048']
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $error = json_decode($errors);
            $emailError = $error->email;
            if ( $emailError == true) {
                $message = $emailError[0];
                return redirect()->route('portal')->with('error', $message);
            }
            return redirect()->route('portal')->with('error', 'The data entered must be correct!');
        }

        $user->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email
        ]);

        return redirect()->route('portal')->with('success', ' Profile updated successfully');

    }

    public function updateProfilAvatarUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = $request->validate([
            'avatar'        => ['image', 'mimes:png,jpg,svg,jpeg', 'max:2048']
        ]);

        $path = $request->file('avatar')->store('public/Image/Avatar');
        $nameFile = 'storage/Image/Avatar/'.$request->file('avatar')->hashName();
        $validator['avatar'] = $nameFile;

        if(File::exists(public_path($user->avatar))){
            File::delete($user->avatar);
        }

        $user->update(['avatar'=> $nameFile]);

        return redirect()->route('portal')->with('success', ' Avatar successfully updated');
    }
}
