<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_types', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('alias');
            $table->boolean('is_active')->default(0);

            $table->timestamps();
        });


        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\AnswerTypeSeeder',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_types');
    }
}
