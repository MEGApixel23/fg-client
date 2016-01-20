<?php

namespace app\controllers;

use app\forms\AuthForm;
use Yii;
use app\forms\SignUpForm;
use yii\web\Controller;
use yii\web\Cookie;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $form = new SignUpForm();

        return $this->render('index', [
            'form' => $form
        ]);
    }

    public function actionAuth()
    {
        $form = new AuthForm();

        return $this->render('auth', [
            'form' => $form
        ]);
    }

    public function actionSession($userId, $token, $tokenExpiresAt)
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name' => 'user_id',
            'value' => $userId
        ]));
        Yii::$app->response->cookies->add(new Cookie([
            'name' => 'token',
            'value' => $token
        ]));
        Yii::$app->response->cookies->add(new Cookie([
            'name' => 'token_expires_at',
            'value' => $tokenExpiresAt
        ]));
    }
}