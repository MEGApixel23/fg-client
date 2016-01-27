<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class WalletController extends Controller
{
    public function beforeAction($action)
    {
        if (!Yii::$app->session->get('is_authorized')) {
            $this->redirect('/site/auth');
            return false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}