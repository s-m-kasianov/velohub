<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(VariantsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(WigetsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
