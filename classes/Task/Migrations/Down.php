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
class Task_Migrations_Down extends Kohana_Task_Migrations_Down { }