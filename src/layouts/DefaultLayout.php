<?php

namespace cornernote\dashboard\layouts;

use cornernote\dashboard\Layout;
use cornernote\dashboard\models\DashboardPanel;
use Yii;

/**
 * DefaultLayout
 * @package cornernote\dashboard\layouts
 */
class DefaultLayout extends Layout
{

    /**
     * @var int
     */
    public $columns = 1;

    /**
     * @var string
     */
    public $viewPath = '@cornernote/dashboard/views/dashboard/layouts/default';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['columns'], 'required'],
            [['columns'], 'integer'],
        ];
    }

    /**
     * @return array
     */
    public static function getColumnOpts()
    {
        return [
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '6' => 6,
            '12' => 12,
        ];
    }

    /**
     * @return array
     */
    public function getRegions()
    {
        $regions = [];
        for ($i = 1; $i <= $this->columns; $i++) {
            $regions['column-' . $i] = Yii::t('dashboard', 'Column {i}', ['i' => $i]);
        }
        return $regions;
    }

}