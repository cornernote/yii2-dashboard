<?php

namespace cornernote\dashboard\layouts;

use cornernote\dashboard\Layout;
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
    public function getPositionOpts()
    {
        $positions = [];
        for ($i = 1; $i <= $this->columns; $i++) {
            $positions['col_' . $i] = Yii::t('dashboard', 'Column {i}', ['i' => $i]);
        }
        return $positions;
    }

    /**
     * @inheritdoc
     */
    public function renderView()
    {
        return \Yii::$app->view->render($this->viewPath . '/view', [
            'layout' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function renderUpdate()
    {
        return \Yii::$app->view->render($this->viewPath . '/update', [
            'layout' => $this,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function renderForm($form)
    {
        return \Yii::$app->view->render($this->viewPath . '/form', [
            'layout' => $this,
            'form' => $form,
        ]);
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return [
            'columns' => $this->columns,
        ];
    }

}