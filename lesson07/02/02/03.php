<?php

namespace other\example01\demo02\step03;

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

class UserHelper
{
    public static function getFullName(User $user) {
        return $user->last_name . ' ' . $user->patronymic_name . ' ' . $user->first_name;
    }

    public static function getShortName(User $user) {
        return $user->last_name . ' ' . self::firstLatter($user->first_name) . '. ' . self::firstLatter($user->patronymic_name);
    }

    public static function getFilteredDescription(User $user) {
        return HtmlPurifier::process(Markdown::process($user->description, 'gfm'));
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

<h1><?= Html::encode(UserHelper::getFullName($user)) ?></h1>
<div class="short"><?= Html::encode(UserHelper::getShortName($user)) ?></div>
<div class="description"><?= UserHelper::getFilteredDescription($user) ?></div>