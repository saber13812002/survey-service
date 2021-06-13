<?php


namespace App\Repositories;


use App\Models\PackageAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageAnswerRepository implements \App\Interfaces\Repositories\PackageAnswerRepositoryInterface
{

    public function index(Request $request, int $packageId): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageAnswer::query()->where('package_id', $packageId)->simplePaginate();
    }

    public function show(int $id)
    {
        return PackageAnswer::query()->findOrFail($id);
    }

    public function getByQuestionId(int $questionId): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageAnswer::query()->where('question_id', $questionId)->simplePaginate();
    }

    public function store(array $data): PackageAnswer
    {
        $item = new PackageAnswer($data);
        $item->save();

        return $item;
    }

    public function update(int $questionId, array $data)
    {
        $item = PackageAnswer::query()->where('question_id', $questionId)->firstOrFail();
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $id)
    {
        $item = PackageAnswer::query()->findOrFail($id);
        return $item->delete();
    }


    public function getbyPackageIdAndQuestionId(int $packageId, int $questionId)
    {
        return DB::table('package_answers')
            ->where('package_id', $packageId)
            ->where('question_id', $questionId)
            ->groupBy('choice_id')
            ->select('choice_id', DB::raw('count(*) as total'))
            ->get();
    }
}
