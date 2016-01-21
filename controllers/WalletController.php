<?php

namespace app\controllers;

use app\extensions\AuthRequiredController;

class WalletController extends AuthRequiredController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}