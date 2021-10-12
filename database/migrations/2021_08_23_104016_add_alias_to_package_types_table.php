<?php

use App\Models\PackageType;
use App\Models\Survey;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAliasToPackageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_types', function (Blueprint $table) {
            $table->string('alias')->after('model_name')->nullable();
        });

        $this->updateData();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_types', function (Blueprint $table) {
            $table->dropColumn('alias');
        });
    }


    private function updateData()
    {
        $itemTypes = array(
            ["id" => 1, "title" => "نظرسنجی", "model_name" => Survey::class, "is_active" => 1, "alias" => "SURVEY"],
            ["id" => 2, "title" => "آزمون", "model_name" => \App\Models\Exam::class, "is_active" => 0, "alias" => "EXAM"],
            ["id" => 3, "title" => "کوییز", "model_name" => \App\Models\Quiz::class, "is_active" => 1, "alias" => "QUIZ"],
            ["id" => 4, "title" => "رای گیری", "model_name" => \App\Models\Poll::class, "is_active" => 0, "alias" => "POLL"]
        );

        foreach ($itemTypes as $item) {
            PackageType::query()->where("id", $item["id"])->update($item);
        }
    }
}
