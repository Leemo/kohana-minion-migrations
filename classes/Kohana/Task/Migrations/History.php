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
class Kohana_Task_Migrations_History extends Minion_Task {

	/**
	 * Default task parameters
	 *
	 * @see http://kohanaframework.org/3.3/guide/minion/tasks
	 * @see http://forum.kohanaframework.org/discussion/comment/76410
	 * @var array
	 */
	protected $_options = array
	(
		'from'  => NULL,
		'limit' => 10
	);

	protected function _execute(array $params)
	{
		$history = DB::select('id', 'date', 'name', 'info')
			->from(Kohana::$config->load('migrations')->table);

		if ($params['limit'] !== NULL)
		{
			$history->limit($params['limit']);
			$legend = 'Last '.$params['limit'].' migrations';
		}

		if ($params['from'] !== NULL)
		{
			if (empty($legend))
			{
				$legend = 'Migrations';
			}

			$date = date('Y-m-d H:i:s', strtotime($params['from']));

			$history->where('date', '>=', $date);

			$legend .= ' from '.$date;
		}

		Minion_CLI::write($legend.':');

		$history = $history
			->order_by('id', 'DESC')
			->execute()
			->as_array();

		if (sizeof($history) == 0)
		{
			return Minion_CLI::write('Nothing found');
		}

		$filters = array
		(
			'id' => array(),

			'date' => array
			(
				array('Date::formatted_time', array(':value', "Y-m-d\nH:i"))
			),

			'name' => array
			(
				array('Migrations_Helper::fit_text', array(':value', 32))
			),

			'info' => array
			(
				array('Migrations_Helper::fit_text', array(':value', 32))
			)
		);

		Minion_CLI::write(Migrations_Helper::table($history, $filters));
	}

	public function build_validation(Validation $validation)
	{
		return parent::build_validation($validation)
			->rule('from', 'date')
			->rule('limit', 'digit')
			->label('from', 'Start date')
			->label('limit', 'Limit');
	}

} // End Kohana_Task_Migrations_History
