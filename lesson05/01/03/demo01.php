<?php

namespace lesson05\grasp\example03\demo01;

use yii\db\ActiveRecord;
use Yii;
use yii\web\Controller;

/**
 * @property $id
 * @property $user_id
 * @property $user_ip
 * @property $created_at
 * @property $title
 * @property $content
 */
class Post extends ActiveRecord
{
    // ...

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->user_id = Yii::$app->user->id;
                $this->user_ip = Yii::$app->request->userIP;
                $this->created_at = time();
            }
            return true;
        }
        return false;
    }
}

class PostController extends Controller
{
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
?>

          User <-------
                        \
Запрос -> Контроллер -> Модель
   \____________________/



