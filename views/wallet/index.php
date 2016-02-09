<?php

/**
 * @var $this \yii\web\View
 */

use app\assets\MobileAppAsset;
use yii\helpers\Url;

$this->title = 'Wallets';
$this->registerJsFile('/js/app/wallet/get.js', ['depends' => MobileAppAsset::className()]);
?>
<table id="wallets-table">
    <thead>
    <tr>
        <th data-field="id">Name</th>
        <th data-field="name">Item Name</th>
        <th data-field="price">Item Price</th>
    </tr>
    </thead>

    <tbody>
    </tbody>
</table>

<div class="controls">
    <a href="<?= Url::to(['/wallet/create']) ?>"
       class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
</div>