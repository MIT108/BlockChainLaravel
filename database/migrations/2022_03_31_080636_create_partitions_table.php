<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partitions', function (Blueprint $table) {
            $table->id();
            $table->double('area');
            $table->string('location')->nullable();
            $table->string('feature_id')->nullable();
            $table->integer('coordinate_lenth')->nullable();
            $table->enum('feature_type',['MultiPolygon','Polygon']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('land_certificate_id');
            $table->foreign('land_certificate_id')->references('id')->on('land_certificates');
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
        Schema::dropIfExists('partitions');
    }
}
