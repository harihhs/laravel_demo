<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('metric_id')->unsigned();
            $table->string('option_name');
            $table->integer('option_value');
            $table->string('img_name');
            $table->timestamps();

            $table->foreign('metric_id')
            ->references('id')
            ->on('metrics')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metrics_options');
    }
}
