<?php


namespace App\Interfaces\Repositories;


interface PackageQuestionRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param int $packageId
     * @return mixed
     */
    public function getByPackageId(int $packageId);

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data, int $packageId);

    /**
     * @param array $data
     * @return mixed
     */
    public function storeBulk(array $data);

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
