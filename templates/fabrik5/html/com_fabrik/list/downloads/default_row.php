<?php $class = 'badge';
$hits        = @$this->_row->data->downloads___hits;
if ($hits > 400)
{
	$class .= ' badge-important';
}
$version    = $this->_row->data->downloads___joomla_version;
$rawVersion = $this->_row->data->downloads___joomla_version_raw;
$d          = $this->_row->data;
$title      = $d->downloads___title_raw . ' <small>v' . $d->downloads___version . '</small>';

switch ($rawVersion)
{
	case '25':
		$versionLabel = 'label-info';
		break;
	case '3':
	case '30':
	case '31':
	case '32':
		$versionLabel = 'label-warning';
		break;
	default :
		$versionLabel = '';
		break;
}
$rowClass = strstr($this->_row->class, 'sticky1') ? 'well' : '';
?>

<div class="card" itemscope itemtype="http://schema.org/Product">
	<div class="card-image waves-effect waves-block waves-light">
		<?php if ($d->downloads___image_raw !== '')
		{
			?>
			<img src="<?php echo $d->downloads___image_raw; ?>">
			<?php
		}
		else
		{
			if ($d->downloads___icon_raw !== '')
			{
				$bg     = $d->downloads___type_raw === 'module' ? 'fa-square-o' : 'fa-circle-o-notch';
				$bgSize = $d->downloads___type_raw === 'module' ? 'fa-4x' : 'fa-3x';
				?>
				<div class="<?php echo $d->downloads___folder_raw . ' ' . $d->downloads___type_raw; ?>" style="background:#fff;text-align:center;padding: 40px">
						<span class="fa-stack <?php echo $bgSize; ?>">
						  <i class="fa <?php echo $bg; ?> fa-stack-2x"></i>
						  <i class="fa <?php echo $d->downloads___icon_raw; ?> fa-stack-1x"></i>
						</span>
				</div>
			<?php }
		} ?>
	</div>
	<div class="card-content">
		<span class="card-title activator grey-text text-darken-4" itemprop="name">
			<?php echo $title; ?>
			<i class="fa fa-ellipsis-v right"></i></span>
		<?php
		$product = F0FTable::getAnInstance('Product', 'J2StoreTable')->getClone();

		if ($product->get_product_by_source('com_fabrik.37', $d->downloads___id_raw))
		{
			echo $product->get_product_html();
		}
		else
		{
		?>
		<div class="product-price-container">
			<div class="sale-price free">
&nbsp;
			</div>
		</div>
	<div class="j2store-addtocart-form">
		<div class="j2store-add-to-cart">

			<a href="<?php echo Juri::base(); ?>index.php?option=com_fabrik&task=plugin.pluginAjax&plugin=fileupload&method=ajax_download&format=raw&element_id=355&formid=36&rowid=<?php echo $d->downloads___id_raw;?>&repeatcount=0" class="btn btn-primary button">Free download</a>
		</div></div>
		<?php
		}
		?></p>
	</div>
	<div class="card-reveal">
		<span class="card-title grey-text text-darken-4"><?php echo $title; ?><i class="material-icons right">close</i></span>
		<p><?php echo $d->downloads___description; ?></p>
	</div>
</div>

