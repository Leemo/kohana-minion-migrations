# Migrations toolkit for Kohana PHP framework... yet another

## Configuration

See MODPATH/migrations/config/migrations.php

```php
return array
(
	'directory' => 'migrations',

	'table' => 'migrations'
);
```

__directory__ - directory in `APPPATH`, that will store the files migrations.
Don't use trailing slashes!

__table__ - table, that will store information about applied migrations.
See SQL-file in the root of this repo. And dont't forget about prefixes.

## Create a migration

```
$ php5 index.php --task=migrations:create

Migration short name (3-128 characters, [A-Za-z0-9-_] ): My first migration
Migration info (not necessarily): This is description of my awesome first migration
Done! Check APPPATH/migrations/1384195794___my_first_migration.php
```

Let's take a look at the generated file:
```php
<?php defined('SYSPATH') or die('No direct access allowed.');

class Migration1384195794_My_First_Migration extends Migration {

	/**
	 * Returns migtation ID
	 *
	 * @return integer
	 */
	public function id()
	{
		return 1384195794;
	}

	/**
	 * Returns migtation name
	 *
	 * @return string
	 */
	public function name()
	{
		return 'My first migration';
	}

	/**
	 * Returns migtation info
	 *
	 * @return string
	 */
	public function info()
	{
		return 'This is description of my awesome first migration';
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

} // End Migration1384195794_My_First_Migration

```

It remains only to fill out the logic methods `up` and `down`;

To further demonstrate, I will create another migration:
```
$ php5 index.php --task=migrations:create

Migration short name (3-128 characters, [A-Za-z0-9-_] ): my second migration
Migration info (not necessarily): Just simple description, not the big deal
Done! Check APPPATH/migrations/1384195891___my_second_migration.php
```

## List of available migrations

```
$ php5 index.php --task=migrations:status

Available migrations:
-------------------------------------------------------------------
| ID         | NAME                | INFO                         |
-------------------------------------------------------------------
| 1384195794 | My first migration  | This is description of my    |
|            |                     | awesome first migration      |
-------------------------------------------------------------------
| 1384195891 | My second migration | Just simple description, not |
|            |                     | the big deal                 |
-------------------------------------------------------------------
```

## Apply migrations

`$ php5 index.php --task=migrations:down [--to=<migration ID>]`

This refers to the migration ID from the `migrations:status` task.

```
$ php5 index.php --task=migrations:up

Migration 1384195794___my_first_migration.php applied
Migration 1384195891___my_second_migration.php applied
Done!
```

## Migrations history

`$ php5 index.php --task=migrations:history [--from=<date>] [--limit=<limit>]`

By default, the limit is 10.
```
$ php5 index.php --task=migrations:history

Last 10 migrations:
--------------------------------------------------------------------------------
| ID         | DATE       | NAME                | INFO                         |
--------------------------------------------------------------------------------
| 1384195891 | 2013-11-11 | My second migration | Just simple description, not |
|            | 22:52      |                     | the big deal                 |
--------------------------------------------------------------------------------
| 1384195794 | 2013-11-11 | My first migration  | This is description of my    |
|            | 22:52      |                     | awesome first migration      |
--------------------------------------------------------------------------------
```

I hope you noticed that the list of migration come from new to old.

## Rollback migrations

`$ php5 index.php --task=migrations:down [--to=<migration ID>]`

This refers to the migration ID from the `migrations:history` task.

Ok, rollback migrations:
```
$ php5 index.php --task=migrations:down

Migration 1384195891___my_second_migration.php rolled back
Migration 1384195794___my_first_migration.php rolled back
Done!
```