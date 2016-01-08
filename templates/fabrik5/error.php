<!DOCTYPE html>
<html lang="en">
  <head>
  	<link href="/templates/fabrik4/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="http://subs.fabrikar.com/plugins/content/rokcomments/css/rokcomments.css" type="text/css" />
  <link rel="stylesheet" href="/templates/fabrik4/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="/templates/fabrik4/css/bootstrap-responsive.css" type="text/css" />
  <link rel="stylesheet" href="/templates/fabrik4/css/template.css" type="text/css" />
  <link rel="stylesheet" href="/modules/mod_fab_tweet/fab_tweet.css" type="text/css" />
    <?php $document = JFactory::getDocument();
    $document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap' . JRequest::getVar('bootstrap', '') . '.css');
    $document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap-responsive.css');
    $document->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.css');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <?php
  $contentSpan =  12;
  ?>
  <body>

     <div class="container">
	    <header>
	    	<div class="block-wrapper">
	    	<div class="row-fluid">
		    	<div class="span5 logo">
			    	<a href="index.php">
						<img id="logo" src="<?php echo JURI::base() . "templates/" . $this->template; ?>/images/logo.png" alt="Fabrik - THE Open Source Joomla Application Builder" />
						<div class="strapline">The Joomla! Application Builder</div>
					</a>
				</div>
		    	<div class="span7 modules">
					<jdoc:include type="modules" name="position-2" />
					<jdoc:include type="modules" name="top" style="xhtml" />
				</div>
			</div>
			</div>
		</header>

	     <section>
	     	<div class="block-wrapper">

				    <div class="hero-unit">
				    <h1>Cough, cough... well this is embarrassing!</h1>
				    <p><?php echo $this->error->getCode(); ?>: <?php echo $this->error->getMessage(); ?></p>


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
	     </section>

	     <footer>
	     	<div class="block-wrapper">
		     	<jdoc:include type="modules" name="footer" style="xhtml"/>
		     	<div class="row-fluid">
		     		<div class="span3">
		     			<jdoc:include type="modules" name="footer1" style="bootstrap" />
		     		</div>
		     		<div class="span3">
		     			<jdoc:include type="modules" name="footer2" style="bootstrap" />
		     		</div>
					<div class="span3">
		     			<jdoc:include type="modules" name="footer3" style="bootstrap" />
		     		</div>
		     		<div class="span3">
		     			<jdoc:include type="modules" name="footer4" style="bootstrap" />
		     		</div>
				</div>
				<jdoc:include type="modules" name="debug" style="xhtml"/>

				<a id="github" href="https://github.com/Fabrik/fabrik">
			  		<span>Fork me on GitHub!</span>
				</a>
			</div>
		</footer>
	     <p class="jdisclaimer">
		Fabrik is not affiliated with or endorsed by the Joomla! Project or Open Source Matters.
		The Joomla! logo is used under a limited license granted by Open Source Matters the trademark
		holder in the United States and other countries.
		</p>
	     <jdoc:include type="modules" name="bottom"  style="xhtml" />

    </div> <!-- /container -->




	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
	_uacct = "UA-303756-2";
	urchinTracker();
	</script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-transition.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-alert.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-modal.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-tab.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-popover.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-button.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap-typeahead.js"></script>

  </body>
</html>
