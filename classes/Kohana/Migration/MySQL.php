<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Kohana_Migration_MySQL extends Migration {

	/**
	 * Row types
	 */
	const ROW_TINYINT    = 'tinyint';
	const ROW_SMALLINT   = 'smallint';
	const ROW_MEDIUMINT  = 'mediumint';
	const ROW_INT        = 'int';
	const ROW_BIGINT     = 'bigint';
	const ROW_DECIMAL    = 'decimal';
	const ROW_FLOAT      = 'float';
	const ROW_DOUBLE     = 'double';
	const ROW_REAL       = 'real';
	const ROW_BIT        = 'bit';
	const ROW_BOOLEAN    = 'boolean';
	const ROW_SERIAL     = 'serial';
	const ROW_DATETIME   = 'datetime';
	const ROW_DATE       = 'date';
	const ROW_TIMESTAMP  = 'timestamp';
	const ROW_TIME       = 'time';
	const ROW_YEAR       = 'year';
	const ROW_TINYTEXT   = 'tinytext';
	const ROW_TINYBLOB   = 'tinyblob';
	const ROW_TEXT       = 'text';
	const ROW_BLOB       = 'blob';
	const ROW_MEDIUMTEXT = 'mediumtext';
	const ROW_MEDIUMBLOB = 'mediumblob';
	const ROW_LONGTEXT   = 'longtext';
	const ROW_LONGBLOB   = 'longblob';
	const ROW_BINARY     = 'binary';
	const ROW_VARBINARY  = 'varbinary';
	const ROW_ENUM       = 'enum';
	const ROW_SET        = 'set';
	const ROW_CHAR       = 'char';
	const ROW_VARCHAR    = 'varchar';

	/**
	 * Storage engines
	 */
	const ENGINE_INNODB = 'InnoDB';
	const ENGINE_MYISAM = 'MyISAM';
	const ENGINE_MEMORY = 'Memory';

	/**
	 * Returns a database connection
	 *
	 * @return Database
	 */
	protected function _db()
	{
		return Database::instance();
	}

	protected function _begin()
	{
		
	}
	
	protected function _commit()
	{
		
	}
	
	protected function _rollback()
	{
		
	}

	
	protected function _list_tables()
	{

	}

	protected function _table_exist($table)
	{

	}

	protected function _create_table($name, array $rows, $engine = Migration_MySQL::InnoDB)
	{

	}
	
	protected function _drop_table($name, $if_exist = FALSE)
	{

	}

	protected function _list_keys($table)
	{

	}

	protected function _add_key($table, array $rows)
	{

	}

	protected function _delete_key($table, $key)
	{

	}

	protected function _list_constraints()
	{
		
	}
	
	protected function _add_constraint()
	{

	}

	protected function _delete_constraint()
	{

	}

} // End Kohana_Migration_MySQL
