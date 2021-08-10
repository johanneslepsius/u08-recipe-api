<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login (Request $request) {
        // $rules = [
            // 'email' => ['required', 'email'],
            // 'password' => ['required'],
        // ];

        // $validator = Validator::make($request->all(), $rules);
// 
        // if ($validator->fails()) {
            // $messages = $validator->messages();
            // $response = $messages->all();
            // return response()->json([
                // 'message' => $response,
            // ], 400);
        // }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('token')->plainTextToken;

        if (Auth::attempt($request->all())) {
            return response()->json([
                'message' => 'Login Successful',
                'token' => $token,
                'user'=> $user
            ], 200);
        }

        return response()->json([
                'message'=>'Login failed, try another username or password.'
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
    
        $rules = [
            'name'=>'required|string|unique:users',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            $messages = $validator->messages();
            $response = $messages->all();
            return response()->json([
                'message' => $response,
            ], 409);
        }

        $user = User::create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>bcrypt($request['password'])
        ]);

        $token = $user->createToken('token');

        if ($user) {
            return response()->json([
                'message'=>'Registration successful',
                'user'=>$user,
                'token'=>$token->plainTextToken
            ], 201);
        }
        
        return response()->json([
                'message'=>'Registration successful',
                'user'=>$user,
                'token'=>$token->plainTextToken
            ], 201);
        
    }

    public function logout(Request $request)
    {
        if ($request->user()->currentAccessToken()->delete()) {
            return response()->json(['message'=>'Logged out'], 200);
        }
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
