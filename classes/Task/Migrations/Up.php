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
class Task_Migrations_Up extends Kohana_Task_Migrations_Up { }