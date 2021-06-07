<?php


namespace App\Interfaces\Repositories;


use Illuminate\Http\Request;

interface PackageAnswerRepositoryInterface
{
    public function index(Request $request, int $package_id);

    public function show(int $Id);

    public function showByQuestionId(int $question_id);

    public function store(array $data);

    public function update(int $question_id, array $data);

    public function destroy(int $Id);
}
