<?php
/**
 * @package   J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license   GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;
?>
<div class="card-panel">
	<table class="j2store-cart-table table table-bordered">
		<thead>
		<tr>
			<th><?php echo JText::_('J2STORE_CART_LINE_ITEM'); ?></th>
			<?php if ($this->params->get('show_qty_field', 1)) : ?>
				<th style="width: 20px;"><?php echo JText::_('J2STORE_CART_LINE_ITEM_QUANTITY'); ?></th>
			<?php endif; ?>
			<?php if (isset($this->taxes) && count($this->taxes) && $this->params->get('show_item_tax', 0)): ?>
			<th><?php echo JText::_('J2STORE_CART_LINE_ITEM_TAX'); ?>
				<?php endif; ?>
			<th><?php echo JText::_('J2STORE_CART_LINE_ITEM_TOTAL'); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php $i = 0; ?>
		<?php foreach ($this->items as $item): ?>
			<?php

			$registry = new JRegistry;
			$registry->loadString($item->orderitem_params);
			$item->params = $registry;
			$thumb_image  = $item->params->get('thumb_image', '');
			?>
			<tr>
				<td>

					<?php if ($this->params->get('show_thumb_cart', 1) && !empty($thumb_image)): ?>
						<span class="cart-thumb-image">
								<img alt="<?php echo $item->orderitem_name; ?>" src="<?php echo $thumb_image; ?>">
							</span>
					<?php endif; ?>
					<span class="cart-product-name">
							<?php echo $item->orderitem_name; ?>
						<?php if (!$this->params->get('show_qty_field', 1)) : ?>
							<a class="j2store-remove remove-icon" href="<?php echo JRoute::_('index.php?option=com_j2store&view=carts&task=remove&cartitem_id=' . $item->cartitem_id); ?>">X</a>
						<?php endif; ?>
						</span>
					<br />
					<?php if (isset($item->orderitemattributes) && $item->orderitemattributes): ?>
						<span class="cart-item-options">
							<?php foreach ($item->orderitemattributes as $attribute): ?>
								<small>
									- <?php echo JText::_($attribute->orderitemattribute_name); ?> : <?php echo $attribute->orderitemattribute_value; ?>
								</small>
								<br />
							<?php endforeach; ?>
							</span>
					<?php endif; ?>

					<?php if ($this->params->get('show_price_field', 1)): ?>

						<span class="cart-product-unit-price">
								<span class="cart-item-title"><?php echo JText::_('J2STORE_CART_LINE_ITEM_UNIT_PRICE'); ?></span>
								<span class="cart-item-value">
								<?php echo $this->currency->format($this->order->get_formatted_lineitem_price($item, $this->params->get('checkout_price_display_options', 1))); ?>
								</span>
							</span>
					<?php endif; ?>

					<?php if ($this->params->get('show_sku', 1)): ?>
						<br />
						<span class="cart-product-sku">
								<span class="cart-item-title"><?php echo JText::_('J2STORE_CART_LINE_ITEM_SKU'); ?></span>
								<span class="cart-item-value"><?php echo $item->orderitem_sku; ?></span>
							</span>

					<?php endif; ?>

					<?php if (isset($this->onDisplayCartItem[$i])): ?>
						<br />
						<?php echo $this->onDisplayCartItem[$i]; ?>
					<?php endif; ?>
					<?php $i++; ?>
					<?php echo J2Store::plugin()->eventWithHtml('AfterDisplayLineItemTitle', array($item, $this->order, $this->params)); ?>
				</td>
				<?php if ($this->params->get('show_qty_field', 1)) : ?>
					<td>
						<input class="input-mini" min="0" name="quantities[<?php echo $item->cartitem_id; ?>]" type="number" value="<?php echo $item->orderitem_quantity; ?>" />
						<a class="btn btn-small btn-danger btn-xs j2store-remove remove-icon" href="<?php echo JRoute::_('index.php?option=com_j2store&view=carts&task=remove&cartitem_id=' . $item->cartitem_id); ?>">
							<i class="fa fa-trash-o"></i>
						</a>
					</td>
				<?php else: ?>
					<input class="input-mini" name="quantities[<?php echo $item->cartitem_id; ?>]" type="hidden" size="3" value="<?php echo $item->orderitem_quantity; ?>" />
				<?php endif; ?>

				<?php if (isset($this->taxes) && count($this->taxes) && $this->params->get('show_item_tax', 0)): ?>
				<td><?php
					echo $this->currency->format($item->orderitem_tax);
					?>
					<?php endif; ?>

				<td class="cart-line-subtotal">
					<?php echo $this->currency->format($this->order->get_formatted_lineitem_total($item, $this->params->get('checkout_price_display_options', 1))); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>