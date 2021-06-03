<?php


namespace App\Interfaces\Repositories;


interface PackageQuestionRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param int $package_id
     * @return mixed
     */
    public function getByPackageId(int $package_id);

    /**
     * @param int $Id
     * @return mixed
     */
    public function show(int $Id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function storeBulk(array $data);

    /**
     * @param int $Id
     * @param array $data
     * @return mixed
     */
    public function update(int $Id, array $data);

    /**
     * @param int $Id
     * @return mixed
     */
    public function destroy(int $Id);


}
