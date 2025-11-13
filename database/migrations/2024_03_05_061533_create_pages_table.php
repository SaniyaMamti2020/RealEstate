<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name',100)->nullable();
            $table->string('page_slug',100)->nullable();
            $table->string('page_img',100)->nullable();
            $table->text('page_desc')->nullable();
            $table->text('page_meta_tag')->nullable();
            $table->text('page_meta_title')->nullable();
            $table->text('page_meta_desc')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
