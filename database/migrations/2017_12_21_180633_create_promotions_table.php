<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index()->nullable();
            $table->integer('subcategory_id')->unsigned()->index()->nullable();
            $table->string('image')->index()->nullable();
            $table->string('title');
            $table->text('description');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('promo_code')->nullable();
            $table->integer('likes')->default(0);



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
        Schema::dropIfExists('promotions');
    }
}
