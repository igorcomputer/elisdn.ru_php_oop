<?php

namespace other\example01\demo01\step02;

use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;

/**
 * @property $id
 * @property $name
 */
class User extends ActiveRecord { }

/**
 * @property $id
 * @property $name
 */
class Category extends ActiveRecord { }

/**
 * @property $id
 * @property $user_id
 * @property $category_id
 * @property $title
 * @property $content
 */
class Post extends ActiveRecord { }

class BlogController extends Controller
{
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $users = ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name');
        $categories = ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'usersList' => $users,
            'categoriesList' => $categories,
        ]);
    }
}

?>

<?php /** @var Post $model */ ?>
<?php /** @var array $usersList */ ?>
<?php /** @var array $categoriesList */ ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'user_id')->dropDownList($usersList) ?>
<?= $form->field($model, 'category_id')->dropDownList($categoriesList) ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>

<?= Html::submitButton('Create') ?>

<?php ActiveForm::end(); ?>




