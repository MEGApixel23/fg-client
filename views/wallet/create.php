<?php

/**
 * @var $this \yii\web\View
 * @var $form \app\forms\WalletForm
 */

use app\assets\MobileAppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Wallets';
$this->registerJsFile('/js/app/wallet/create.js', ['depends' => MobileAppAsset::className()]);
?>

<div class="row">
    <? ActiveForm::begin(['action' => '/wallet', 'options' => [
        'id' => 'create-wallet',
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
        <div class="input-field col s12">
            <?= Html::activeTextInput($form, 'amount', [
                'id' => 'amount',
                'name' => 'amount'
            ]) ?>
            <label for="amount"><?= $form->getAttributeLabel('amount') ?></label>
            <div class="errors" data-for="amount"></div>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <?= Html::activeDropDownList($form, 'currency_id', [], [
                'id' => 'currency-id',
                'name' => 'currency_id'
            ]) ?>
            <label for="amount"><?= $form->getAttributeLabel('currency_id') ?></label>
            <div class="errors" data-for="currency_id"></div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <button class="btn waves-effect waves-light col s12" type="submit" name="action">Add</button>
        </div>
    </div>

    <? ActiveForm::end() ?>
</div>