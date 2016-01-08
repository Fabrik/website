<?php
/**
 * Fab Tweet - Twitter user time line module
 *
 * @package     Joomla.Site
 * @subpackage  Module.FabTweet
 * @since       2.5
 */

$document = JFactory::getDocument();
$document->addScriptDeclaration('jQuery(document).ready(function() {
  jQuery("time.timeago").timeago();
});');
?>
<ul class="collection">
<?php
foreach ($list as $item) :
	$user = $item->user;

?>
	<li class="collection-item avatar">
		<a class="image" href="http://twitter.com/<?php echo $user->screen_name?>">
			<img class="circle" src="<?php echo $user->profile_image_url; ?>" alt="<?php echo $user->name?>" />
		</a>
		<p class="tweet">
		<?php echo $item->text?>
		</p>
		<small>
			<?php echo JText::_('MOD_FABTWEET_BY')?> <a href="http://twitter.com/<?php echo $user->screen_name?>">
				<?php echo $user->name?>
				</a>
				<time class="timeago" datetime="<?php echo $item->created_at?>"><?php echo $item->created_at?></time>
		</small>
	</li>
<?php
endforeach;
?>
</ul>