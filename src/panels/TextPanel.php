<?php

namespace cornernote\dashboard\panels;

use cornernote\dashboard\Panel;
use Yii;

/**
 * TextPanel
 * @package cornernote\dashboard\panels
 */
class TextPanel extends Panel
{

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $viewPath = '@cornernote/dashboard/views/dashboard/panels/text';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
        ];
    }

}