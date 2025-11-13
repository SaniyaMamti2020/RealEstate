<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_setting', function (Blueprint $table) {
            $table->id();
            $table->string('project_title')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('logo_img',100)->nullable();
            $table->string('footer_logo_img',100)->nullable();
            $table->string('icon_img',100)->nullable();
            $table->text('info')->nullable();
            $table->text('page_meta_tag')->nullable();
            $table->text('page_meta_title')->nullable();
            $table->text('page_meta_desc')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
