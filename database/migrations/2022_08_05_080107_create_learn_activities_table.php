<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('method_id');
            $table->foreign('method_id')->references('id')->on('learn_activity_methods');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('learn_activities');
    }
}
