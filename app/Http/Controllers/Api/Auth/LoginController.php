<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\JsonResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            //set validation
            $validator = Validator::make($request->all(), [
                'email'     => 'required',
                'password'  => 'required'
            ]);

            //if validation fails
            if ($validator->fails()) {
                return new JsonResponses(Response::HTTP_BAD_REQUEST, "Validasi Login Gagal.", $validator->errors());
            }

            //get credentials from request
            $credentials = $request->only('email', 'password');

            //if auth failed
            if (!$token = auth()->guard('api')->attempt($credentials)) {
                return new JsonResponses(Response::HTTP_BAD_REQUEST, "Email atau Password Anda salah", null);
            }

            //if auth success
            return new JsonResponses(
                Response::HTTP_OK,
                'Berhasil Login!',
                ['user' => auth()->guard('api')->user(), 'token' => $token]
            );
        } catch (\Exception $e) {
            return new JsonResponses(Response::HTTP_INTERNAL_SERVER_ERROR, 'Ada kesalahan!', $e->getMessage());
        }
    }
}
