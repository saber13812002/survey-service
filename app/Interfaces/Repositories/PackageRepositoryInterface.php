<?php


namespace App\Interfaces\Repositories;


interface PackageRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data);

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

    /**
     * @param array $categoryIds
     * @param int $packageId
     * @return mixed
     */
    public function attachCategorizable(array $categoryIds, int $packageId);

    /**
     * @param array $categoryIds
     * @param int $packageId
     * @return mixed
     */
    public function detachCategorizable(array $categoryIds, int $packageId);

    /**
     * @param array $campaignIds
     * @param int $packageId
     * @return mixed
     */
    public function attachCampanile(array $campaignIds, int $packageId);

    /**
     * @param array $campaignIds
     * @param int $packageId
     * @return mixed
     */
    public function detachCampanile(array $campaignIds, int $packageId);

    /**
     * @param array $tagIds
     * @param int $packageId
     * @return mixed
     */
    public function attachTaggable(array $tagIds, int $packageId);

    /**
     * @param array $tagIds
     * @param int $packageId
     * @return mixed
     */
    public function detachTaggable(array $tagIds, int $packageId);
}
