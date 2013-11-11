<?php foreach ($lines as $row): ?>
<?php if ($row === NULL): ?>
<?php echo str_repeat('-', $border_size) ?>

<?php else: ?>
|<?php foreach ($row as $column): ?> <?php echo $column ?> |<?php endforeach ?>

<?php endif ?>
<?php endforeach ?>
