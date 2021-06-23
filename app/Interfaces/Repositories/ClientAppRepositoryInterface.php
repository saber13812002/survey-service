<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\ClientAppFilter;

interface ClientAppRepositoryInterface
{
    public function index(ClientAppFilter $filters);

    public function show(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}
