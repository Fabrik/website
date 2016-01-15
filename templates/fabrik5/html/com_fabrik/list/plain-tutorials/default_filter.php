<!-- replace this in component code -->


<div class="fabrikFilterContainer">

	<div class="filtertable fabrikTable">

		<div class="fabrik_search_all">
			<?php if (array_key_exists('all', $this->filters)) {
			echo $this->filters['all']->element;
			}?>
		</div>
	<?php

	foreach ($this->filters as $key => $filter) {

			$class = $filter->required == 1 ? ' notempty' : '';

		?>

		<div class="<?php echo $class . ' filter_' . $key.'_label'?> ">

			<?php echo $filter->label;?>

		</div>

		<div class="<?php echo $class . ' filter_' . $key?>">

			<?php echo $filter->element;?>

		</div>

	<?php

	} ?>

	</div>

	<div class="fabrik_search form-actions">

		<a class="clearFilters btn" href="#"><i class="icon-remove"></i>Clear</a>
			<?php if ($this->filter_action != 'onchange') {?>

				<button class="pull-right fabrik_filter_submit button btn btn-info" name="filter">
				<i class="icon-filter"></i>
				<?php echo JText::_('GO');?></button>

			<?php }?>


	</div>

</div>