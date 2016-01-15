<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Google Analytics Content Experiment code -->
	<script>function utmx_section() {
		}
		function utmx() {
		}
		(function () {
			var
				k = '1670426-1', d = document, l = d.location, c = d.cookie;
			if (l.search.indexOf('utm_expid=' + k) > 0)return;
			function f(n) {
				if (c) {
					var i = c.indexOf(n + '=');
					if (i > -1) {
						var j = c.indexOf(';', i);
						return escape(c.substring(i + n.length + 1, j < 0 ? c.length : j))
					}
				}
			}

			var x = f('__utmx'), xx = f('__utmxx'), h = l.hash;
			d.write(
				'<sc' + 'ript src="' + 'http' + (l.protocol == 'https:' ? 's://ssl' :
					'://www') + '.google-analytics.com/ga_exp.js?' + 'utmxkey=' + k +
				'&utmx=' + (x ? x : '') + '&utmxx=' + (xx ? xx : '') + '&utmxtime=' + new Date().valueOf() + (h ? '&utmxhash=' + escape(h.substr(1)) : '') +
				'" type="text/javascript" charset="utf-8"><\/sc' + 'ript>')
		})();
	</script>
	<script>utmx('url', 'A/B');</script>
	<!-- End of Google Analytics Content Experiment code -->

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
	$document->addScript($this->baseurl . '/templates/' . $this->template . '/js/materialize-fabrik.js');

	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Le fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-57-precomposed.png">
</head>
<?php
$app = JFactory::getApplication();
$input = $app->input;
$ab = $input->get('ab');

?>
<body>
<?php

// See if we have an Google Analytics AB Split testing file that we should load
$abFile = JPATH_THEMES . '/' . $this->template . '/index_' . $ab . '.php';

if (JFile::exists($abFile))
{
	require $abFile;
}
else
{
	require JPATH_THEMES . '/' . $this->template . '/index_default.php';
}
?>

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
<script src="<?php echo JUri::root(); ?>/templates/<?php echo $this->template;?>/js/template.js" type="text/javascript"></script>
</body>
</html>
