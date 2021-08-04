<?php


namespace App\Interfaces\Repositories;


use App\Http\Filters\ClientAppFilter;

interface ClientAppRepositoryInterface
{
    public function index(ClientAppFilter $filters);

    public function show();

    public function store(array $data);

    public function update(array $data);

    public function destroy();
}
