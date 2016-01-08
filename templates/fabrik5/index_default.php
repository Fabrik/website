<body>
<jdoc:include type="modules" name="banner-top" style="none" />
<header>
	<div class="container">
		<nav class="block-wrapper">
			<a class="brand-logo" href="<?php echo $this->baseurl ?>">
				<img id="logo" src="<?php echo JURI::base() . "templates/" . $this->template; ?>/images/logo.png" alt="Fabrik - THE Open Source Joomla Application Builder" />
				<div class="strapline">The Joomla! Application Builder</div>
			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<jdoc:include type="modules" name="position-2" />
				<li>
					<jdoc:include type="modules" name="top" style="none" />
				</li>
			</ul>
		</nav>
	</div>
</header>
<main>
	<div class="container">
		<section>

			<?php
			$q = $app->getMessageQueue();
			if (!empty($q)) : ?>
				<div class="alert">
					<jdoc:include type="message" />
				</div>
			<?php endif; ?>

			<?php if ($this->countModules('content-bottom')) : ?>
				<div class="row">
					<jdoc:include type="modules" name="content-top" style="material_card" />
				</div>
			<?php endif; ?>
			<div class="row">
				<div class="col-xs-12">
					<jdoc:include type="component" />
				</div>
			</div>
			<div class="row">
				<jdoc:include type="modules" name="left" col="s6" style="material_card" />
			</div>
			<?php if ($this->countModules('content-bottom')) : ?>
				<div class="row">
					<jdoc:include type="modules" name="content-bottom" style="material_card" />
				</div>
			<?php endif; ?>

		</section>
	</div>
</main>
<footer class="page-footer">

	<div class="container">
		<jdoc:include type="modules" name="footer" style="xhtml" />

		<div class="row">

			<div class="col-xs-3">
				<jdoc:include type="modules" name="footer1" style="bootstrap" />
				<hr />

				<h3 class="page-header">We recommend</h3>
				<a href="http://www.navicat.com/" target="_blank">
					<img src="templates/fabrik4/images/navicat.png" alt="Navicat" />
				</a>
			</div>
			<div class="col-xs-3">
				<jdoc:include type="modules" name="footer2" style="bootstrap" />
			</div>
			<div class="col-xs-3">
				<jdoc:include type="modules" name="footer3" style="bootstrap" />
			</div>
			<div class="col-xs-3">
				<jdoc:include type="modules" name="footer4" style="bootstrap"/>
			</div>
		</div>
		<jdoc:include type="modules" name="debug" style="material_card" />

	</div>
	<div class="footer-copyright">
		<div class="container">
			<small>
				Fabrik is not affiliated with or endorsed by the Joomla! Project or Open Source Matters.
				The Joomla! logo is used under a limited license granted by Open Source Matters the trademark
				holder in the United States and other countries.
			</small>

			<jdoc:include type="modules" name="bottom" style="xhtml" />
		</div>
	</div>
	</div>
</footer>

<div class="modal" id="modal1">
	<form action="<?php echo JRoute::_('index.php', true, false); ?>" method="post" class="form-horizontal" name="form-login" id="form-login">
		<div class="modal-content">
			<h4>Log in</h4>
			<div class="row">
				<div class="col-sm-6" style="padding-top:65px">
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>" class="modal-action waves-effect waves-red btn-flat">
						Forgot your password?
					</a><br>
					<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>" class="modal-action waves-effect waves-red  btn-flat ">
						Forgot your username?</a>
				</div>
				<div class="col-sm-6">
					<div class="input-field">
						<input id="modlgn-username" type="text" name="username" class="validate" />
						<label for="modlgn-username">Username</label>
					</div>
					<div class="input-field">
						<input id="modlgn-passwd" type="password" name="password" class="validate" />
						<label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
					</div>
					<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
						<input type="checkbox" name="remember" class="filled-in" id="modlgn-remember" checked="checked" value="yes" />
						<label for="modlgn-remember">Remember me</label>
					<?php endif; ?>
				</div>
			</div>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="user.login" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
		<div class="modal-footer">
			<button class="btn" type="submit" name="Submit" class="modal-action modal-close waves-effect waves-red btn-flat" value="Log in">
				Log in <i class="material-icons right">send</i>
			</button>
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
		</div>

	</form>
</div>

