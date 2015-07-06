<?php

namespace cornernote\dashboard\models;

use cornernote\dashboard\ActiveRecord;
use cornernote\dashboard\models\query\DashboardPanelQuery;
use cornernote\dashboard\Panel;
use \Yii;

/**
 * This is the base-model class for table "dashboard_panel".
 *
 * @property string $id
 * @property string $dashboard_id
 * @property string $region
 * @property string $name
 * @property string $options
 * @property string $panel_class
 * @property integer $enabled
 * @property integer $sort
 * @property Dashboard $dashboard
 * @property Panel $panel
 */
class DashboardPanel extends ActiveRecord
{
    /**
     * @var Panel
     */
    private $_panel;

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
            [['dashboard_id', 'name', 'panel_class', 'enabled', 'sort'], 'required'],
            [['dashboard_id', 'sort', 'enabled'], 'integer'],
            [['name', 'panel_class', 'region'], 'string', 'max' => 255]
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
            'region' => Yii::t('dashboard', 'Region'),
            'name' => Yii::t('dashboard', 'Name'),
            'options' => Yii::t('dashboard', 'Options'),
            'panel_class' => Yii::t('dashboard', 'Panel Class'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDashboard()
    {
        return $this->hasOne(Dashboard::className(), ['id' => 'dashboard_id']);
    }

    /**
     * @return Panel
     */
    public function getPanel()
    {
        if (!$this->_panel) {
            $config = $this->options;
            $config['dashboardPanel'] = $this;
            $config['class'] = $this->panel_class;
            $config['id'] = 'dashboard-panel-' . $this->id;
            $this->_panel = Yii::createObject($config);
        }
        return $this->_panel;
    }

}
