<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\PackageQuestionChoiceFilter;

interface PackageQuestionChoiceRepositoryInterface
{

    /**
     * @param int $questionId
     * @return mixed
     */
    public function index(PackageQuestionChoiceFilter $filters, int $questionId);

    /**
     * @param int $questionId
     * @return mixed
     */
    public function getByQuestionId(PackageQuestionChoiceFilter $filters, int $questionId);

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $data
     * @param int $packageQuestionId
     * @return mixed
     */
    public function store(array $data, int $packageQuestionId);

    /**
     * @param array $data
     * @param int $questionId
     * @return mixed
     */
    public function updateBulk(array $data, int $questionId);

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy(int $id);


}
