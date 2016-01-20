<?php

namespace app\controllers;

use app\forms\SignUpForm;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $form = new SignUpForm();

        return $this->render('index', [
            'form' => $form
        ]);
    }
}