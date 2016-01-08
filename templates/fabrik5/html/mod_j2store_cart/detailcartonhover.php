<?php
/*------------------------------------------------------------------------
# mod_j2store_cart - J2 Store Cart
# ------------------------------------------------------------------------
# author    Sasi varna kumar - Weblogicx India http://www.weblogicxindia.com
# copyright Copyright (C) 2014 - 19 Weblogicxindia.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://j2store.org
# Technical Support:  Forum - http://j2store.org/forum/index.html
-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');
$app = JFactory::getApplication();
require_once(JPATH_ADMINISTRATOR . '/components/com_j2store/helpers/j2store.php');
J2Store::utilities()->nocache();
$ajax = $app->getUserState('mod_j2store_mini_cart.isAjax');
$hide = false;
if ($params->get('check_empty', 0) && $list['product_count'] < 1)
{
	$hide = true;
}

?>
<?php if (!$ajax): ?>
<li class="j2store_cart_module_<?php echo $module->id; ?>">
	<?php endif; ?>
	<?php if (!$hide): ?>

		<?php if ($list['product_count'] > 0): ?>
			<a data-activates="mini-cart" href="#!" class="dropdown-button">
				<span class="badge"><?php echo $list['product_count']; ?></span>
				Cart
			</a>
		<?php else: ?>
		<?php endif; ?>
		<ul class="dropdown-content" id="mini-cart" style="display:none;">

			<?php if ($list['product_count'] > 1): ?>
				<li>
					<span>
						<?php //echo JText::sprintf('J2STORE_CART_TOTAL', $list['product_count'], $currency->format($list['total']));
						echo sprintf('%s items - %s', $list['product_count'], $currency->format($list['total'])); ?>
					</span>
				</li>
			<?php else: ?>
				<?php
				if ($list['product_count'] == 0) :
					echo '<li>' . JText::_('J2STORE_NO_ITEMS_IN_CART') . '</li>';
				endif; ?>
			<?php endif; ?>

			<?php if ($list['product_count'] > 0): ?>
				<?php foreach ($advanced_list as $item):
					$registry     = new JRegistry;
					$registry->loadString($item->orderitem_params);
					$item->params = $registry;
					$thumb_image  = $item->params->get('thumb_image', '');
					$product      = J2Store::product()->setId($item->product_id)->getProduct();
					?>
					<li class="cartitems">
						<div class="item-info">

							<?php if ($params->get('show_thumbimage') && !empty($thumb_image)): ?>
								<span class="cart-thumb-image">
										<img alt="<?php echo $item->orderitem_name; ?>" src="<?php echo JUri::root(true) . '/' . $thumb_image; ?>" />
									</span>
							<?php endif; ?>

							<?php if ($params->get('show_cart_remove')): ?>
								<div class="item-product-details">
									<div class="access">
										<a class="cart-remove text-error" href="<?php echo JRoute::_('index.php?option=com_j2store&view=carts&task=remove&cartitem_id=' . $item->cartitem_id); ?>">
											<i class="fa fa-remove"></i></a>
									</div>
								</div>
							<?php endif; ?>

							<?php if ($params->get('show_product_qty')): ?>
								<span class="cart-item-qty"> <?php echo $item->orderitem_quantity; ?> </span> x
							<?php endif; ?>

							<p class="j2store-product-name">
								<strong><?php echo $item->orderitem_name; ?></strong> <?php echo $currency->format($item->orderitem_price); ?>
							</p>
						</div>
					</li>
				<?php endforeach; ?>

				<li class="j2store-cart-nav">
					<a class="btn btn-flat" href="<?php echo JRoute::_('index.php?option=com_j2store&view=carts'); ?>">
						<?php echo JText::_('J2STORE_VIEW_CART'); ?>
					</a>
				</li>
				<li>
					<a class="btn btn-primary" href="<?php echo $checkout_url; ?>">
						<?php echo JText::_('J2STORE_CHECKOUT'); ?>
					</a>

				</li>
			<?php endif; ?>

		</ul>

	<?php endif; ?>
	<?php if (!$ajax): ?>
</li>
<?php else: ?>
	<?php $app->setUserState('mod_j2store_mini_cart.isAjax', 0); ?>
<?php endif; ?>
