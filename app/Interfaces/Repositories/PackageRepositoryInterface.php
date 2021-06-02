<?php


namespace App\Interfaces\Repositories;


interface PackageRepositoryInterface
{
    /**
     * @return mixed
     */
    public function index();

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

    /**
     * @param array $category_ids
     * @param int $package_id
     * @return mixed
     */
    public function attachCategorizable(array $category_ids, int $package_id);

    /**
     * @param array $category_ids
     * @param int $package_id
     * @return mixed
     */
    public function detachCategorizable(array $category_ids, int $package_id);

    /**
     * @param array $campaign_ids
     * @param int $package_id
     * @return mixed
     */
    public function attachCampanile(array $campaign_ids, int $package_id);

    /**
     * @param array $campaign_ids
     * @param int $package_id
     * @return mixed
     */
    public function detachCampanile(array $campaign_ids, int $package_id);

    /**
     * @param array $tag_ids
     * @param int $package_id
     * @return mixed
     */
    public function attachTaggable(array $tag_ids, int $package_id);

    /**
     * @param array $tag_ids
     * @param int $package_id
     * @return mixed
     */
    public function detachTaggable(array $tag_ids, int $package_id);
}
