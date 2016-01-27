<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;

class MaterializeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/icon?family=Material+Icons'
    ];
    public $js = [];
    public $depends = [];

    public function init()
    {
        $this->depends = array_merge([
            JqueryAsset::className(),
            YiiAsset::className()
        ], $this->depends);
        $this->css = array_merge([
            YII_DEBUG ? 'vendor/materialize/css/materialize.css' : 'vendor/materialize/css/materialize.min.css',
        ], $this->css);
        $this->js = array_merge([
            YII_DEBUG ? 'vendor/materialize/js/materialize.js' : 'vendor/materialize/js/materialize.min.js',
        ], $this->js);
    }
}