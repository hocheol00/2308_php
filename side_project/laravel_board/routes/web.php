<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// 유저관련
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get'); //로그인 화면 이동
Route::middleware('my.user.validation')->post('/user/login', [UserController::class, 'loginpost'])->name('user.login.post'); // 로그인 처리
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registration.get'); //회원가입 이동
Route::middleware('my.user.validation')->post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registration.post'); //회원가입 처리
Route::get('/user/logout', [UserController::class, 'logoutget'])->name('user.logout.get');
//   GET|HEAD        user ............................ user.index › UserController@index  로그인 화면이동
//   GET|HEAD        user/{user}/edit .................. user.edit › UserController@edit  로그인 처리
//   GET|HEAD        user/create ................... user.create › UserController@create  회원가입 화면이동
//   POST            user ............................ user.store › UserController@store  회원가입 처리
//   GET|HEAD        user/{user} ....................... user.show › UserController@show  회원정보 화면이동
//   PUT|PATCH       user/{user} ................... user.update › UserController@update  회원정보 수정 처리
//   DELETE          user/{user} ................. user.destroy › UserController@destroy  회원 탈퇴 처리



// 보드관련
Route::middleware('auth')->resource('/board',BoardController::class);
// 유효성 체크같은 공통된 처리를 미들웨어로 처리 할수있다 ('auth')
//   GET|HEAD        board ...................................... board.index › BoardController@index  게시판 화면이동
//   GET|HEAD        board/create ............................. board.create › BoardController@create  게시글 create 화면이동
//   POST            board ...................................... board.store › BoardController@store  게시글 insert 처리
//   GET|HEAD        board/{board} ................................ board.show › BoardController@show  게시글 detail 화면이동
//   DELETE          board/{board} .......................... board.destroy › BoardController@destroy  게시글 delete 처리
//   GET|HEAD        board/{board}/edit ........................... board.edit › BoardController@edit  게시글 update 화면이동
//   PUT|PATCH       board/{board} ............................ board.update › BoardController@update  게시글 update 처리







