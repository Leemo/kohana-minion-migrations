<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Applies migrations
 *
 * It can accept the following options:
 *  --to: Id of migration, to which you want to rolled back.
 *       In other words, ID migration, to which you want to roll back, but not including!
 *       (see migrations:history)
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
class Kohana_Task_Migrations_Down extends Minion_Task {

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
		$applied_migrations = DB::select('filename')
			->from(Kohana::$config->load('migrations')->table);

		if ($params['to'] !== NULL)
		{
			$applied_migrations->where('id', '>', $params['to']);
		}

		$applied_migrations = $applied_migrations->order_by('id', 'DESC')
			->execute()
			->as_array();

		foreach ($applied_migrations as $migration)
		{
			try
			{
				Migrations_Helper::apply($migration['filename'], Migrations_Helper::DIRECTION_DOWN);
				Minion_CLI::write('Migration '.$migration['filename'].' rolled back');
			}
			catch (Kohana_Minion_Exception $e)
			{
				Minion_CLI::write($e->getMessage());
				Minion_CLI::write('Halted!');
				return;
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

} // End Kohana_Task_Migrations_Down
