<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RadiusController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthRadiusController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->with('error', ' Semua Harus diisi dengan benar!');
        }

        $akses = ([
            'hanya-nama-biasa'      => $request->username,
            'hanya-password-biasa'  => $request->password,
        ]);

        $akses_apaya = ([
            'ipsiapahayo'         => '115.85.80.87',
            'usersiapahayo'       => $akses['hanya-nama-biasa'],
            'pswsiapahayo'        => $akses['hanya-password-biasa'],
            'rahasiabangetlohhhh' => 'mysecret'
        ]);

        $server = $akses_apaya['ipsiapahayo'];
        $user   = $akses_apaya['usersiapahayo'];
        $pass   = $akses_apaya['pswsiapahayo'];
        $secret = $akses_apaya['rahasiabangetlohhhh'];
        $radius = new RadiusController();
        $radius->setServer($server)        // IP or hostname of RADIUS server
            ->setSecret($secret)       // RADIUS shared secret
            ->setNasIpAddress('127.0.0.1')  // IP or hostname of NAS (device authenticating user)
            ->setAttribute(32, 'vpn');       // NAS identifier

        // Send access request for a user with username = 'username' and password = 'password!'
        // echo "Sending access request to $server with username $user\n";
        $response = $radius->accessRequest($user, $pass);
        if ($response === false) {
            // false returned on failure
            // echo sprintf("Access-Request failed with error %d (%s).\n",
            //     $radius->getErrorCode(),
            //     $radius->getErrorMessage(),r
            // );
            return redirect()->route('login')->with('error', ' Wrong Username Or Password!');
            // return $response;
        } else {
            // access request was accepted - client authenticated successfully
            // echo "Success!  Received Access-Accept response from RADIUS server.\n";

            $username = User::where('username',  $user)->first();
            $username = User::firstOrCreate([
                'username' => $user,
            ]);

            $user = Auth::loginUsingId($username->id);

            if($user->email == null) {
                return redirect()->route('index.data-user')->with('warning', ' Complete Your Data First!');
            }

            return redirect()->route('portal')->with('success', ' Sukses Login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('success', ' Sukses Logout');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
