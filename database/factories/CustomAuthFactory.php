<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')->with('message', 'Signed in!');
        }

        return redirect('/login')->with('message', 'Login details are not valid!');
    }
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('home')->with('success', 'You have successfully signed in!');
    //     } else if (User::where('email', $request->email)->exists()) {
    //         return redirect('/login')->with('error', 'Password anda salah!');
    //     } else  {
    //         return redirect('/login')->with('error', 'Email dan password salah !');
    //     }
    // }


    public function signup()
    {
        return view('registration');
    }

    public function signupsave(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'jabatan' => 'required',
        'password' => 'required|min:4',
    ], [
        'password.min' => 'Password minimal 4 characters.'
    ]);

    $data = $request->all();
    $check = $this->create($data);

    return redirect("home");
}


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'jabatan' =>$data['jabatan'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        return redirect('/login');
    }

    public function signOut()
{
    Session::flush();
    Auth::logout();

    return redirect()->route('welcome');
}

}
