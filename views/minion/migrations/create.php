<?php echo '<?php defined(\'SYSPATH\') or die(\'No direct access allowed.\');' ?>


class <?php echo $class ?> extends Migration {

	/**
	 * Returns migtation ID
	 *
	 * @return integer
	 */
	public function id()
	{
		return <?php echo $id ?>;
	}

	/**
	 * Returns migtation name
	 *
	 * @return string
	 */
	public function name()
	{
		return '<?php echo addcslashes($name, '\'') ?>';
	}

	/**
	 * Returns migtation info
	 *
	 * @return string
	 */
	public function info()
	{
		return '<?php echo addcslashes($info, '\'') ?>';
	}

	/**
	 * Takes a migration
	 *
	 * @return void
	 */
	public function up()
	{

	}

	/**
	 * Removes migration
	 *
	 * @return void
	 */
	public function down()
	{

	}

} // End <?php echo $class ?>

