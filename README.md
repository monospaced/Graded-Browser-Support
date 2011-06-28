<h1>Server-side detection of Yahoo GBS C-grade browsers</h1>

gbs.php is a script to be used in conjunction with GaretJax's [PHP Browscap](https://github.com/garetjax/phpbrowscap). 

It utilises the browser data that phpbrowscap parses from [browscap.ini](http://browsers.garykeith.com/downloads.asp), to detect browsers on the [YUI Graded Browser Support](http://developer.yahoo.com/yui/articles/gbs/) [C-grade blacklist](http://developer.yahoo.com/yui/articles/gbs/#cgradelist), and then stores this data in a cookie that can be queried to determine whether to withhold CSS and Javascript.
	
For more info see [monospaced.co.uk/labs/gbs](http://monospaced.co.uk/labs/gbs).