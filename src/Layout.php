<?php

namespace cornernote\dashboard;

use cornernote\dashboard\models\Dashboard;
use Yii;
use yii\base\Component;
use yii\base\Model;
use yii\bootstrap\ActiveForm;

/**
 * Panel
 * @package cornernote\dashboard
 */
class Layout extends Model
{
    /**
     * @var string panel unique identifier.
     */
    public $id;

    /**
     * @var Dashboard
     */
    public $dashboard;

    /**
     * @inheritdoc
     */
    public function load($data, $formName = null)
    {
        $this->dashboard->load($data);
        return parent::load($data, $formName);
    }

    /**
     * @inheritdoc
     */
    public function afterValidate()
    {
        if (!$this->dashboard->validate()) {
            $this->addError('', '');
        }
        parent::afterValidate();
    }

    /**
     * @return string
     */
    public function renderView()
    {
        return '';
    }

    /**
     * @return string
     */
    public function renderUpdate()
    {
        return '';
    }

    /**
     * @param ActiveForm $form
     * @return string
     */
    public function renderForm($form)
    {
        return '';
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return json_encode([]);
    }

}
