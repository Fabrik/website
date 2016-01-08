<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

// No direct access
defined('_JEXEC') or die;

$product = $this->singleton_product;
$params = $this->singleton_params;

?>
<?php echo J2Store::plugin()->eventWithHtml('BeforeRenderingProductPrice', array($this->product)); ?>

<?php if($params->get('item_show_product_base_price', 1) || $params->get('item_show_product_special_price', 1)): ?>
<div class="product-price-container">
		<?php if($params->get('item_show_product_base_price', 1) && $product->pricing->base_price != $product->pricing->price): ?>
			<?php $class='';?>
			<?php if(isset($product->pricing->is_discount_pricing_available)) $class='strike'; ?>
			<div class="base-price <?php echo $class?>">
					<span class="product-element-value">
						<?php echo J2Store::product()->displayPrice($product->pricing->base_price, $this->product, $this->params);?>
					</span>
			</div>
		<?php endif; ?>

		<?php if($params->get('item_show_product_special_price', 1)): ?>
		<div class="sale-price">
			<span class="product-element-value">
				<?php echo J2Store::product()->displayPrice($product->pricing->price, $this->product, $this->params);?>
				</span>
		</div>
	<?php endif; ?>
	
	<?php if($this->params->get('display_price_with_tax_info', 0) ): ?>
			<div class="tax-text">
				<?php echo J2Store::product()->get_tax_text(); ?>				
			</div>
		<?php endif; ?>
		
</div>
<?php endif; ?>

<?php echo J2Store::plugin()->eventWithHtml('AfterRenderingProductPrice', array($this->product)); ?>

<?php if($params->get('item_show_discount_percentage', 1) && isset($product->pricing->is_discount_pricing_available)): ?>
	<?php $discount =(1 - ($product->pricing->price / $product->pricing->base_price) ) * 100; ?>
	<?php if($discount > 0): ?>
		<div class="discount-percentage">
			<?php  echo round($discount).' % '.JText::_('J2STORE_PRODUCT_OFFER');?>
		</div>
	<?php endif; ?>
<?php endif; ?>