<?php $data = $this->_row->data;
$app = JFactory::getApplication();
$input = $app->input;
?>
<tr id="<?php echo $this->_row->id;?>" class="<?php echo $this->_row->class;?>">
	<td>

	<div class="row">

		<div class="col-xs-12">
			<h3><?php echo $data->fab_tutorials___tut_name; ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3">
			<ul>
				<li><small><i class="icon-calendar"></i> updated: <?php echo $data->fab_tutorials___time_date?></small></li>
			</ul>
		</div>

		<div class="col-xs-6">
			<?php echo $data->fab_tutorials___tut_desc?>
		</div>

		<div class="col-xs-3">
			<?php if ($input->getInt('listid') !== 35) {?>
			<a class="btn btn-primary pull-right" href="<?php echo $data->fabrik_view_url; ?>">
				<i class="icon-film icon-white"></i> View Tutorial
			</a>
			<?php }?>
		</div>
	</div>

	<hr />
	</td>
</tr>