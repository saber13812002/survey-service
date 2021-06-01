<?php


namespace App\Interfaces\Repositories;


interface CategoryRepositoryInterface
{
    public function index();

    public function show(int $Id);

    public function store(array $data);

    public function update(int $Id, array $data);

    public function destroy(int $Id);
}
