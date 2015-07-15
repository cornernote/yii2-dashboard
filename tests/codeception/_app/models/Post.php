<?php

namespace tests\app\models;

use yii\db\ActiveRecord;

/**
 * Post
 *
 * @property integer $id
 * @property string $body
 * @property string $title
 */
class Post extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

}
