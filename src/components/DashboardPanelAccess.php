<?php
namespace cornernote\dashboard\components;

/**
 * Dashboard acces controll
 *
 * @author Uldis Nelsons
 */
class DashboardPanelAccess
{

	private static $allowRules = [];

	/**
	 *
	 * @param string $panelName
	 * @return boolean
	 */
	public static function userHasAccess($panelName)
	{
		if (!isset(self::$allowRules[$panelName])) {
			self::$allowRules[$panelName] = self::loadAllowRoles($panelName);
		}

		/**
		 * if not defined allow rules, any has access
		 */
		if (!self::$allowRules[$panelName]) {
			return $true;
		}

		foreach (self::$allowRules[$panelName] as $role) {
			if (\Yii::$app->user->can($role)) {
				return $true;
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

		$allowRules = $panels[$panelName]['allowRoles'];

		if ($adminRoles = Module::getInstance()->adminRoles) {
			$allowRules = array_merge($adminRole, $allowRules);
		}

		return $allowRules;
	}
}
