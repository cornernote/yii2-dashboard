<?php

namespace tests\codeception\_support;

use Codeception\Module;
use Codeception\TestCase;
use tests\codeception\_fixtures\DashboardFixture;
use tests\codeception\_fixtures\DashboardPanelFixture;
use tests\codeception\_fixtures\PostFixture;
use tests\codeception\_fixtures\UserFixture;
use yii\test\FixtureTrait;

class FixtureHelper extends Module
{
    use FixtureTrait;

    /**
     * @var array
     */
    public static $excludeActions = ['loadFixtures', 'unloadFixtures', 'getFixtures', 'globalFixtures', 'fixtures'];

    /**
     * @param TestCase $testcase
     */
    public function _before(TestCase $testcase)
    {
        $this->unloadFixtures();
        $this->loadFixtures();
        parent::_before($testcase);
    }

    /**
     * @param TestCase $testcase
     */
    public function _after(TestCase $testcase)
    {
        $this->unloadFixtures();
        parent::_after($testcase);
    }

    /**
     * @inheritdoc
     */
    public function fixtures()
    {
        return [
            'post' => [
                'class' => PostFixture::className(),
                'dataFile' => '@tests/codeception/_fixtures/data/init_post.php',
            ],
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => '@tests/codeception/_fixtures/data/init_user.php',
            ],
            'dashboard' => [
                'class' => DashboardFixture::className(),
                'dataFile' => '@tests/codeception/_fixtures/data/init_dashboard.php',
            ],
            'dashboard_panel' => [
                'class' => DashboardPanelFixture::className(),
                'dataFile' => '@tests/codeception/_fixtures/data/init_dashboard_panel.php',
            ],
        ];
    }
}
