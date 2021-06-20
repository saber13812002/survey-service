<?php


namespace App\Interfaces\Repositories;


interface PackageQuestionRepositoryInterface
{

    /**
     * @param int $packageId
     * @return mixed
     */
    public function getByPackageId(int $packageId);

    /**
     * @param int $packageId
     * @return mixed
     */
    public function getReportByPackageId(int $packageId);

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $data
     * @param int $packageId
     * @return mixed
     */
    public function store(array $data, int $packageId);

    /**
     * @param array $data
     * @param int $packageId
     * @return mixed
     */
    public function updateBulk(array $data, int $packageId);

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
