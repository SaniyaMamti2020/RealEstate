<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonial', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->string('designation',100)->nullable();
            $table->string('image',100)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('testimonials');
    }
}
