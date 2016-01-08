<?php
/**
 * @version        $Id: default.php 21322 2011-05-11 01:10:29Z dextercowley $
 * @package        Joomla.Site
 * @subpackage     mod_login
 * @copyright      Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');

?>

<?php if ($type == 'logout') :

	?>

	<form class="login-<?php echo $type ?>" action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">

		<div class="logout-button">
			<button type="submit" name="Submit" class="button btn">
				<i class="icon-user"></i> <?php echo JText::_('JLOGOUT'); ?>
			</button>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="user.logout" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
		<?php if ($params->get('greeting')) : ?>
			<div class="welcome">
				<?php if ($params->get('name') == 0) :
				{
					echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('name'));
				}
				else :
				{
					echo JText::sprintf('MOD_LOGIN_HINAME', $user->get('username'));
				} endif; ?>
			</div>
		<?php endif; ?>

	</form>
<?php else : ?>
	<a class="modal-trigger" href="#modal1">Login</a>
<?php endif; ?>
