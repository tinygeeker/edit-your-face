# Edit-your-face
🌈 AI人脸编辑，可以上传自己的自拍，调整自己的年龄，眉眼间距，性别变化，眼睛大小，鼻梁大小，嘴巴开合等等

<p align="center">
  <img src="https://img.shields.io/badge/python-==3.10.6-ff69b4.svg" alt="python">
  <img src="https://img.shields.io/badge/php-==7.2.19-brightgreen.svg" alt="php">
  <img src="https://img.shields.io/badge/thinkphp-==6.0.0-6bb59a.svg" alt="thinkphp">
</p>

## 项目预览

![项目预览](https://tinygeeker.github.io/p/edityourface.png)

## 安装使用

* 先安装PHP环境
```
# 切换到项目目录
cd edit-your-face

# 先更新composer
composer self-update

# 下载依赖
composer install
```

* 再安装PYTHON环境
```
# 切换到项目目录
cd edit-your-face/python/PaddleGAN

# 安装环境依赖
pip install cmake -i https://mirror.baidu.com/pypi/simple
pip install boost -i https://mirror.baidu.com/pypi/simple
pip install numpy -i https://mirror.baidu.com/pypi/simple
pip install dlib==19.8.1 -i https://mirror.baidu.com/pypi/simple

# 安装项目依赖，这里一定要设置全局pip源
pip install -r requirements.txt

# 安装环境
python setup.py develop

# CPU版本
pip install paddlepaddle
```

* 启动环境
```
cd edit-your-face

# 启动网页
think php run

# 启动websocket
think php worker:server
```

* 打开浏览器访问：`http://127.0.0.1:8000/`

## 加入我们

想学习更多的技术知识，就关注我的个人公众号吧。 :blush:

![donate](https://tinygeeker.github.io/tinygeeker/u/attention/matrix.jpeg)

## 浏览器支持情况

| [<img src="https://tinygeeker.github.io/tinygeeker/svg/ie.svg" alt="IE / Edge" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>IE / Edge | [<img src="https://tinygeeker.github.io/tinygeeker/svg/firefox.svg" alt="Firefox" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>Firefox | [<img src="https://tinygeeker.github.io/tinygeeker/svg/chrome.svg" alt="Chrome" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>Chrome | [<img src="https://tinygeeker.github.io/tinygeeker/svg/safari.svg" alt="Safari" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>Safari | [<img src="https://tinygeeker.github.io/tinygeeker/svg/sogou.svg" alt="Sogou" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>Sogou | [<img src="https://tinygeeker.github.io/tinygeeker/svg/uc.svg" alt="UC" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>UC | [<img src="https://tinygeeker.github.io/tinygeeker/svg/360.svg" alt="360" width="24px" height="24px" />](https://godban.github.io/browsers-support-badges/)</br>360 |
| --------- | --------- | --------- | --------- | --------- | --------- | --------- |
| 所有版本 | 所有版本 | 所有版本 | 所有版本 | 所有版本 | 所有版本 | 所有版本 |

## License

[MIT](https://github.com/tinygeeker/edit-your-face/blob/main/LICENSE)

Copyright (c) 2021-present tinygeeker