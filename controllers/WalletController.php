<?php

namespace app\controllers;

use app\forms\WalletForm;
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

    public function actionCreate()
    {
        $form = new WalletForm();

        return $this->render('create', [
            'form' => $form
        ]);
    }
}