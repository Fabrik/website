<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="card-panel large">
	<div class="card-content">
		<ul class="collection">
			<?php
			foreach ($this->link_items as &$item) :
				?>
				<li class="collection-item">
					<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>">
						<?php echo $item->title; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>