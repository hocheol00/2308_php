<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('welcome');
});


// 라우트 정의
// -----------
// 문자열 리턴
Route::get('/hi', function () {
    return '안녕하세요';
});

// 없는 뷰파일을 리턴할 때 (디버그모드 설정이 false면 500에러, true 면 라라벨 상세 에러 )
Route::get('/myview', function () {
    return view('myview');
});

// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된것이 실행
// ------------
// GET메소드로 localhost/home으로 접속했을 때 home이라는 뷰파일을 리턴해주세요
Route::get('/home', function () {
    return view('home');
});

Route::post('/home', function () {
    return '매소드 : post';
});

// put 요청
// view의 form [@method('put')]을 추가해야한다
Route::put('/home', function () {
    return '매소드 : put';
});

Route::delete('/home', function () {
    return '매소드 : delete';
});

// ---------
// 라우트에서 파아미터 제어
// 쿼리 스트링에 파라미터가 셋팅되서 요청이 올 때 파라미터 획득
// 리퀘스트 객체에 담아서 파라미터 사용가능
Route::get('/query', function (Request $request) {
    return $request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}', function ($id) {
    return '세그먼트 파라미터 : '.$id;
});

// 2개 이상 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function ($id, $name) {
    return '세그먼트 파라미터 2개 이상 : '.$id.', '.$name;
});

// 다영한 방법으로 파라미터 획득 가능
Route::get('/segment2/{id}/{name}', function (Request $request, $id) {
    return '세그먼트 파라미터 222222 : '.$request->id.', '.$id; // 세그먼트 아이디 두번 출력됨
});

//URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('segment3/{id?}', function ($id = 'base') {
    return 'segment3 : '.$id;
});

//  라우트 매칭 실패시 대체 라우트 정의
// -----------------
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
}); // url 잘못 입력시 나오는 출력

// -------------
// 라우트의 이름 지정
Route::get('/name', function () {
    return view('name');
});
Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});
Route::get('/name/home/php504/user', function () {
    return '이름 있는 라우트';
})->name('name.user');





//---------------------
// 컨트롤러
// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index'); //라우터이름(해당기능명.엑션명)

// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);


//GET|HEAD        task .................... task.index › TaskController@index 
//POST            task .................... task.store › TaskController@store //작성이 된것
//GET|HEAD        task/create ............. task.create › TaskController@create // 작성 페이지로 가는거
//GET|HEAD        task/{task} ............. task.show › TaskController@show 
//PUT|PATCH       task/{task} ............. task.update › TaskController@update 
//DELETE          task/{task} ............. task.destroy › TaskController@destroy 
//GET|HEAD        task/{task}/edit ........ task.edit › TaskController@edit



// --------------
// 블레이드 템플릿 이동관련 (child 파일 불러오기)
Route::get('/child1', function(){  // 라우트 겟에 열고싶은 파일 설정
    return view('child1')->with('gender', '0');
     // 리턴값에 뷰안에 있는 차일드 폴더 열기 경로 설정
});

Route::get('/child2', function(){
    $arr = [
        'name' => '신호철'
        ,'age' => 27
        ,'gender' => '상남자'
    ];
    $arr2 = [];
    return view('child2')->with('data', $arr)->with('data2', $arr2);
});
