<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobprofileCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_cats', function (Blueprint $table) {
         
            $table->integer('job_profile_id')->unsigned();
            $table->integer('profile_category_id')->unsigned();
            $table->foreign('job_profile_id')->references('id')->on('job_profiles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('profile_category_id')->references('id')->on('profile_categories')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prof_cats');
    }
}
