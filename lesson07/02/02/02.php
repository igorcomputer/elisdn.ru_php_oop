<?php

namespace other\example01\demo02\step02;

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
class User extends ActiveRecord
{
    public function getFullName() {
        return $this->last_name . ' ' . $this->patronymic_name . ' ' . $this->first_name;
    }

    public function getShortName() {
        return $this->last_name . ' ' . self::firstLatter($this->first_name) . '. ' . self::firstLatter($this->patronymic_name);
    }

    private static function firstLatter($name) {
        return mb_substr($name, 0, 1, 'utf-8');
    }
}

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

<h1><?= Html::encode($user->getFullName()) ?></h1>
<div class="short"><?= Html::encode($user->getShortName()) ?></div>
<div class="description"><?= HtmlPurifier::process(Markdown::process($user->description, 'gfm')) ?></div>