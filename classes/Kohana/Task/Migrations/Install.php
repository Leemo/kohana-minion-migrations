<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Install migrations service
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
class Kohana_Task_Migrations_Install extends Minion_Task {

	protected function _execute(array $params)
	{
		$db = Database::instance();

		$table_prefix    = $db->table_prefix();
		$instance_name   = (string) $db;

		$connection_type = Kohana::$config
			->load('database.'.$instance_name.'.type');

		$install_file = Kohana::find_file('schemas', 'migrations/'.$connection_type.'/install', 'sql');

		if ( ! is_file($install_file))
		{
			throw new Kohana_Minion_Exception('File schemas/migrations/'.$connection_type.'/install.sql doesn\'t exist');
		}

		$query = file_get_contents($install_file);

		try
		{
			DB::query(NULL, str_replace(':prefix_', $table_prefix, $query))
				->execute();
		}
		catch (Exception $e)
		{
			throw new Kohana_Minion_Exception($e->getMessage());
		}

		Minion_CLI::write('Migrations service successfully installed');
	}

} // End Kohana_Task_Migrations_Create
