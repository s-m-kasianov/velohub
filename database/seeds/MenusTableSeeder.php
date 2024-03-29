<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('menus')->insert([
//            'parent_id' => 0,
//            'is_active' => true,
//            'link' => '/magaziny',
//            'name' => 'Магазины',
//        ]);
        DB::table('menus')->insert([
            'parent_id' => 0,
            'is_active' => true,
            'link' => '/dostavka/',
            'name' => 'Доставка',
        ]);
        DB::table('menus')->insert([
            'parent_id' => 0,
            'is_active' => true,
            'link' => '/garantija/',
            'name' => 'Гарантия',
        ]);
        DB::table('menus')->insert([
            'parent_id' => 0,
            'is_active' => 1,
            'link' => '/servis-velosipedov/',
            'name' => 'Сервис',
        ]);
        DB::table('menus')->insert([
            'parent_id' => 0,
            'is_active' => 1,
            'link' => '/kontakti/',
            'name' => 'Контакты',
        ]);
    }
}
