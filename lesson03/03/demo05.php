<?php

namespace lesson03\example3\demo05;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class FilterHelper
{
    public static function filter($content) {
        return strip_tags($content);
    }
}

class UploadHelper
{
    public static function upload($file) {
        $fileName = uniqid() . '.' . $file->getExtension();
        $file->saveAs(Yii::getAlias('@web/uploads') . DIRECTORY_SEPARATOR . $fileName);
        return $fileName;
    }
}

/**
 * @property $title
 * @property $slug
 * @property $content
 * @property $filter_content
 * @property $image
 */
class Post extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->filter_content = FilterHelper::filter($this->content);
            $this->image = UploadHelper::upload($this->image);
            return true;
        }
        return false;
    }
}

/**
 * @property mixed content
 * @property string filter_content
 */
class Page extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->filter_content = FilterHelper::filter($this->content);
            return true;
        }
        return false;
    }
}

/**
 * @property int create_at
 * @property string filter_content
 * @property mixed content
 * @property mixed image
 */
class Article extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (empty($this->create_at)) {
                $this->create_at = time();
            }
            $this->filter_content = FilterHelper::filter($this->content);
            if ($this->image && $this->image instanceof UploadedFile) {
                $this->image = UploadHelper::upload($this->image);
            }
            return true;
        }
        return false;
    }
}