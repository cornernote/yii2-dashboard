<?php

use cornernote\dashboard\tests\FunctionalTester;
use Codeception\Scenario;
use yii\helpers\Url;

/**
 * @var $scenario Scenario
 */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that create dashboard panel works');

$I->amOnPage(Url::to(['/dashboard/dashboard/update', 'id' => 1]));
$I->see('Create Dashboard Panel');
$I->click('Create Dashboard Panel');

$I->submitForm('#dashboardPanel-form', []);
$I->see('Name cannot be blank.');
$I->see('Panel Class cannot be blank.');

$I->amOnPage(Url::to(['/dashboard/dashboard/update', 'id' => 1]));
$I->see('Create Dashboard Panel');
$I->click('Create Dashboard Panel');
$I->fillField('DashboardPanel[name]', 'text dashboard panel');
$I->selectOption('DashboardPanel[panel_class]', 'text');
$I->submitForm('#dashboardPanel-form', []);

$I->fillField('TextPanel[text]', 'dummy text');
$I->submitForm('#dashboardPanel-form', []);

$I->see('text dashboard panel', 'h3');
$I->see('dummy text');
