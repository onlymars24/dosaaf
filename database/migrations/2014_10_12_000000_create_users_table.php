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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic')->nullable()->default(null);
            $table->string('organization')->nullable()->default(null);
            $table->string('region');
            $table->string('city');
            $table->string('address');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->enum('status', ['natural', 'legal', 'special']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('selector')->nullable();
            $table->boolean('register_verified')->default(false);
            $table->dateTime('last_active')->default(date("Y-m-d H:i:s"));
            $table->boolean('admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
