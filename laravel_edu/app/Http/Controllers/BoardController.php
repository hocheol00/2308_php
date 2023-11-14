<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {

        // 쿼리빌더
        //------------
        $result = DB::select('select * from boards');

        $result = DB::select('select * from boards limit :no', ['no' => 1]);
        $result = DB::select('select * from boards limit ? offset ?', [2, 10]);

        // 카테고리가 4, 7, 8 인 게시글의 수를 출력해 주세요
        // 배열에 값 넣고 ? 사용해서 만드는 방법
        $arr = [4, 7, 8];
        $result = DB::select('select count(id) from boards where categories_no = ? or categories_no = ? or categories_no = ?', $arr);
       
        // 쿼리문에 값 다 지정하고 만든 방법
        // $result = DB::select('select count(id) from boards where categories_no = 4 or categories_no = 7 or categories_no = 8');

        // 카테고리별 게시글 갯수를 출력해 주세요

        $result = DB::select('select count(categories_no) from boards group by categories_no');
        
        // 카테고리별 게시글 갯수와 카테고리명을 출력해주세요
        $result = DB::select(
            'SELECT
                ca.no
                ,ca.name
                ,COUNT(ca.no)
            FROM boards bo
                JOIN categories ca
                    ON bo.categories_no = ca.no
            GROUP BY ca.no, ca.name
            '
        );


        $result = DB::select(
            'SELECT cate.name
		        ,cc.cnt
                ,cate.no
            FROM categories AS cate
            JOIN (select count(bo.categories_no) AS cnt, bo.categories_no
    		from boards AS bo
 	    	group by bo.categories_no) AS cc
            ON cate.no = cc.categories_no
        ');

        // --------------insert------------
        // $sql =
        //     'INSERT INTO boards(
        //         title
        //         ,content
        //         ,created_at
        //         ,updated_at
        //         ,categories_no
        //         )
        //     VALUES(?, ?, ?, ?, ?)';
        //     $arr = [
        //         '제목1'
        //         ,'내용내용1'
        //         ,now()
        //         ,now()
        //         ,'0'
        //     ];
        //     DB::beginTransaction();
        //     DB::insert($sql, $arr);
        //     DB::commit();
            $result = DB::select('SELECT * FROM boards ORDER BY id DESC liMIT 1');

            
             // --------------update------------
            // DB::beginTransaction();
            // DB::insert(
            //     'UPDATE boards SET title = ?, content = ? where id = ?'
            //     , ['업데이트1', '업업', $result[0]->id]
            // );
            // DB::commit();


             // --------------delete------------
            DB::beginTransaction();
            DB::delete('DELETE FROM boards WHERE id = ?', [$result[0]->id]);
            DB::commit();


            // ------------
            // 쿼리 빌더 체이닝

            // select * from boards where id = 300;
            $result = 
                DB::table('boards')
                ->where('id', '=', 300)
                ->get();

            // select * from boards where id = 300 or id = 400;
            $result = 
                DB::table('boards')
                ->where('id', '=', 300)
                ->orwhere('id', '=', 400)
                ->get();

             // select * from boards where id = 300 or id = 400 order by id DESC;
            $result = 
            DB::table('boards')
            ->where('id', '=', 300)
            ->orwhere('id', '=', 400)
            ->orderBy('id', 'desc')
            ->get();

            // select * from categories where no in (?, ?, ?)
            $result =
                DB::table('categories')
                ->whereIn('no', [1, 2, 3])
                ->get();

            // select * from categories where no not in (?, ?, ?)
            $result =
                DB::table('categories')
                ->whereNotIn('no', [1, 2, 3])
                ->get();
                
            // first() : limit1하고 비슷하게 동작
            // $result = DB::table('boards')->first();
            $result = DB::table('boards')->orderby('id', 'desc')->first();

            // count() : 결과의 레코드 수를 반환
            $result = DB::table('boards')->count();

            // max() : 해당 컬럼의 최대값
            $result = DB::table('categories')->max('no');


            // 타이틀, 내용 + 카테고7리명 까지 출력
            $result = DB::table('boards')
            ->select('boards.title', 'boards.content', 'categories.name')
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->limit(100)
            ->get();
                
            //카테고리별 게시글 갯수와 케테고리명을 출력해 주시오
            $result = DB::table('boards')
            ->select('categories.no', 'categories.name', DB::raw('count(categories.no)')) // dv::raw 데이터 베이스 문법으로 쓸거다
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->groupby('categories.no', 'categories.name') 
            ->get();

            
            

        return var_dump($result);
    }
}
