## 概览

一个字符串、数组、时间、加解密的助手库。

## 环境要求

支持的环境如下：

+ PHP >= 8.0

## 安装

推荐使用 PHP 包管理工具 [Composer](https://getcomposer.org/) 安装 SDK：

```shell
composer require kyledong/php-tools
```

## 快速使用
以下代码示例向您展示了助手的调用方法：

### 字符串

```php
<?php

require 'vendor/autoload.php';
use Kyledong\PhpTools\Str;

// 字符串长度
return Str::len('hello');

// 截取字符串
return Str::substr('hello',1,4);

// 字符串是否包含子串
if (Str::contain('hello','h')) {
    return true;
} else {
    return false;
}

// 字符串是否以子串开头
if (Str::first('hello','h')) {
    return true;
} else {
    return false;
}

// 字符串是否以子串结尾
if (Str::end('hello','h')) {
    return true;
} else {
    return false;
}

// 字符串是否包含中文
if (Str::checkChr('hello')) {
    return true;
} else {
    return false;
}

// 生成指定长度的随机数
return Str::random(6);

// 字符串转小写
return Str::lower('hello');

// 字符串转大写
return Str::upper('hello');

// 生成UUID
return Str::uuid();

```

### 数组

```php
<?php

require 'vendor/autoload.php';
use Kyledong\PhpTools\Arr;

// 二维数组排序
return Arr::multiSort([['id' => 1,'id' => 2]],'id','desc');

// 截取数组
return Arr::slice([['id' => 1,'id' => 2]],0,1);

```

### 时间

```php
<?php

require 'vendor/autoload.php';
use Kyledong\PhpTools\Time;

// 获取当前毫秒
return Time::getCurrentMilis();

// 当前时间
return Time::getTime();

// 昨天
return Time::previous(1);

// 明天
return Time::future(1);

// 时间戳转化为时间
return Time::convertTimestampToTime('1678631379');

```

### 加解密

```php
<?php

require 'vendor/autoload.php';
use Kyledong\PhpTools\Security;

// 加密
return Security::encryptOpenssl('hello','qufclqupfdjvls24jfkjsl')

// 解密
return Security::decryptOpenssl('tLF9lTPugc6xYkofIVk2CQ==','qufclqupfdjvls24jfkjsl');

```
