<?php
defined('JPATH_BASE') or die;

$d = $displayData;
$labelText = FText::_($d->label);
$labelText = $labelText == '' ? '&nbsp;' : $labelText;
$l = $d->j3 ? '' : $labelText;
$l .= $d->icons;
$l .= $d->j3 ? $labelText : '';

if ($d->view == 'form' && !($d->canUse || $d->canView))
{
	return '';
}

if ($d->view == 'details' && !$d->canView)
{
	return '';
}

$tip = trim($d->tipText) == '' ? '' : 'data-tooltip="' . $d->tipText . '"';
$d->labelClass = trim($d->tipText) === '' ? '' : $d->labelClass . ' tooltipped';
if ($d->canView || $d->canUse)
{
	if ($d->hasLabel && !$d->hidden)
	{
		?>

		<label for="<?php echo $d->id; ?>" class="<?php echo $d->labelClass; ?>" <?php echo $tip; ?>>
<?php
	}
	elseif (!$d->hasLabel && !$d->hidden)
	{
		?>
		<span class="<?php echo $d->labelClass; ?> faux-label">
<?php
	}
	?>
	<?php echo $l;?>
<?php
	if ($d->hasLabel && !$d->hidden)
	{
	?>
		</label>
	<?php
	}
	elseif (!$d->hasLabel && !$d->hidden)
	{
	?>
		</span>
	<?php
	}
}
