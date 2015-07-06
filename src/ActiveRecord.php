<?php

namespace cornernote\dashboard;
use yii\db\Connection;

/**
 * ActiveRecord
 * @package cornernote\dashboard
 */
class ActiveRecord extends \yii\db\ActiveRecord
{
    /**
     * @var bool If true, automatically encode and decode the data attribute
     */
    protected $autoEncode = true;

    /**
     * @var array
     */
    protected $encodeAttributes = ['options'];

    /**
     * @return Connection
     */
    public static function getDb()
    {
        return Module::getInstance()->getDb();
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if ($this->autoEncode)
            foreach ($this->encodeAttributes as $attribute)
                if ($this->hasAttribute($attribute))
                    $this->$attribute = json_encode($this->$attribute);

        return parent::beforeSave($insert);
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($this->autoEncode)
            foreach ($this->encodeAttributes as $attribute)
                if ($this->hasAttribute($attribute))
                    $this->$attribute = json_decode($this->$attribute, true);
    }

    /**
     *
     */
    public function afterFind()
    {
        parent::afterFind();

        if ($this->autoEncode)
            foreach ($this->encodeAttributes as $attribute)
                if ($this->hasAttribute($attribute))
                    $this->$attribute = json_decode($this->$attribute, true);
    }
}