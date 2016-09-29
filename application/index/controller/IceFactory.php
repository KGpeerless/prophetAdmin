<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 16/9/30
 * Time: 上午12:57
 */

namespace app\index\controller;

use think\Db;

class IceFactory
{
    public function index() {
        $category = Db::query("select * from category");

        foreach ($category as &$c) {
            $c['iceFactory'] = Db::query("select * from ice_factory where category_id = :categoryId", [
                'categoryId' => $c['id']
            ]);
        }

        return json($category);
    }
}