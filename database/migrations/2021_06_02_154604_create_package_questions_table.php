<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('package_id');

            $table->string('title');
            $table->longText('description')->nullable();

            $table->unsignedBigInteger('answer_type_id')->nullable();
            $table->unsignedBigInteger('correct_choice_id')->nullable();

            $table->integer('order')->default(0);
            $table->integer('weight')->default(1);
            $table->boolean('is_active')->default(1);

            $table->unsignedBigInteger('source_id')->nullable();
            $table->json('event_ids')->nullable();

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
        Schema::dropIfExists('package_questions');
    }
}
