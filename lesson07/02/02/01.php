<?php

namespace other\example01\demo02\step01;

use yii\db\ActiveRecord;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Markdown;
use yii\web\Controller;

/**
 * @property $id
 * @property $first_name
 * @property $patronymic_name
 * @property $last_name
 * @property $description
 */
class User extends ActiveRecord { }

class UserController extends Controller
{
    public function actionView($id)
    {
        $user = User::findOne($id);

        return $this->render('view', [
            'user' => $user,
        ]);
    }
}

?>

<?php /** @var User $user */ ?>

<h1><?= Html::encode($user->last_name . ' ' . $user->patronymic_name . ' ' . $user->first_name) ?></h1>
<div class="short">
    <?= Html::encode($user->last_name . ' ' . mb_substr($user->first_name, 0, 1, 'utf-8') . '. ' . mb_substr($user->patronymic_name, 0, 1, 'utf-8')) ?>
</div>
<div class="description">
    <?= HtmlPurifier::process(Markdown::process($user->description, 'gfm')) ?>
</div>