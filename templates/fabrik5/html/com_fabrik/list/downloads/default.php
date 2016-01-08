<div class="emptyDataMessage" style="<?php echo $this->emptyStyle?>"><?php echo $this->emptyDataMessage; ?></div>

<?php if ($this->params->get('show-title', 1)) :?>
	<div class="page-header">
	<h1 class="fabrikTableHeading"><?php echo $this->table->label;?></h1>
	</div>
<?php endif;?>
<?php echo $this->table->intro;?>

<div class="row">
	<div class="col-xs-3">
		<form class="fabrikForm" action="<?php echo $this->table->action;?>" method="post" id="<?php echo $this->formid;?>" name="fabrikTable">
		<?php echo $this->loadTemplate('buttons');
		if ($this->showFilters) {
			echo $this->loadTemplate('filter');
		}?>
				<?php echo $this->nav; ?>
				<div class="fabrikButtons">
					<?php
					if ($this->canDelete) {
						echo $this->deleteButton;
					}
					?>
					<?php
					if ($this->emptyLink) {?>
						<li>
							<a href="<?php echo $this->emptyLink?>" class="doempty">
								<?php echo $this->buttons->empty;?>
								<span><?php echo JText::_('COM_FABRIK_EMPTY')?></span>
							</a>
						</li>
					<?php }?>
				</div>
			<?php
			print_r($this->hiddenFields);
			?>
		</form>
	</div>

	<div class="col-xs-9">
	<?php
		foreach ($this->rows as $groupedby => $group) :
			if ($this->isGrouped) :
				echo $this->grouptemplates[$groupedby];
			endif;
			?>
		<div class="fabrikTable" id="table_<?php echo $this->table->id;?>" >
			<?php
			$items = array();
				foreach ($group as $this->_row) :
					$items[] = $this->loadTemplate('row');
			 	endforeach;
			echo implode("\n", FabrikHelperHTML::bootstrapGrid($items, 2));
			 	?>
		</div>
	<?php endforeach; ?>
	</div>
</div>




