<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$d             = $displayData['params'];
$blockPosition = $d->get('info_block_position', 0);
$showAuthor    = $d->get('show_author') && !empty($displayData['item']->author);
$showParent    = $d->get('show_parent_category') && !empty($displayData['item']->parent_slug);
$showAvatar    = $showAuthor || $showParent || $d->get('show_category') || $d->get('show_publish_date') || $d->get('show_create_date')
	|| $d->get('show_modify_date') || $d->get('show_hits');

$text = '';
?>

<?php if ($showAuthor) : ?>
	<?php $text = JLayoutHelper::render('joomla.content.info_block.author', $displayData); ?>
<?php endif; ?>
<?php if ($showParent) : ?>
	<?php $text .= JLayoutHelper::render('joomla.content.info_block.parent_category', $displayData); ?>
<?php endif; ?>

<?php if ($d->get('show_category')) : ?>
	<?php $text .= JLayoutHelper::render('joomla.content.info_block.category', $displayData); ?>
<?php endif; ?>

<?php if ($d->get('show_publish_date')) : ?>
	<?php $text .= JLayoutHelper::render('joomla.content.info_block.publish_date', $displayData); ?>
<?php endif; ?>

<?php if ($displayData['position'] == 'above' && ($blockPosition == 0)
	|| $displayData['position'] == 'below' && ($blockPosition == 1 || $blockPosition == 2)
) : ?>
	<?php if ($d->get('show_create_date')) : ?>
		<?php $text .= JLayoutHelper::render('joomla.content.info_block.create_date', $displayData); ?>
	<?php endif; ?>

	<?php if ($d->get('show_modify_date')) : ?>
		<?php $text .= JLayoutHelper::render('joomla.content.info_block.modify_date', $displayData); ?>
	<?php endif; ?>

	<?php if ($d->get('show_hits')) : ?>
		<?php $text .= JLayoutHelper::render('joomla.content.info_block.hits', $displayData); ?>
	<?php endif; ?>
<?php endif; ?>

<?php if ($text !== '') : ?>
	<ul class="article-info collection">
		<?php if ($displayData['position'] == 'above' && ($blockPosition == 0 || $blockPosition == 2)
			|| $displayData['position'] == 'below' && ($blockPosition == 1)
		) : ?>

			<li class="collection-item avatar">

			</li>

		<?php endif; ?>

	</ul>
<?php endif; ?>