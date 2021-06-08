<?php


namespace App\Interfaces\Repositories;


use Illuminate\Http\Request;

interface PackageAnswerRepositoryInterface
{
    public function index(Request $request, int $packageId);

    public function show(int $id);

    public function getByQuestionId(int $questionId);

    public function store(array $data);

    public function update(int $questionId, array $data);

    public function destroy(int $id);
}
