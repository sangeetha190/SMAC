<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function loginForm()
    {
        return view('admin-dashboard.login-management.login');
    }
    public function postLogin(Request $request)
    {
        // dd("text");
        $credentials = [
            "email" => $request['email'],
            "password" => $request['password'],
        ];
        // dd($credentials);
        if (Auth::attempt($credentials)) {

            if (auth()->user()->status == '1') {

                if (auth()->user()->type == 'admin') {
                    return (redirect(route('admin.dashboard')))->with('success', 'You have Successfully loggedin');
                } else {
                    return (redirect(route('my.account')))->with('success', 'You have Successfully loggedin');
                }
            } else {
                Auth::logout();
                return redirect((route('user.login')))->with('error', "Sorry Your Account is Blocked,You Contact Admin");
            }
        }
        return redirect()->back()->with('error', 'You have entered invalid credentials');
    }
    public function postRegistration(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|same:confirmpassword',
        ]);
        // dd('test');
        $data = [
            'first_name' => $request['firstname'],
            'last_name' => $request['lastname'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
        ];
        $data['password'] = Hash::make($request['password']);
        $data['type'] = 'customer';

        // dd($data);

        // dd($datarole);
        $user = User::create($data);
        return redirect()->to(route('user.login'))->with('success', 'Great! You have Successfully registered');
    }
    public function showForgetPasswordForm()
    {
        return view('forgot-password-form');
    }

    public function submitForgetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        // dd($token);
        $alreadysend = DB::table('password_reset_tokens')->where(['email' => $request->email])->first();

        if (!empty($alreadysend)) {
            DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        }
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('emails.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token)
    {

        return view('forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {

        $request->validate([
            // 'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();
        // dd($updatePassword);
        if (!$updatePassword) {
            return back()->with('error', 'Invalid Email!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect()->to(route('user.login'))->with('success', 'Your password has been changed!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->to(route('user.login'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
