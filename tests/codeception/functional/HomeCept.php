<?php

use cornernote\dashboard\tests\FunctionalTester;
use Codeception\Scenario;
use yii\helpers\Url;

/**
 * @var $scenario Scenario
 */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that home page works');
$I->amOnPage(Url::to(['/dashboard']));
$I->see('Dashboards');

$I->seeLink('Create Dashboard');
$I->click('Create Dashboard');
$I->see('Layout Class');

$I->click('Dashboards');
$I->seeLink('Dashboard name 1');
$I->click('Dashboard name 1');
$I->see('Dashboard name 1', 'h1');
