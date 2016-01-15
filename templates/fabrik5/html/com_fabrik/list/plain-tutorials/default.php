<div class="card-panel">
	<div class="card=-content">
<div class="emptyDataMessage" style="<?php echo $this->emptyStyle ?>">
	<?php echo $this->emptyDataMessage; ?>
</div>
<form class="fabrikForm" action="<?php echo $this->table->action; ?>" method="post" id="<?php echo $this->formid; ?>" name="fabrikTable">
<?php
if ($this->params->get('show_page_title', 0)) :
?>
	<div class="componentheading<?php echo $this->params->get('pageclass_sfx') ?>"><?php echo $this->escape($this->params->get('page_title')); ?></div>
<?php
endif;
if ($this->params->get('show-title', 1)) :
?>
	<div class="page-header">
	<h1 class="fabrikTableHeading"><?php echo $this->table->label; ?></h1>
	</div>
<?php
endif;
?>
<div style="padding-bottom: 9px">
<?php echo $this->table->intro; ?>
</div>
<div class="row">
	<div class="col-xs-3">

<?php
echo $this->loadTemplate('buttons');
if ($this->showFilters) :
	echo $this->loadTemplate('filter');
endif;
?>

	</div>

	<div class="col-xs-9">
	<?php

foreach ($this->rows as $groupedby => $group) :
	if ($this->isGrouped) :
		echo $this->grouptemplates[$groupedby];
	endif;
	?>

		<div class="fabrikTable" id="table_<?php echo $this->table->id; ?>" >

			<?php
	foreach ($group as $this->_row) :
		echo $this->loadTemplate('row');
	endforeach;
			?>

		</div>
	<?php
endforeach;
	?>

		<?php
print_r($this->hiddenFields);
		?>

	</div>
</div>

<div class="form-actions">
	<?php echo $this->nav; ?>
</div>

</form>
</div>
</div>