<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Show migrations history
 *
 * It can accept the following options:
 *  --from:  From what date to show the history (not required)
 *  --limit: Number of the latter parameters shown (not required, default=10)
 *
 * @package    Minion/Migrations
 * @category   Helpers
 * @author     Leemo Studio
 * @author     Alexey Popov (https://github.com/Alexeyco)
 * @copyright  (c) 2009-2013 Leemo Studio
 * @license    BSD 3 http://opensource.org/licenses/BSD-3-Clause
 */
class Task_Migrations_History extends Kohana_Task_Migrations_History { }