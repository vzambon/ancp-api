<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeds = collect([
            DefaultUserSeed::class,
        ]);

        $this->call($seeds->toArray());
    }
}
