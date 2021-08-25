<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCorrectChoiceIdFieldToPackageQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('package_questions', function (Blueprint $table) {
            $table->dropColumn('correct_choice_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('package_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('correct_choice_id')->nullable();
        });
    }
}
