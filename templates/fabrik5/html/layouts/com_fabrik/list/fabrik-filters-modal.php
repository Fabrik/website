<?php
/**
 * Layout: List filters
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2015 fabrikar.com - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.4
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

$d = $displayData;

$cols = array();
foreach ($d->filters as $key => $filter) :
	if ($key !== 'all') :
		$doc = new DOMDocument();
		$doc->loadHTML($filter->element);
		$label = '<label for="' . $filter->id . '">' . $filter->label . '</label>';
		$xpath = new DomXPath($doc);
		$hidden = $xpath->query('//input[@type=\'hidden\']');
		$label = $doc->createElement('label', $filter->label);
		$label->setAttribute('for', $filter->id);
		$hidden->item(0)->parentNode->insertBefore($label, $hidden->item(0));
		$doc->formatOutput = true;
		$required = $filter->required == 1 ? ' notempty' : '';
		$col      = '<div data-filter-row="' . $key . '" class="fabrik_row oddRow' . $required . ' input-field">';
		$col .= $doc->saveHTML();
		$col .= '</div>';
		$cols[] = $col;
	endif;
endforeach;

$showClearFilters = false;
foreach ($d->filters as $key => $filter) :
	if ($filter->displayValue !== '') :
		$showClearFilters = true;
	endif;
endforeach;

?>
<?php if ($showClearFilters) : ?>
	<div>
		<?php echo JText::_('COM_FABRIK_FILTERS_ACTIVE') ?>
		<?php
		foreach ($d->filters as $key => $filter) :
			if ($filter->displayValue !== '') :
				?>
				<span class="label label-inverse">
				<?php echo $filter->label . ': ' . $filter->displayValue . ' '; ?>
					<a data-filter-clear="<?php echo $key; ?>" href="#" style="color: white;">
						<?php echo FabrikHelperHTML::icon('icon-close-circle', '', 'style="text-align: right; "'); ?>
					</a>
			</span>
				<?php
			endif;
		endforeach;
		?>
	</div>
	<?php
endif;
?>
<div class="fabrikFilterContainer modal" id="filter_modal">

	<div class="modal-content">
		<h3><?php echo FabrikHelperHTML::icon('icon-filter', FText::_('COM_FABRIK_FILTER')); ?></h3>
		<table class="table table-stripped">
			<?php
			echo implode("\n", FabrikHelperHTML::bootstrapGrid($cols, $d->filterCols));
			?>
		</table>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Close</a>
		<?php
		if ($d->showClearFilters) : ?>
			<a class="btn clearFilters btn-flat" href="#">
				<?php echo FabrikHelperHTML::icon('icon-refresh', FText::_('COM_FABRIK_CLEAR')); ?>
			</a>
		<?php endif ?>
		<?php
		if ($d->filter_action != 'onchange') :
			?>
			<input type="button" class="btn btn-primary fabrik_filter_submit"
				value="<?php echo FText::_('COM_FABRIK_GO'); ?>" name="filter">
			<?php
		endif;
		?>
	</div>
</div>