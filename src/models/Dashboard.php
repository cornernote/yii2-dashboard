<?php

namespace cornernote\dashboard\models;

use cornernote\dashboard\Layout;
use cornernote\dashboard\models\query\DashboardQuery;
use \Yii;
use \yii\db\ActiveRecord;

/**
 * This is the base-model class for table "dashboard".
 *
 * @property string $id
 * @property string $name
 * @property string $layout_class
 * @property integer $enabled
 * @property integer $sort
 * @property string $options
 * @property Layout $layout
 */
class Dashboard extends ActiveRecord
{
    /**
     * @var Layout
     */
    private $_layout;

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
            [['name', 'layout_class', 'enabled', 'sort', 'options'], 'required'],
            [['enabled', 'sort'], 'integer'],
            [['options'], 'string'],
            [['name', 'layout_class'], 'string', 'max' => 255]
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
            'layout_class' => Yii::t('dashboard', 'Layout Class'),
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


    /**
     * @return Layout
     */
    public function getLayout()
    {
        if (!$this->_layout) {
            $config = json_decode($this->options, true);
            $config['dashboard'] = $this;
            $config['class'] = $this->layout_class;
            $config['id'] = 'dashboard-' . $this->id;
            $this->_layout = Yii::createObject($config);
        }
        return $this->_layout;
    }

}
