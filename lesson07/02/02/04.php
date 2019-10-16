<?php

namespace other\example01\demo02\step04;

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

class UserView
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getFullName() {
        return $this->user->last_name . ' ' . $this->user->patronymic_name . ' ' . $this->user->first_name;
    }

    public function getShortName() {
        return $this->user->last_name . ' ' . self::firstLatter($this->user->first_name) . '. ' . self::firstLatter($this->user->patronymic_name);
    }

    public function getFilteredDescription() {
        return HtmlPurifier::process(Markdown::process($this->user->description, 'gfm'));
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
        $userView = new UserView($user);

        return $this->render('view', [
            'userView' => $userView,
        ]);
    }
}

?>

<?php /** @var UserView $userView */ ?>

<h1><?= Html::encode($userView->getFullName()) ?></h1>
<div class="short"><?= Html::encode($userView->getShortName()) ?></div>
<div class="description"><?= $userView->getFilteredDescription() ?></div>