<?php
namespace cornernote\dashboard\components;

/**
 * Dashboard acces controll
 *
 * @author Uldis Nelsons
 */
class DashboardAccess
{

	private static $viewRoles = [];

	/**
	 *
	 * @param string $dashboardName
	 * @return boolean
	 */
	public static function userHasAccess($dashboardName)
	{
		if (!isset(self::$viewRoles[$dashboardName])) {
			self::$viewRoles[$dashboardName] = self::loadAllowRoles($dashboardName);
		}

		/**
		 * if not defined allow rules, any has access
		 */
		if (!self::$viewRoles[$dashboardName]) {
			return $true;
		}

		foreach (self::$viewRoles[$dashboardName] as $role) {
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

		$viewRoles = $panels[$dashboardName]['allowRoles'];

		if ($updateRoles = Module::getInstance()->updateRoles) {
			$viewRoles = array_merge($updateRoles, $viewRoles);
		}

		return $viewRoles;
	}
}
