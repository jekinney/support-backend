<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id')->index();
            $table->integer('owner_id');
            $table->string('uid')->index();
            $table->string('slug')->index();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('url')->unique();
            $table->boolean('active')->default(1);
            $table->integer('team_count')->default(0);
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
        Schema::dropIfExists('companies');
    }
}
