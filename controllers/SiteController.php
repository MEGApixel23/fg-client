<?php

namespace app\controllers;

use app\forms\AuthForm;
use Yii;
use app\forms\SignUpForm;
use yii\web\Controller;
use yii\web\Cookie;

class SiteController extends Controller
{
    public function actionSignUp()
    {
        $form = new SignUpForm();

        return $this->render('sign-up', [
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
        Yii::$app->session->set('user_id', $userId);
        Yii::$app->session->set('token', $token);
        Yii::$app->session->set('token_expires_at', $tokenExpiresAt);
        Yii::$app->session->set('is_guest', false);

        $this->redirect(Yii::$app->params['startUrl']);
        return false;
    }
}