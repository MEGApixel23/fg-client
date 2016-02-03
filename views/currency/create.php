<?php

/**
 * @var $this \yii\web\View
 * @var $form \app\forms\CurrencyForm
 */

use app\assets\MobileAppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Wallets';
$this->registerJsFile('/js/app/currency/create.js', ['depends' => MobileAppAsset::className()]);
?>

<div class="row">
    <? ActiveForm::begin(['action' => '/currency', 'options' => [
        'id' => 'create-currency',
        'class' => 'col s12'
    ]]) ?>

    <div class="row">
        <div class="input-field col s12">
            <?= Html::activeTextInput($form, 'name', [
                'id' => 'name',
                'name' => 'name',
                'placeholder' => 'name'
            ]) ?>
            <label for="name"><?= $form->getAttributeLabel('name') ?></label>
            <div class="errors" data-for="name"></div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <button class="btn waves-effect waves-light col s12" type="submit" name="action">Add</button>
        </div>
    </div>

    <? ActiveForm::end() ?>
</div>