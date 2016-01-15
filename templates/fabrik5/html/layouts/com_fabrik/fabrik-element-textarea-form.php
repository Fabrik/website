<?php

defined('JPATH_BASE') or die;

// Add span with id so that element fxs work.
$d = $displayData;

?>
<textarea
	<?php foreach ($d->attributes as $key => $value) :
		if ($key === 'class') :
			$value = 'fabrikinput materialize-textarea ';
	endif;
	echo $key . '="' . $value . '"';
endforeach;
	?>><?php echo $d->value;?></textarea>

<?php if ($d->showCharsLeft) : ?>
	<?php echo $this->sublayout('charsleft', $d);?>
<?php endif; ?>
