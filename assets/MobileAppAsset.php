<?php

namespace app\assets;

use yii\web\AssetBundle;

class MobileAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [];
    public $depends = [];

    public function init()
    {
        $this->depends = array_merge([
            MaterializeAsset::className()
        ], $this->depends);
        $this->css = array_merge(['css/main.css'], $this->css);
    }
}