<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceables', function (Blueprint $table) {
            $table->id();

            $table->integer("package_id");
            $table->integer("serviceable_id");
            $table->string("serviceable_type");

            $table->unique(['serviceable_type', 'serviceable_id', 'package_id'], 'serviceable_unique');

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
        Schema::table('serviceables', function (Blueprint $table) {
            $table->dropUnique('serviceable_unique');
        });

        Schema::dropIfExists('serviceables');
    }
}
