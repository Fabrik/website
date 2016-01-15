<?php
defined('JPATH_BASE') or die;
$d = $displayData;
?>

<?php
if ($d->askReceipt) :
	?>
	<div class="row">
		<div class="col-xs-12">
			<input type="checkbox" name="fabrik_email_copy" id="fabrik_email_copy" class="contact_email_copy" value="1" />
			<label for="fabrik_email_copy">
				<?php echo $d->label; ?>
			</label>
		</div>
	</div>
	<?php
endif;
?>

