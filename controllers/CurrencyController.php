<?php

namespace app\controllers;

use app\forms\CurrencyForm;
use Yii;
use yii\web\Controller;

class CurrencyController extends Controller
{
    public function beforeAction($action)
    {
        if (!Yii::$app->session->get('is_authorized')) {
            $this->redirect('/site/auth');
            return false;
        }

        return parent::beforeAction($action);
    }

    public function actionCreate()
    {
        $form = new CurrencyForm();

        return $this->render('create', [
            'form' => $form
        ]);
    }
}