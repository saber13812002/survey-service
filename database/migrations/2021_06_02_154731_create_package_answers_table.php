<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('client_app_id')->nullable();

            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->unsignedBigInteger('choice_id')->nullable();

            $table->string('title')->nullable();
            $table->longText('description')->nullable();

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
        Schema::dropIfExists('package_answers');
    }
}
