<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
// use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // 로그인 체크
        // del 231116 미들웨어로 이관
        // if(!Auth::check()) {
        //     return redirect()->route('user.login.get');
        // }

        // 게시글 획득
        $result = Board::get();

        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $result = Board::get();
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 작성처리 (인서트 처리할때 사용 많이함)
        $arrInpuDate = $request->only('b_title', 'b_content');
        $result = Board::create($arrInpuDate);

        // save를 이용하는 방법 (업데이트 사용 할때)
        // $model = new Board($arrInpuDate); 
        // $model->save();

        return redirect()->route('board.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 게시글 데이터 확인
        // $result = Board::where('b_id', '=', $id)->get();
        $result = Board::find($id);

        // 조회수 올리기
        $result->b_hits++; // 조회수 1증가
        $result->timestamps= false;

        // 업데이트 처리
        $result->save(); // sava 변경한 값 업데이트 함

        
        return view('detail')->with('data', $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Board::find($id);

        return view('update')->with('data', $result);
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
        $result = Board::find($id);
        $result->update([
            'b_title' => $request->input('b_title'),
            'b_content' => $request->input('b_content')
        ]);
        // $result->b_title = $request->b_title;  성찬이 방법 // 대신 업데이트문의 태그 네임을 같이 지정해놔야한다
        // $result->b_content = $request->b_content;
        // return redirect()->route('board.show', ['board' => $result->b_id]); 변경후 디테일 페이지로
        $result->save();
        return redirect()->route('board.index');
    
        
        // $model = new Board($arrInpuDate); 
        // $model->save();
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::beginTransaction();
        $result = Board::find($id);
        $result->delete();
        return redirect()->route('board.index');
        //  
    }
}

// 삭제 처리 하는 방법 (쌤꺼 보고함)
// try {
//     DB::beginTransaction();
//     Log::debug("트랜잭션 시작");
//     Board::destroy($id);
//     Log::debug("삭제 완료");
//     DB::commit();
//     Log::debug("커밋 완료");
// } catch(Exception $e) {
//     DB::rollback();
//     Log::debug("예외 발생 : 롤백 완료");
//     return redirect()->route('error')->withErrors($e->getMessage());
// }  finally {
//     Log::debug("*****삭제처리 종료*****");
//     }
//     return redirect()->route('board.index');
