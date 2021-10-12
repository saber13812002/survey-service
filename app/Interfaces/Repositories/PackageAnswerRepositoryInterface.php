<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\PackageAnswerFilter;

interface PackageAnswerRepositoryInterface
{
    public function index(PackageAnswerFilter $filters, int $packageId);

    public function show(int $id);

    public function getByQuestionId(int $questionId);

    public function store(array $data);

    public function update(int $questionId, array $data);

    public function storeUpdateBulk(array $data, int $packageId);

    public function userStoreUpdateBulk(array $data, int $userId, int $packageId);

    public function destroy(int $id);

    public function getByPackageIdAndQuestionId(int $packageId, int $questionId);

    public function getByPackageIdAndUserId(PackageAnswerFilter $filters, int $packageId, int $userId);
}
