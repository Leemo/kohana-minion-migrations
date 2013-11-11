<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Applies migrations
 *
 * It can accept the following options:
 *  --to: ID of migration, to which you want to upgrade.
 *       In other words, the ID of the migration, you want to apply the latest!
 *       (see migrations:status)
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
class Kohana_Task_Migrations_Up extends Minion_Task {

	/**
	 * Default task parameters
	 *
	 * @see http://kohanaframework.org/3.3/guide/minion/tasks
	 * @see http://forum.kohanaframework.org/discussion/comment/76410
	 * @var array
	 */
	protected $_options = array
	(
		'to' => NULL
	);

	protected function _execute(array $params)
	{
		$available_migrations = Migrations_Helper::get_available_migrations();

		foreach ($available_migrations as $migration)
		{
			if ($params['to'] === NULL OR $migration['id'] <= $params['to'])
			{
				try
				{
					Migrations_Helper::apply($migration['filename'], Migrations_Helper::DIRECTION_UP);
					Minion_CLI::write('Migration '.$migration['filename'].' applied');
				}
				catch (Kohana_Minion_Exception $e)
				{
					Minion_CLI::write($e->getMessage());
					Minion_CLI::write('Halted!');
					return;
				}
			}
		}

		Minion_CLI::write('Done!');
	}

	public function build_validation(Validation $validation)
	{
		return parent::build_validation($validation)
			->rule('to', 'numeric')
			->label('to', 'Migration ID');
	}

} // End Kohana_Task_Migrations_Up
