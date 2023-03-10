<?php

namespace app\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Index extends BaseController
{
    public function index()
    {
        return View::fetch('edit/index');
    }

    public function edit_face()
    {
        return View::fetch('edit_face');
    }

    public function generate_face()
    {
        return View::fetch('generate_face');
    }

    public function upload()
    {
        $file = request()->file('file');
        try {
            validate(['image' => 'fileSize:102400|fileExt:jpg,png,gif,jpeg'])
                ->check((array)$file);
            $url = \think\facade\Filesystem::disk('public')->putFile('uploads/origin', $file, 'unique');
        } catch (\think\exception\ValidateException $e) {
            echo $e->getMessage();
        }

        return json([
            'code' => 200,
            'msg' => '上传成功',
            'url' => $url
        ]);
    }
}
