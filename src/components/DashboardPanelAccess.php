<?php
namespace cornernote\dashboard\components;

use cornernote\dashboard\Module;

/**
 * Dashboard acces controll
 *
 * @author Uldis Nelsons
 */
class DashboardPanelAccess
{

	private static $viewRoles = [];

	/**
	 *
	 * @param string $panelName
	 * @return boolean
	 */
	public static function userHasAccess($panelName)
	{
		if (!isset(self::$viewRoles[$panelName])) {
			self::$viewRoles[$panelName] = self::loadAllowRoles($panelName);
		}

		/**
		 * if not defined allow rules, any has access
		 */
		if (!self::$viewRoles[$panelName]) {
			return true;
		}

		foreach (self::$viewRoles[$panelName] as $role) {
			if (\Yii::$app->user->can($role)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * 
	 * @param string $panelName
	 * @return array
	 */
	private static function loadAllowRoles($panelName)
	{

		if (!$panels = Module::getInstance()->panels) {
			return [];
		}
		if (!isset($panels[$panelName])) {
			return [];
		}
		if (!is_array($panels[$panelName])) {
			return [];
		}
		if (!isset($panels[$panelName]['allowRoles'])) {
			return [];
		}

		$viewRoles = $panels[$panelName]['allowRoles'];

		if ($updateRoles = Module::getInstance()->updateRoles) {
			$viewRoles = array_merge($updateRoles, $viewRoles);
		}

		return $viewRoles;
	}
}
