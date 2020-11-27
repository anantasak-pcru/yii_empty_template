<?php
namespace frontend\themes\adminlte3;

use yii\web\AssetBundle;

class CustomModalCss extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/modal.css',
    ];
    public $js = [];
    public $depends = [];
}