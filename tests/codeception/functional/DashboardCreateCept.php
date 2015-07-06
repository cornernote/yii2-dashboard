<?php

use cornernote\dashboard\tests\FunctionalTester;
use Codeception\Scenario;
use yii\helpers\Url;

/**
 * @var $scenario Scenario
 */

$I = new FunctionalTester($scenario);
$I->wantTo('ensure that create dashboard works');

$I->amOnPage(Url::to(['/dashboard/dashboard/create']));
$I->see('Create Dashboard');
$I->submitForm('#dashboard-form', []);
$I->see('Name cannot be blank.');
$I->see('Layout Class cannot be blank.');

$I->amOnPage(Url::to(['/dashboard/dashboard/create']));
$I->fillField('Dashboard[name]', 'default dashboard');
$I->selectOption('Dashboard[layout_class]', 'default');
$I->fillField('Dashboard[sort]', '0');
$I->checkOption('#dashboard-enabled');
$I->submitForm('#dashboard-form', []);

$I->see('default dashboard', 'h1');
$I->selectOption('DefaultLayout[columns]', '1');
$I->submitForm('#dashboard-form', []);

$I->see('default dashboard', 'h1');

//$I->click('.glyphicon-trash');
//$I->dontSee('default dashboard');