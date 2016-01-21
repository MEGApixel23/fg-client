<?php

namespace app\controllers;

use app\extensions\AuthRequiredController;

class TransactionController extends AuthRequiredController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}