<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->string('sub_title',100)->nullable();
            $table->string('slider_img',100)->nullable();
            $table->string('btn_name',100)->nullable();
            $table->string('btn_link',100)->nullable();
            $table->integer('disp_order')->default(0)->nullable();
            $table->boolean('status')->nullable()->default(1);
            $table->bigInteger('delete_by')->default(0)->nullable();
            $table->bigInteger('created_by')->default(0)->nullable();
            $table->bigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('sliders');
    }
}
