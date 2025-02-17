<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return new JsonResponses(Response::HTTP_OK,"Validasi Register Gagal.",$validator->errors());
        }

        //create user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role' => 'user'
        ]);

        // Kirim email verifikasi
        event(new Registered($user));

        //return response JSON user is created
        if ($user) {
            return new JsonResponses(Response::HTTP_CREATED,"User registered successfully. Please verify your email.",$user);
        }
    }
}
