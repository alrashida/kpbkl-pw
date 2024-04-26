<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('content');
            $table->date('tgl_publish');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program');
    }
};
