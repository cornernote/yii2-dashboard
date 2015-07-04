<?php

namespace cornernote\dashboard\models;

use cornernote\dashboard\models\query\DashboardPanelQuery;
use \Yii;
use \yii\db\ActiveRecord;

/**
 * This is the base-model class for table "dashboard_panel".
 *
 * @property string $id
 * @property string $dashboard_id
 * @property string $position
 * @property string $name
 * @property string $options
 * @property string $panel
 * @property integer $enabled
 * @property integer $sort
 */
class DashboardPanel extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dashboard_panel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dashboard_id', 'position', 'name', 'panel', 'enabled', 'sort'], 'required'],
            [['dashboard_id', 'enabled', 'sort'], 'integer'],
            [['options'], 'string'],
            [['position', 'name', 'panel'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('dashboard', 'ID'),
            'dashboard_id' => Yii::t('dashboard', 'Dashboard ID'),
            'position' => Yii::t('dashboard', 'Position'),
            'name' => Yii::t('dashboard', 'Name'),
            'options' => Yii::t('dashboard', 'Options'),
            'panel' => Yii::t('dashboard', 'Panel'),
            'enabled' => Yii::t('dashboard', 'Enabled'),
            'sort' => Yii::t('dashboard', 'Sort'),
        ];
    }


    /**
     * @inheritdoc
     * @return DashboardPanelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DashboardPanelQuery(get_called_class());
    }

}
