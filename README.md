<h1>Server-side detection of Yahoo GBS C-grade browsers</h1>

gbs.php is a script to be used in conjunction with GaretJax's <a href="https://github.com/garetjax/phpbrowscap">https://github.com/garetjax/phpbrowscap</a>. 

It utilises the browser data that phpbrowscap parses from <a href="http://browsers.garykeith.com/downloads.asp">browscap.ini</a>, to detect browsers on the <a href="http://developer.yahoo.com/yui/articles/gbs/">YUI Graded Browser Support</a> <a href="http://developer.yahoo.com/yui/articles/gbs/#cgradelist">C-grade blacklist</a>, and then stores this data in a cookie that can be queried to determine whether to withhold CSS and Javascript.
	
For more info see <a href="http://monospaced.co.uk/labs/gbs/">http://monospaced.co.uk/labs/gbs/</a>.