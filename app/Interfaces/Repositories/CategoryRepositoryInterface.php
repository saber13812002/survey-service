<?php


namespace App\Interfaces\Repositories;


interface CategoryRepositoryInterface
{
    public function index();

    public function show(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}
