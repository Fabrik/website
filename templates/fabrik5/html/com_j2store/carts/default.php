<?php
/**
 * @package   J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license   GNU GPL v3 or later
 */
// No direct access to this file
defined('_JEXEC') or die;

?>
<?php echo J2Store::modules()->loadposition('j2store-cart-top'); ?>
	<div class="j2store j2store-cart">
		<?php if (count($this->items)): ?>
			<div class="col-xs-12"><?php echo $this->before_display_cart; ?></div>
			<div class="row">
				<div class="col-xs-12">
					<form action="<?php echo JRoute::_('index.php'); ?>"
						name="j2store-cart-form"
						id="j2store-cart-form"
						enctype="multipart/form-data"
					>

						<input type="hidden" name="option" value="com_j2store" />
						<input type="hidden" name="view" value="carts" />
						<input type="hidden" id="j2store-cart-task" name="task" value="update" />

						<?php echo $this->loadTemplate('items'); ?>

						<div class="j2store-cart-buttons">
							<div class="buttons-left">
				<span class="cart-continue-shopping-button">
					<?php if ($this->continue_shopping_url->type != 'previous'): ?>
						<input class="btn btn-primary" type="button" onclick="window.location='<?php echo $this->continue_shopping_url->url; ?>';" value="<?php echo JText::_('J2STORE_CART_CONTINUE_SHOPPING'); ?>" />
					<?php else: ?>
						<input class="btn btn-primary" type="button" onclick="window.history.back();" value="<?php echo JText::_('J2STORE_CART_CONTINUE_SHOPPING'); ?>" />
					<?php endif; ?>

				</span>
				<span class="cart-update-button">
					<input class="btn btn-warning" type="submit" value="<?php echo JText::_('J2STORE_CART_UPDATE'); ?>" />
				</span>
							</div>
						</div>
					</form>
					<!-- Display plugin results -->
					<?php echo $this->after_display_cart; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">

					<div class="cart-estimator-discount-block">
						<?php echo $this->loadTemplate('coupon'); ?>
						<?php echo $this->loadTemplate('voucher'); ?>
						<?php echo $this->loadTemplate('calculator'); ?>
						<?php echo $this->loadTemplate('shipping'); ?>
					</div>

				</div>
				<div class="col-sm-6">
					<div class="card-panel">
						<div class="card-content">
							<?php echo $this->loadTemplate('totals'); ?>
						</div>
					</div>
				</div>
			</div>

		<?php else: ?>

			<span class="card-content cart-no-items">
				<h1>
					<?php echo JText::_('J2STORE_CART_NO_ITEMS'); ?>
				</h1>
				<div class="row center-align">

					<div class="col-sm-6 cart-empty-purchase-support">
						<div class="card-panel">
							<h2>
								Looking for Pro Joomla! support?
							</h2>
							<img src="images/support.png">
							<a class="btn" href="<?php echo JRoute::_('index.php?Itemid=160'); ?>">
								Purchase hourly support from a Joomla! pro
							</a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="card-panel">
							<h2>Need a funky Fabrik plugin?</h2>
							<img src="images/plugin.jpg" alt="Download Fabrik plugins">
							<a class="btn" href="<?php echo JRoute::_('index.php?Itemid=48'); ?>">
								Browse over 100 plugins
							</a>
						</div>
					</div>
				</div>

			</span>

		<?php endif; ?>
	</div>
<?php echo J2Store::modules()->loadposition('j2store-cart-bottom'); ?>