<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Migrations abstract class
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
abstract class Kohana_Migration {

	/**
	 * Returns migtation ID
	 *
	 * @return integer
	 */
	abstract public function id();

	/**
	 * Returns migtation name
	 *
	 * @return string
	 */
	abstract public function name();

	/**
	 * Returns migtation info
	 *
	 * @return string
	 */
	abstract public function info();

	/**
	 * Takes a migration
	 *
	 * @return void
	 */
	abstract public function up();

	/**
	 * Removes migration
	 *
	 * @return void
	 */
	abstract public function down();

} // End Kohana_Migration
