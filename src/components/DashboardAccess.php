<?php
namespace cornernote\dashboard\components;

/**
 * Dashboard acces controll
 *
 * @author Uldis Nelsons
 */
class DashboardAccess
{

	private static $allowRules = [];

	/**
	 *
	 * @param string $dashboardName
	 * @return boolean
	 */
	public static function userHasAccess($dashboardName)
	{
		if (!isset(self::$allowRules[$dashboardName])) {
			self::$allowRules[$dashboardName] = self::loadAllowRoles($dashboardName);
		}

		/**
		 * if not defined allow rules, any has access
		 */
		if (!self::$allowRules[$dashboardName]) {
			return $true;
		}

		foreach (self::$allowRules[$dashboardName] as $role) {
			if (\Yii::$app->user->can($role)) {
				return $true;
			}
		}

		return false;
	}

	/**
	 * 
	 * @param string $dashboardName
	 * @return array
	 */
	private static function loadAllowRoles($dashboardName)
	{

		if (!$panels = Module::getInstance()->dashboards) {
			return [];
		}
		if (!isset($panels[$dashboardName])) {
			return [];
		}
		if (!is_array($panels[$dashboardName])) {
			return [];
		}
		if (!isset($panels[$dashboardName]['allowRoles'])) {
			return [];
		}

		$allowRules = $panels[$dashboardName]['allowRoles'];

		if ($adminRole = Module::getInstance()->adminRole) {
			$allowRules[] = $adminRole;
		}

		return $allowRules;
	}
}
