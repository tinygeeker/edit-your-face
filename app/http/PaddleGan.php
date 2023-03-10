<?php

namespace app\http;

use think\worker\Server;

class PaddleGan extends Server
{
    protected $socket = 'websocket://0.0.0.0:2345';

    public function onWorkerStart($worker)
    {
    }

    public function onWorkerReload()
    {
    }

    public function onConnect($connection)
    {
        echo "有人进来了： " . $connection->getRemoteIp() . "\n";
    }

    public function onMessage($connection, $data)
    {
        // 处理数据
        $data = json_decode($data, true);
        $avatar = $data['avatar'];
        $level = $data['level'];
        $style = $data['style'];

        $root = app()->getRootPath();

        $connection->send(json_encode([
            'code' => 100,
            'msg' => '开始扫描人脸'
        ]));

        // 生成潜码
        $path = uniqid(date('Ymd').'_');
        $python = "D:\\anaconda3\\envs\\PaddleGAN\\python.exe";
        $script = "{$root}\\python\\PaddleGAN\\applications\\tools\\pixel2style2pixel.py";
        $args = "--model_type ffhq-inversion --seed 233  --size 1024  --style_dim 512  --n_mlp 8  --channel_multiplier 2 --cpu";
        $code_command = "{$python} -u {$script} --input_image {$root}\\public\\{$avatar} --output_path {$root}\\public\\uploads\\code\\{$path} {$args}";
        exec($code_command, $output, $return);

        $connection->send(json_encode([
            'code' => 100,
            'msg' => '人脸扫描成功，正在生成图片...'
        ]));
        
        $task_script = "{$root}\\python\\PaddleGAN\\applications\\tools\\styleganv2editing.py";
        $task_args = "--model_type ffhq-config-f --size 1024 --style_dim 512 --n_mlp 8 --channel_multiplier 2 --direction_name {$style} --direction_offset {$level}";
        $task_command = "{$python} -u {$task_script} --latent {$root}\\public\\uploads\\code\\{$path}\\dst.npy --output_path {$root}\\public\\uploads\\output\\{$path} {$task_args}";
        exec($task_command, $output, $return);

        $connection->send(json_encode([
            'code' => 200,
            'msg' => '处理成功',
            'url' => "/uploads/output/{$path}/dst.editing.png"
        ]));
    }

    public function onClose()
    {
    }

    public function onError()
    {
    }
}