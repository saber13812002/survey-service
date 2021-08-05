<?php


namespace App\Helpers\CustomSeeder;


class Seeder
{
    protected static $running = false;

    public function isRunning(): bool
    {
        return static::$running;
    }

    public function start()
    {
        static::$running = true;
    }

}
