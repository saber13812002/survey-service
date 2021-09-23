<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUniqueToPackageAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_answers', function (Blueprint $table) {
            $table->unique(['package_id', 'question_id', 'user_id'], 'package_answers_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_answers', function (Blueprint $table) {
            $table->dropUnique('package_answers_unique');
        });
    }
}
