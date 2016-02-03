<?php

/**
 * @var $this \yii\web\View
 * @var $form \app\forms\SignUpForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\assets\MobileAppAsset;

$this->registerJsFile('/js/app/authentication.js', ['depends' => MobileAppAsset::className()]);

$this->title = 'Sign-up';
?>
<h4><?= $this->title ?></h4>

<div class="row">
    <? ActiveForm::begin(['action' => '/sign-up', 'options' => [
        'id' => 'sign-up-form',
        'class' => 'col s12'
    ]]) ?>

    <div class="row">
        <div class="input-field col s12">
            <?= Html::activeTextInput($form, 'email', [
                'id' => 'email',
                'name' => 'email',
                'placeholder' => 'user@mail.ru'
            ]) ?>
            <label for="email"><?= $form->getAttributeLabel('email') ?></label>
            <div class="errors" data-for="email"></div>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <?= Html::activePasswordInput($form, 'password', [
                'id' => 'password',
                'name' => 'password'
            ]) ?>
            <label for="password"><?= $form->getAttributeLabel('password') ?></label>
            <div class="errors" data-for="password"></div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <button class="btn waves-effect waves-light col s12" type="submit" name="action">Signup</button>
        </div>
    </div>

    <? ActiveForm::end() ?>
</div>