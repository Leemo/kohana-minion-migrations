<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Creates a new migration file
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
class Kohana_Task_Migrations_Create extends Minion_Task {

	protected function _execute(array $params)
	{
		$name = Minion_CLI::read('Migration short name (3-128 characters, [A-Za-z0-9-_] )');
		$info = Minion_CLI::read('Migration info (not necessarily)');

		$validation = Validation::factory(array('name' => $name))
			->rules('name', array(
				array('not_empty'),
				array('min_length', array(':value', 3)),
				array('max_length', array(':value', 128)),
				array('regex', array(':value', '/^[a-zA-Z0-9-_ ]*$/i'))
				))
			->label('name', 'Migration name');

		if ( ! $validation->check())
		{
			foreach ($validation->errors('minion/migrations') as $error)
			{
				Minion_CLI::write($error);
			}

			return;
		}

		$id       = time();
		$filename = $this->_filename($id, $name);
		$name     = UTF8::ucfirst($name);
		$class    = Migrations_Helper::filename_to_class($filename);

		$contents = View::factory('minion/migrations/create')
			->bind('class', $class)
			->bind('id', $id)
			->bind('name', $name)
			->bind('info', $info);

		$filename = APPPATH.Kohana::$config->load('migrations')->directory
			.DIRECTORY_SEPARATOR.$filename;

		try
		{
			file_put_contents($filename, $contents);
		}
		catch (Exception $e)
		{
			Minion_CLI::write('Error! '.$e->getMessage());
		}

		Minion_CLI::write('Done! Check APPPATH'.DIRECTORY_SEPARATOR.str_replace(APPPATH, '', $filename));
	}

	/**
	 * Generates a task full filename by task name
	 *
	 * @param  integer $id   migration id
	 * @param  string  $name migration name
	 * @return string
	 */
	protected function _filename($id, $name)
	{
		return $id.Migrations_Helper::DELIMITER.str_replace(array('-', ' '), '_', UTF8::strtolower($name)).EXT;
	}

} // End Kohana_Task_Migrations_Create
