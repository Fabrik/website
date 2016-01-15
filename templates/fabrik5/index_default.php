<body>
<jdoc:include type="modules" name="banner-top" style="none" />

</nav>
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
			<a href="#" class="button-collapse" data-activates="side-menu"><i class="mdi-navigation-menu"></i></a>
			<ul id="side-menu" class="side-nav">
				<li class="item-27"><a href="/~fabrikar/features">Features</a></li>
				<li class="item-48"><a href="/~fabrikar/download">Download</a></li>
				<li class="item-31"><a href="/forums/">Forum</a></li>
				<li class="item-160"><a href="/~fabrikar/support">Support</a></li>
				<li class="item-35"><a href="/~fabrikar/blog">Blog</a></li>
				<li class="item-22 dropdown parent">
					<a href="#!" data-activates="parent22a" class="dropdown-button">
						Help<i class="material-icons right">arrow_drop_down</i></a>
					<ul class="dropdown-content active" id="parent22a">
						<li class="item-32"><a href="http://fabrikar.com/forums/index.php?wiki/index/">Docs</a></li>
						<li class="item-37"><a href="/~fabrikar/help/tutorials">Tutorials</a></li>
						<li class="item-23"><a href="/~fabrikar/help/faq">FAQ</a></li>
						<li class="item-33"><a href="/~fabrikar/help/terms-and-conditions">Terms &amp; conditions</a>
						</li>
					</ul>
					<ul class="dropdown-content" id="parent22">
						<li class="item-32"><a href="http://fabrikar.com/forums/index.php?wiki/index/">Docs</a></li>
						<li class="item-37"><a href="/~fabrikar/help/tutorials">Tutorials</a></li>
						<li class="item-23"><a href="/~fabrikar/help/faq">FAQ</a></li>
						<li class="item-33"><a href="/~fabrikar/help/terms-and-conditions">Terms &amp; conditions</a>
						</li>
					</ul>
				</li>

				<li class="j2store_cart_module_124">
				</li>

				<li>
					<a class="modal-trigger" href="#modal1">Login</a>
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

			<?php if ($this->countModules('content-top')) : ?>
				<div class="row">
					<jdoc:include type="modules" name="content-top" style="material_card" extractimage="0" />
				</div>
			<?php endif; ?>

					<jdoc:include type="component" />

			<?php if ($this->countModules('left')) : ?>
				<div class="row">
					<jdoc:include type="modules" name="left" col="s6" style="material_card" />
				</div>
			<?php endif; ?>

			<?php if ($this->countModules('content-bottom')) : ?>
				<div class="row" id="content-bottom">
					<jdoc:include type="modules" name="content-bottom" style="material_card" />
				</div>
			<?php endif; ?>
			<?php if ($this->countModules('content-bottom-2')) : ?>
				<div class="row" id="content-bottom-2">
					<jdoc:include type="modules" name="content-bottom-2" style="material_card" />
				</div>
			<?php endif; ?>
		</section>
	</div>
</main>
<footer class="page-footer">

	<div class="container">
		<jdoc:include type="modules" name="footer" style="xhtml" />

		<div class="row">

			<div class="col-xs-3 hide-on-small-only">
				<jdoc:include type="modules" name="footer1" style="bootstrap" />
				<hr />

				<h3 class="page-header">We recommend</h3>
				<a href="http://www.navicat.com/" target="_blank">
					<img src="templates/fabrik4/images/navicat.png" alt="Navicat" />
				</a>
			</div>
			<div class="col-sm-2 col-xs-6">
				<jdoc:include type="modules" name="footer2" style="bootstrap" />
			</div>
			<div class="col-sm-2 col-xs-6">
				<jdoc:include type="modules" name="footer3" style="bootstrap" />
			</div>
			<div class="col-xs-5 hide-on-small-only">
				<jdoc:include type="modules" name="footer4" style="bootstrap" />
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

