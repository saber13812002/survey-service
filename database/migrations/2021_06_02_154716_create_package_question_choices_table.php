<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageQuestionChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_question_choices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('question_id');

            $table->string('title');
            $table->longText('description')->nullable();

            $table->integer('order')->default(0);
            $table->integer('weight')->default(1);
            $table->boolean('is_active')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_question_choices');
    }
}
