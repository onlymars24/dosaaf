<?php

use App\Services\FoldersService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intramurals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_id');
            $table->integer('type_id');
            $table->string('avatar')->default(FoldersService::INTRAMURAL_DEFAULT_AVATAR);
            $table->longText('outsider_descr');
            $table->longText('inner_descr');
            $table->string('doc')->nullable()->default(null);
            $table->boolean('hidden')->default(false);
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
        Schema::dropIfExists('intramurals');
    }
};