<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            // 글번호, 제목, 내용, 작성일, 수정일, 삭제일자
            $table->id(); // big_int, pk, auto_increment
            $table->string('title', 50); // var_char(50), not null
            $table->string('content', 1000); // var_char(1000), not null(디폴트가 notnull)
            // $table->timestamps(); // created_at, updated_at 자동으로 만들어짐 , 디폴트 null 허용이다
            $table->timestamps();
            $table->softDeletes(); // deleted_at, null 허용
            // default('CURRENT_TIMESTAMP'); 현재날짜 설정
            // $table->timestamps(); / 자동으로 created_at, updated_at 라라벨 내부 설정 값으로 생성해줌
            // created_at, updated_at / default : null(라라벨 내부 설정 값)
            // cf) 설정하고 싶은 값과 다를 경우 라라벨 내부 설정 값 timestamps()보다 직접 생성하는게 좋음
           
        });
    }

    
    //php artisan migrate 테이블 데이터 추가할때 터미널에 사용
    // php artisan make:model category 터미널에 모델 생성하는 방법

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
