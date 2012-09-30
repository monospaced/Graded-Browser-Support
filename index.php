<?php

	require('gbs.php');

?><!DOCTYPE html>
<html lang="en-gb">
	<head>
		<meta charset="utf-8" />
    	<title>Server-side detection of Yahoo Graded Browser Support C-grade browsers</title>

		<?php
			if(!isset($gbs) || $gbs != 'C-grade') {
		?>

    	<link rel="stylesheet" href="gbs.css" />

		<?php
			}
		?>

	</head>
	<body>
  		<div id="container">
			<h1>Graded Browser Support</h1>

			<p><a href="https://github.com/monospaced/Graded-Browser-Support">github.com/monospaced/Graded-Browser-Support</a></p>

			<div class="line-length">

				<h2>Server-side detection of Yahoo <abbr title="Graded Browser Support">GBS</abbr> C-grade browsers</h2>

				<small>21/12/2010</small>

				<?php

					if(isset($gbs)) {
						echo '<p><strong>Your browser receives ', $gbs,' support.</strong></p>';
					}

				?>

				<p>In the main, <a href="http://developer.yahoo.com/yui/articles/gbs/">Graded Browser Support</a> is a <abbr title="Quality Assurance">QA</abbr> strategy that can be applied to any website, without the need for specific functionality to be present in the site itself. However, the one thing the site <em>does</em> need to do, is detect browsers on the <a href="http://developer.yahoo.com/yui/articles/gbs/#cgradelist">C-Grade blacklist</a> so that <abbr title="Cascading Style Sheets">CSS</abbr> and JavaScript can be withheld.</p>

 				<p>I′ve often wondered exactly how Yahoo implements this C-Grade detection. They do mention that it's done on the server-side, which makes sense, but there seemed to be no further information online…</p>

				<p>… until a few days ago, when I came across a <a href="http://tech.groups.yahoo.com/group/ydn-javascript/message/20753">post on ydn-javascript</a> by Nate Koechley, with this snippet right at the very end:</p>

				<blockquote><p>“A final note: for what it's worth, internally we use the <abbr>PHP</abbr> version of Browscap.ini to do detection and grading at the server level. <a href="http://browsers.garykeith.com/downloads.asp">http://browsers.garykeith.com/downloads.asp</a>”</p></blockquote>

				<p>Now I was on the right track, and with the help of Evan Byrne's <a href="http://www.evanbyrne.com/article/php-browscap">Browser Detection With <abbr>PHP</abbr> Browscap</a> tutorial (using Jonathan Stoppani's <a href="https://github.com/garetjax/phpbrowscap">phpbrowscap</a>) I had <abbr>PHP</abbr> browser detection up and running in no time.</p>

				<p>With the Browscap data available, it was now relatively simple to implement the C-Grade blacklist in <abbr>PHP</abbr>. The following code did the trick, entered in a new file called gbs.php (created within the same folder as Browscap.php):</p>

				<pre><code>&lt;?php
$gbs = 'A-grade or X-grade';
if (isset($_COOKIE['gbs'])) {
	$gbs = $_COOKIE['gbs'];
} else {
	require('Browscap.php');
	$bc = new Browscap('cache');
	$bc->localFile = 'php_browscap.ini';
	$data = $bc->getBrowser();
	$browser = $data->Browser;
	$version = $data->Version;
	if ($browser == 'IE' &amp;&amp; $version &lt; 6 ||
	    $browser == 'Safari' &amp;&amp; $version &lt; 3 ||
	    $browser == 'Firefox' &amp;&amp; $version &lt; 3 ||
	    $browser == 'Opera' &amp;&amp; $version &lt; 9.5 ||
	    $browser == 'Netscape' &amp;&amp; $version &lt; 8) {
		$gbs = 'C-grade';
	}
	setcookie('gbs',$gbs);
}
?>

</code></pre>

				<p>Pages can then includes this script, and uses the returned $gbs variable to determine whether to serve <abbr>CSS</Thabbr> and JavaScript. For example:</p>

				<pre><code>&lt;?php

require('gbs.php');

?>&lt;!DOCTYPE html>

&lt;html lang="en">
&lt;head>

...

&lt;?php if(!isset($gbs) || $gbs != 'C-grade') { ?>

&lt;link rel="stylesheet" href="gbs.css" />

&lt;?php } ?>

...

</code></pre>

 				<p>For a first iteration I'm pretty happy with this technique, but I'm sure it could be improved. The <a href="https://github.com/monospaced/Graded-Browser-Support">source is on github</a> so fork away!</p>

<p><a href="http://monospaced.github.com">Monospaced Labs</a></p>

			</div>

		</div>
	</body>
</html>
