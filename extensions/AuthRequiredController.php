<?php

namespace app\extensions;

use Yii;
use yii\web\Controller;

class AuthRequiredController extends Controller
{
    public function beforeAction($action)
    {
        if (!Yii::$app->session->get('user_id')) {
            $this->redirect('/site/auth');
            return false;
        }

        return parent::beforeAction($action);
    }
}