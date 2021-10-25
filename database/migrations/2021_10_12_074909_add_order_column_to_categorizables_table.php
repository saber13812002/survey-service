<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderColumnToCategorizablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categorizables', function (Blueprint $table) {
            $table->id()->first();
            $table->integer('order')->after('categorizable_type')->default(0);
            $table->integer('weight')->after('order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categorizables', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->dropColumn('order');
            $table->dropColumn('weight');
        });
    }
}
