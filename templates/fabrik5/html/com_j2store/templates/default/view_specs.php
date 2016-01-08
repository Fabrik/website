<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

// No direct access
defined('_JEXEC') or die;
?>
<?php if(isset($this->filters) && count($this->filters)):?>
<div class="j2store-product-specifications">

			<?php foreach($this->filters as $group_id => $rows):?>
				<h4 class="filter-group-name"><?php echo $rows['group_name']; ?></h4>
				<table class="table table-striped">
				<?php foreach($rows['filters'] as $filter): ?>
				<tr>
					<td>
						<?php echo $filter->filter_name;?>
					</td>
				</tr>
				<?php endforeach;?>
				</table>
			<?php endforeach;?>

	</div>
<?php endif;?>

<?php if(isset($this->product->variant) && !empty($this->product->variant)):?>

	<table class="table table-striped">
		<?php  if($this->product->variant->length && $this->product->variant->height && $this->product->variant->width ):?>
		<tr>
			<td><?php echo JText::_('J2STORE_PRODUCT_DIMENSIONS');?></td>
			<td>
				<span class="product-dimensions">
					<?php echo round($this->product->variant->length,2);?> x <?php echo round($this->product->variant->height,2);?> x <?php echo round($this->product->variant->width,2) ;?>
					<?php echo $this->product->variant->length_title;?>
				</span>
			</td>
		</tr>
		<?php  endif;?>

		<?php if($this->product->variant->weight):?>
		<tr>
			<td>
				<?php echo JText::_('J2STORE_PRODUCT_WEIGHT');?>
			</td>
			<td>
				<span class="product-weight">
					<?php echo round($this->product->variant->weight, 2); ?>
					<?php echo $this->product->variant->weight_title;?>
				</span>	
			</td>
		</tr>
		<?php endif;?>
	</table>
<?php endif;?>