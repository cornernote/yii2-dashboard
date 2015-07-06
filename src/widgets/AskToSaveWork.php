<?php

namespace cornernote\dashboard\widgets;

use Yii;
use yii\web\View;
use yii\base\Widget;

/**
 * AskToSaveWork
 *
 * Asks for a confirmation before leaving the page after they make a change to the form.
 *
 * USAGE:
 * ```
 * AskToSaveWork::widget([
 *     'message' => Yii::t('app', 'Please save before leaving this page.'),
 * ]);
 * ```
 */
class AskToSaveWork extends Widget
{
    /**
     * @var String Message to show to user preventing exit the page
     */
    public $message;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->message = isset($this->message) ? $this->message : Yii::t('dashboard', 'Please save before leaving this page.');
        $this->registerAssets();
    }

    /**
     * @inheritdoc
     */
    public function registerAssets()
    {
        $js = "var formModified = false;";
        $this->getView()->registerJs($js, View::POS_END);

        $js = "$('form :input').change(function(){ formModified=true; });";
        $js .= "$(window).bind('beforeunload', function() { if (formModified) { return \"" . $this->message . "\"; } });";
        $js .= "$(':submit').bind('click', function(){ formModified=false; });";
        $this->getView()->registerJs($js);
    }
}