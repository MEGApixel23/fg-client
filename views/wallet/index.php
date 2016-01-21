<?php

/**
 * @var $this \yii\web\View
 */

$this->title = 'Wallets';
$this->registerJsFile('/js/app/auth.js', ['depends' => \yii\web\JqueryAsset::className()]);
?>

<table class="responsive-table" data-url="<??>">
    <thead>
    <tr>
        <th>Name</th>
        <th>Amount</th>
    </tr>
    </thead>

    <tbody>
    </tbody>
</table>