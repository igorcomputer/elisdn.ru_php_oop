<?php

namespace other\example01\demo01\step03;

use yii\base\Model;
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

class PostCreateForm extends Model
{
    public $user;
    public $category;
    public $title;
    public $content;

    public function getUserList() {
        return ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name');
    }

    public function getCategoryList() {
        return ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name');
    }
}

class BlogController extends Controller
{
    public function actionCreate()
    {
        $form = new PostCreateForm();

        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            // ...
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }
}

?>

<?php /** @var PostCreateForm $model */ ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'user')->dropDownList($model->getUserList()) ?>
<?= $form->field($model, 'category')->dropDownList($model->getCategoryList()) ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>

<?= Html::submitButton('Create') ?>

<?php ActiveForm::end(); ?>




