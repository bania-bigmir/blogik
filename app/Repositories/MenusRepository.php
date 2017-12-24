<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 12.12.2017
 * Time: 11:40
 */

namespace Train\Repositories;

use Train\Menu;

class MenusRepository extends Repository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }


}