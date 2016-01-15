<?php
/**
 * @copyright    Copyright (C) 2008 Ian MacLennan. All rights reserved.
 * @copyright    Upgrade to J2.5.  Copyright 2012 HartlessByDesign, LLC.
 * @copyright    Portions Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license      GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */


// no direct access
defined('_JEXEC') or die('Restricted access');
$moduleclass_sfx = '';//htmlspecialchars($params->get('moduleclass_sfx'));
$images          = json_decode($item->images);
?>

<div class='article_anywhere<?php echo $moduleclass_sfx; ?>'>

<?php if ($params->get('show_title')): ?>
<h2 class='article_anywhere_title'>
    <?php if ($params->get('link_titles') && !empty($item->readmore_link)) : ?>
    <a href="<?php echo $item->readmore_link; ?>"><?php echo htmlspecialchars($item->title); ?></a>
    <?php else : ?>
    <?php echo htmlspecialchars($item->title); ?>
    <?php endif; ?>
</h2>
<?php echo $item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $item->event->beforeDisplayContent; ?>
<?php
$user = JFactory::getUser();
if ($user->authorise('core.edit', 'com_content.article.' . $item->id)):
?>
<ul class="actions">
    <li class="edit-icon">
        <?php echo JHtml::_('icon.edit', $item, $params); ?>
    </li>
</ul>
    <?php endif; ?>

<?php $useDefList = (($params->get('show_author')) or ($params->get('show_category')) or ($params->get('show_parent_category'))
or ($params->get('show_create_date')) or ($params->get('show_modify_date')) or ($params->get('show_publish_date'))
or ($params->get('show_hits'))); ?>

<?php if ($useDefList) : ?>
<dl class="article-info">
	<dt class="article-info-term"><?php  echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>
    <?php endif; ?>

    <?php if ($params->get('show_parent_category') && $item->parent_slug != '1:root') : ?>
    <dd class="parent-category-name">
        <?php    $title = htmlspecialchars($item->parent_title); ?>
        <?php echo JText::sprintf('COM_CONTENT_PARENT', $title); ?>
    </dd>
    <?php endif; ?>

    <?php if ($params->get('show_category')) : ?>
    <dd class="category-name">
        <?php $title = htmlspecialchars($item->category_title); ?>
        <?php echo JText::sprintf('COM_CONTENT_CATEGORY', $title); ?>
    </dd>
    <?php endif; ?>

    <?php if ($params->get('show_create_date')) : ?>
    <dd class="create">
        <?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC2'))); ?>
    </dd>
    <?php endif; ?>

    <?php if ($params->get('show_modify_date')) : ?>
    <dd class="modified">
        <?php echo JText::sprintf('COM_CONTENT_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
    </dd>
    <?php endif; ?>

    <?php if ($params->get('show_publish_date')) : ?>
    <dd class="published">
        <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC2'))); ?>
    </dd>
    <?php endif; ?>

    <?php if ($params->get('show_author') && !empty($item->author)) : ?>
    <dd class="createdby">
        <?php $author = $item->created_by_alias ? $item->created_by_alias : $item->author; ?>
        <?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
    </dd>
    <?php endif; ?>

    <?php if ($params->get('show_hits')) : ?>
    <dd class="hits">
        <?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $item->hits); ?>
    </dd>
    <?php endif; ?>
<?php if ($useDefList) : ?>
</dl>
<?php endif; ?>
    <?php  if ($params->get('image') && isset($images->image_fulltext) and !empty($images->image_fulltext)) : ?>
        <?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
        <div class="img-fulltext-<?php echo htmlspecialchars($imgfloat); ?>">
            <img
                <?php if ($images->image_fulltext_caption):
                    echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) .'"';
                endif; ?>
                src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>"/>
        </div>
    <?php endif; ?>
    <?php echo $item->text; ?>

    <?php if ($params->get('show_readmore') && $item->readmore) :
    $link = empty($item->access_view) ? JRoute::_('index.php?option=com_users&view=login') : $item->readmore_link;?>
    <p class="readmore">
        <a href="<?php echo $link; ?>" class="btn">
            <i class="icon-chevron-right"></i>
            <?php $attribs = json_decode($item->attribs); ?>
            <?php
            if (empty($item->access_view)) :
                echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
            elseif ($readmore = $item->alternative_readmore) :
                echo $readmore;
                if ($params->get('show_readmore_title', 0) != 0) :
                    echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
                endif;
            elseif ($params->get('show_readmore_title', 0) == 0) :
                echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
            else :
                echo JText::_('COM_CONTENT_READ_MORE');
                echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
            endif; ?>
        </a>
    </p>
    <?php endif; ?>
    <?php echo $item->event->afterDisplayContent; ?>
</div>