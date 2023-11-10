<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index() {
        return view('test')->with('nhhh', 'w존'); //with (변수이름 ,  값) 네임이라는 변수안에 존이라는 값을 넣어서 보여줘라
        
    }
}
