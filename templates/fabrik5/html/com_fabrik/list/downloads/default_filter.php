<!-- replace this in component code -->
<?php $use = array('downloads___acl', 'downloads___type', 'downloads___version'); ?>
<div class="card-panel fabrikFilterContainer">
	<span class="card-title">Search</span>
	<div class="filtertable fabrikTable card-content">

		<div class="input-field col s12">
		<input type="text" size="" placeholder="Search" value="paypal" class="fabrik_filter" name="fabrik_list_filter_all_37_com_fabrik_37">
			</div>
		<?php

		foreach ($this->filters as $key => $filter)
		{
			if ($key === 'all')
			{
				continue;
			}

			if (in_array($key, $use))
			{
				$class = $filter->required == 1 ? ' notempty' : '';
				?>
				<div class="input-field col s12">
					<?php echo $filter->element; ?>
					<label><?php echo JString::ucfirst($filter->label); ?></label>
				</div>
			<?php }
		} ?>
	</div>
	<div class="fabrik_search form-actions">
		<a class="clearFilters btn btn-flat" href="#"><i class="mdi mdi-close-circle"></i> Clear</a>
		<?php if ($this->filter_action != 'onchange')
		{ ?>
			<button class="pull-right fabrik_filter_submit button btn btn-info" name="filter">
				<i class="mdi mdi-filter"></i>
				<?php echo JText::_('GO'); ?></button>
		<?php } ?>
	</div>
</div>