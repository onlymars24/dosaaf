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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable()->default(null);
            $table->enum('type', ['lectures', 'test', 'videos']);
            $table->json('list')->nullable()->default(null);
            $table->integer('min_level')->nullable()->default(100);
            $table->integer('priority')->nullable()->default(null);
            $table->string('alias');
            $table->integer('course_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
};
