<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Show available to apply migrations
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
class Kohana_Task_Migrations_Status extends Minion_Task {

	protected function _execute(array $params)
	{
		$migrations = Migrations_Helper::get_available_migrations();

		if (sizeof($migrations) == 0)
		{
			return Minion_CLI::write('There is no available migrations');
		}

		$filters = array
		(
			'id' => array(),

			'name' => array
			(
				array('Migrations_Helper::fit_text', array(':value', 32))
			),

			'info' => array
			(
				array('Migrations_Helper::fit_text', array(':value', 32))
			)
		);

		Minion_CLI::write('Available migrations:');
		Minion_CLI::write(Migrations_Helper::table($migrations, $filters));
	}

} // End Kohana_Task_Migrations_Status
