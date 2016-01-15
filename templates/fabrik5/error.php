<!DOCTYPE html>
<html lang="en">
<head>
	<jdoc:include type="head" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?php $document = JFactory::getDocument();
	$user           = JFactory::getUser();
	$name           = $user->get('name');
	$email          = $user->get('email');
	JHtml::_('jquery.framework');
	$document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/materialize.css');
	$document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.min.css');
	$document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/materialdesignicons.min.css');
	$document->addScript($this->baseurl . '/templates/' . $this->template . '/js/materialize.min.js');

	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/templates/fabrik5/css/materialize.css" type="text/css" />
	<link rel="stylesheet" href="/templates/fabrik5/css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="/templates/fabrik5/css/materialdesignicons.min.css" type="text/css" />

	<!-- Le fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-57-precomposed.png">
</head>

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

<section>
	<div class="container">
		<div class="card-panel">

			<div class="card-content">
				<h1><?php echo $this->error->getCode(); ?> Cough, cough... well this is embarrassing!</h1>
				<p><?php echo $this->error->getMessage(); ?></p>

				<p>Perhaps you were after....</p>
				<ul>
					<li><a href="/">Our Home Page</a>
					<li><a href="/forums">Forums</a>
					<li><a href="/contact-us">Contact us</a>
				</ul>
			</div>
			<p>
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</p>
		</div>

		<div class="row center-align">

			<div class="col-sm-6 cart-empty-purchase-support">
				<div class="card-panel">
					<h2>
						Looking for Pro Joomla! support?
					</h2>
					<img src="<?php echo $this->baseurl;?>/images/support.png">
					<a class="btn" href="<?php echo JRoute::_('index.php?Itemid=160'); ?>">
						Purchase hourly support from a Joomla! pro
					</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card-panel">
					<h2>Need a funky Fabrik plugin?</h2>
					<img src="<?php echo $this->baseurl;?>/images/plugin.png" alt="Download Fabrik plugins">
					<a class="btn" href="<?php echo JRoute::_('index.php?Itemid=48'); ?>">
						Browse over 100 plugins
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<jdoc:include type="modules" name="bottom" style="xhtml" />

<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-303756-2', 'auto');
	ga('send', 'pageview');
</script>

</body>
</html>
