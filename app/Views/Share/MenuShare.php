<?php

namespace App\Views\Share;

use App\Models\Menu;
use Illuminate\Support\Facades\View;

class   MenuShare
{
    public static function share()
    {
        View::share('menuTree', self::menuTree());
    }

    public static function menuTree()
    {
        return Menu
            ::where('parent_id', 0)
            ->isActive()
            ->with('children')
            ->orderBy('ord')
            ->get();
    }
}
