<?php

namespace app\forms;

use yii\base\Model;

class WalletForm extends Model
{
    public $name;
    public $amount;
    public $currency_id;
}