<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function login(Request $request) {
        $result = User::where('email', $request->email)->first();
        // if(!$result || !(Hash::check($request->password, $result->password))){
        //     $errorMsg = ['아이디와 비밀번호를 다시 확인해주세요'];
        //     return response()->json([
        //         'code' => 'E04'
        //         ,'errorMsg' => $errorMsg
        //     ], 300);
        // };
        return response()->json([
            'data' => $result
        ],200);
    }
}
