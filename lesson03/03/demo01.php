<?php

namespace lesson03\example3\demo01;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * @property $title
 * @property $content
 * @property $filter_content
 * @property $image
 */
class Post extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->filter_content = strip_tags($this->content);
            return true;
        }
        return false;
    }
}

/**
 * @property $file
 */
class Article extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $file = $this->file;
            if ($file && $file instanceof UploadedFile) {
                $fileName = uniqid() . '.' . $file->getExtension();
                $file->saveAs(Yii::getAlias('@web/uploads') . DIRECTORY_SEPARATOR . $fileName);
                $this->file = $fileName;
            }
            return true;
        }
        return false;
    }
}