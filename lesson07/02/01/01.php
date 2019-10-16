<?php

namespace other\example01\demo01\step01;

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

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}

?>

<?php /** @var Post $model */ ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->asArray()->all(), 'id', 'name')) ?>
<?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name')) ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'content')->textarea() ?>

<?= Html::submitButton('Create') ?>

<?php ActiveForm::end(); ?>




