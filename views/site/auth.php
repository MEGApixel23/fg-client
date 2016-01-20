<?php

/**
 * @var $this \yii\web\View
 * @var $form \app\forms\SignUpForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->registerJsFile('/js/app/auth.js', ['depends' => \yii\web\JqueryAsset::className()]);

$this->title = 'Auth';
?>
<div class="section no-pad-bot">
    <div class="container">
        <h3><?= $this->title ?></h3>

        <div class="row">
            <? ActiveForm::begin(['action' => Yii::$app->params['api-url'] . '/auth', 'options' => [
                'id' => 'auth-form',
                'class' => 'col s3'
            ]]) ?>
            <div class="row">
                <div class="input-field col">
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
                <div class="input-field col">
                    <?= Html::activePasswordInput($form, 'password', [
                        'id' => 'password',
                        'name' => 'password'
                    ]) ?>
                    <label for="password"><?= $form->getAttributeLabel('password') ?></label>
                    <div class="errors" data-for="password"></div>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            <? ActiveForm::end() ?>
        </div>

    </div>
</div>