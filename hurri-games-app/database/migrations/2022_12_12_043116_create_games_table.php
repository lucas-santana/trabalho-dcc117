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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            /*$table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');*/

            /*$table->unsignedBigInteger('deal_id')->nullable();
            $table->foreign('deal_id')->references('id')->on('deals');*/
            $table->foreignId('deal_id')->nullable()->constrained();
            //$table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('dev_user_id')->nullable();
            $table->foreign('dev_user_id')->references('id')->on('users');

            $table->string('name');
            $table->string('description');
            $table->date('released_at');
            $table->decimal('normal_price');
            $table->decimal('promotional_price')->nullable();
            $table->json('languages');
            $table->string('operational_system');
            $table->string('processor');
            $table->string('graphics_card');
            $table->string('directx');
            $table->string('storage');
            $table->string('memory');

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
        Schema::dropIfExists('games');
    }
};
