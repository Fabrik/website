<!-- replace this in component code -->
<?php $use = array('downloads___acl', 'downloads___type', 'downloads___version'); ?>
<div class="card-panel fabrikFilterContainer">
	<span class="card-title"><i class="mdi mdi-magnify"></i> Search</span>
	<div class="filtertable fabrikTable card-content">

		<div class="input-field col-xs-12">

			<input type="text" id="downloadsSearch" size="" placeholder="Search" value="" class="fabrik_filter" name="fabrik_list_filter_all_37_com_fabrik_37">
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

				$doc = new DOMDocument();
				$doc->loadHTML($filter->element);
				$label  = '<label for="' . $filter->id . '">' . JString::ucfirst($filter->label) . '</label>';
				$xpath  = new DomXPath($doc);
				$hidden = $xpath->query('//input[@type=\'hidden\']');
				$label  = $doc->createElement('label', $filter->label);
				$label->setAttribute('for', $filter->id);
				$hidden->item(0)->parentNode->insertBefore($label, $hidden->item(0));
				$doc->formatOutput = true;

				?>
				<div class="input-field col-xs-12">
					<div class="row">
						<?php echo $doc->saveHTML(); ?>
					</div>
				</div>
			<?php }
		} ?>
	</div>
	<div class="fabrik_search form-actions">
		<div class="row">
			<div class="col-xs-6 col-sm-12 col-md-12 col-lg-6 center-align">
				<a class="clearFilters btn btn-flat" href="#">Clear</a>
			</div>

			<?php if ($this->filter_action != 'onchange')
			{ ?>
				<div class="col-xs-6 col-sm-12 col-md-12 col-lg-6 center-align">
					<button class="fabrik_filter_submit button btn btn-info" name="filter">
						<i class="mdi mdi-filter"></i></button>
				</div>
			<?php } ?>

		</div>

	</div>
</div>