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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->char('no', 1)->uniqid(); // 캐릭터1의(넘버) 유니크 제약조건이 들어간것(중복이 안되기 위해)
            $table->string('name', 20)->uniqid(); //게시판 이름 // name이라는 컬럼명에ㅐ varchar(20)
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
