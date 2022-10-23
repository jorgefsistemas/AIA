<?php

namespace App\Suports;

use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class Filter implements FilterInterface
{
    /**
     * Transforms a menu item. Add the restricted property to a menu item
     * when situable.
     *
     * @param array $item A menu item
     * @return array The transformed menu item
     */
    public function transform($item)
    {
        if(isset($item['can']) && ! (Auth::user() && Auth::user()->hasRole($item['can']))){
            return false;
        }
        return $item;
    }
}
