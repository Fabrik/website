<?php
/**
 * Bootstrap Form Template - Group
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$rowStarted = false;
foreach ($this->elements as $element) :
	$this->element = $element;
	$this->class = 'fabrikErrorMessage';

	// Don't display hidden element's as otherwise they wreck multi-column layouts
	if (trim($element->error) !== '') :
		$element->error = $this->errorIcon . ' ' . $element->error;
		$element->containerClass .= ' error';
		$this->class .= ' help-inline';
	endif;

	if ($element->startRow) : ?>
		<div class="row">
	<?php
		$rowStarted = true;
	endif;
	$style = $element->hidden ? 'style="display:none"' : '';
	$span = $element->hidden ? '' : ' ' . $element->span;

	$test = str_replace('span', '', $span);
	if ($test !== '')
	{
		$span = ' col-sm-' . trim($test);
	}

	?>
			<div class="input-field <?php echo $element->containerClass . $span; ?>" <?php echo $style?>>
	<?php
	$labelsAbove = $element->labels;

	if ($labelsAbove == 1)
	{
		echo $this->loadTemplate('group_labels_above');
	}
	elseif ($labelsAbove == 2)
	{
		echo $this->loadTemplate('group_labels_none');
	}
	elseif ($element->span == 'span12' || $element->span == '' || $labelsAbove == 0)
	{
		echo $this->loadTemplate('group_labels_side');
	}
	else
	{
		// Multi columns - best to use simplified layout with labels above field
		echo $this->loadTemplate('group_labels_above');
	}
	?></div><!-- end control-group --><?php
	if ($element->endRow) :?>
		</div><!-- end row-fluid -->
	<?php
		$rowStarted = false;
	endif;
endforeach;

// If the last element was not closing the row add an additional div
if ($rowStarted === true) :?>
	</div><!-- end row-fluid for open row -->
<?php endif;?>
