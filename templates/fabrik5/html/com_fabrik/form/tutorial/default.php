<?php $form = $this->form;
?>
<div class="card-panel">
	<div class="card-content">

		<form method="post" <?php echo $form->attribs ?>>
			<?php
			echo $form->intro;
			echo $this->plugintop;
			$active = ($form->error != '') ? '' : ' fabrikHide';
			echo "<div class=\"fabrikMainError fabrikError$active\">";
			echo FabrikHelperHTML::image('alert.png', 'form', $this->tmpl);
			echo "$form->error</div>";
			$d = $this->data;

			$group = $this->groups['Flash Tutorial'];
			$links = $this->groups['Related Links'];
			?>
			<div class="page-header">
				<h1><?php echo $d['fab_tutorials___tut_name_raw'] ?>
					<small>
						<?php echo $d['fab_tutorials___category_raw']; ?></small>
				</h1>
			</div>
			<?php
			echo $d['fab_tutorials___tut_desc'];
			echo $group->elements['tut_flash']->element;
			echo $links->elements['tut_rel_link']->element;

			echo $this->hiddenFields;
			echo $this->pluginbottom;
			?>
			<div class="form-actions"><?php echo $form->resetButton; ?><?php echo $form->submitButton; ?>
				<?php echo $form->nextButton ?><?php echo $form->prevButton ?>
				<?php echo $form->applyButton; ?>
				<?php echo $form->copyButton . " " . $form->gobackButton . ' ' . $form->deleteButton . ' ' . $this->message ?>
			</div>
		</form>
		<?php
		echo FabrikHelperHTML::keepalive(); ?>
	</div>
</div>
