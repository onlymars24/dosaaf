<?php

use App\Services\FoldersService;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('descr');
            $table->integer('price');
            $table->string('period');
            $table->string('avatar')->nullable()->default(FoldersService::COURSE_DEFAULT_AVATAR);
            $table->json('docs')->nullable()->default(null);
            $table->boolean('hidden')->default(false);
            $table->integer('category_id');
            $table->integer('type_id');
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
        Schema::dropIfExists('courses');
    }
};
