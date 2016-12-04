<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->index();
            $table->string('uid')->index();
            $table->integer('manage_id')->nullable();
            $table->string('slug')->index();
            $table->string('name');
            $table->string('description', 550);
            $table->string('email')->unique()->nullable();
            $table->string('url')->unique()->nullable();
            $table->boolean('active')->default(1);
            $table->timestamp('expires_at');
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
        Schema::dropIfExists('teams');
    }
}
