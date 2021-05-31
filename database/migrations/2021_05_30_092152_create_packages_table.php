<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('client_app_id');

            $table->unsignedBigInteger('parent_id')->nullable();

            $table->integer('packable_id');
            $table->string("packable_type");

            $table->string('title');
            $table->longText('description')->nullable();

            $table->string('first_text')->nullable();
            $table->string('final_text')->nullable();

            $table->date('started_at')->nullable();
            $table->date('finished_at')->nullable();

            $table->boolean('is_active')->default(1);
            $table->boolean('is_deletable')->default(1);

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
        Schema::dropIfExists('packages');
    }
}
