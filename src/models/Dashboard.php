<?php

namespace cornernote\dashboard\models;

use cornernote\dashboard\models\query\DashboardQuery;
use \Yii;
use \yii\db\ActiveRecord;

/**
 * This is the base-model class for table "dashboard".
 *
 * @property string $id
 * @property string $name
 * @property string $layout
 * @property integer $enabled
 * @property integer $sort
 * @property string $options
 * @property string $created
 * @property string $modified
 * @property string $deleted
 */
class Dashboard extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dashboard';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'layout', 'enabled', 'sort', 'options'], 'required'],
            [['enabled', 'sort'], 'integer'],
            [['options'], 'string'],
            [['name', 'layout'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('dashboard', 'ID'),
            'name' => Yii::t('dashboard', 'Name'),
            'layout' => Yii::t('dashboard', 'Layout'),
            'enabled' => Yii::t('dashboard', 'Enabled'),
            'sort' => Yii::t('dashboard', 'Sort'),
            'options' => Yii::t('dashboard', 'Options'),
        ];
    }


    /**
     * @inheritdoc
     * @return DashboardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DashboardQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDashboardPanels()
    {
        return $this->hasMany(DashboardPanel::className(), ['dashboard_id' => 'id']);
    }

}
