<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $css = [
        '/materials-makeup/css/bootstrap.min.css',
        '/materials-makeup/css/bootstrap-utilities.css',
        '/materials-makeup/css/style.css',
    ];
    public $js = [
        '/js/my.js',
//        'materials-mekup/js/',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
