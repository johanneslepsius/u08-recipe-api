<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->firstOrFail();

        $token = $user->createToken('token')->plainTextToken;

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();

            return response()->json([
                'message' => 'Login Successful',
                'token' => $token,
            ], 200);
        }

        return response()->json([
                'message'=>'Login failed',
                'credentials'=>$credentials,
            ], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string'
        ]);

        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
        ]);

        $token = $user->createToken('token');

        $response = ['user'=>$user, 'token'=>$token->plainTextToken];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        // auth()->user()->tokens()->logout();
// 
        // return response()->json([
            // 'message' => 'Logged out!'
        // ]);
        // Auth::logout();
        $request->user()->currentAccessToken()->delete();
        return response('logged out');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
