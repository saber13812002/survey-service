<?php


namespace App\Repositories;


use App\Models\PackageAnswer;
use Illuminate\Http\Request;

class PackageAnswerRepository implements \App\Interfaces\Repositories\PackageAnswerRepositoryInterface
{

    public function index(Request $request, int $package_id): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageAnswer::query()->where('package_id', $package_id)->simplePaginate();
    }

    public function show(int $id)
    {
        return PackageAnswer::query()->findOrFail($id);
    }

    public function showByQuestionId(int $question_id): \Illuminate\Contracts\Pagination\Paginator
    {
        return PackageAnswer::query()->where('question_id', $question_id)->simplePaginate();
    }

    public function store(array $data): PackageAnswer
    {
        $item = new PackageAnswer($data);
        $item->save();

        return $item;
    }

    public function update(int $question_id, array $data)
    {
        $item = PackageAnswer::query()->where('question_id', $question_id)->firstOrFail();
        $item->fill($data);
        $item->save();
        return $item;
    }

    public function destroy(int $Id)
    {
        $item = PackageAnswer::query()->findOrFail($Id);
        return $item->delete();
    }
}
