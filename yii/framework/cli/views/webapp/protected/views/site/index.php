<?php
$this->pageTitle = Yii::app()->params['appTitle'];
$this->addMetaProperty('og:title', Yii::app()->params['appTitle']);
$this->addMetaProperty('og:type', 'website');
$this->addMetaProperty('og:url', $this->createUrl('index'));
$this->addMetaProperty('og:image', Yii::app()->request->getBaseUrl(true).'/images/bootstrap-avatar_normal.png');
$this->addMetaProperty('og:site_name', Yii::app()->name);
$this->addMetaProperty('og:locale',Yii::app()->fb->locale);
$this->addMetaProperty('fb:app_id', Yii::app()->fb->appID);

Yii::app()->clientScript->registerScript('siteIndex', "
	// Console \"polyfill\"
	if (!console) {
		console = {};
		console.log = function() {};
	}

	// Prevent jumping to the top of the page when demo links are clicked.
	jQuery('.site-index a').on('click', function(e) {
	    var element = $(this),
	        href = element.attr('href'),
	        toggle = element.attr('data-toggle');

	    if ((href && (href.length === 0 || href === '#')) && !toggle) {
	            return false;
	    }
	});

    // Prevent form submission.
	jQuery('.site-index form').on('submit', false);
");
?>

<div class="jumbotron masthead">
  <div class="container">
    <h1>Bootstrap</h1>
    <p>Sleek, intuitive, and powerful front-end framework for faster and easier web development.</p>
    <p><a href="assets/bootstrap.zip" class="btn btn-primary btn-large" >Download Bootstrap</a></p>
    <ul class="masthead-links">
      <li><a href="http://github.com/twitter/bootstrap" >GitHub project</a></li>
      <li><a href="./extend.html" >Extend</a></li>
      <li>Version 2.1.1</li>
    </ul>
  </div>
</div>

  <div class="marketing">

    <h1>Introducing Bootstrap.</h1>
    <p class="marketing-byline">Need reasons to love Bootstrap? Look no further.</p>

    <div class="row-fluid">
      <div class="span4">
        <img src="assets/img/bs-docs-twitter-github.png">
        <h2>By nerds, for nerds.</h2>
        <p>Built at Twitter by <a href="http://twitter.com/mdo">@mdo</a> and <a href="http://twitter.com/fat">@fat</a>, Bootstrap utilizes <a href="http://lesscss.org">LESS CSS</a>, is compiled via <a href="http://nodejs.org">Node</a>, and is managed through <a href="http://github.com">GitHub</a> to help nerds do awesome stuff on the web.</p>
      </div>
      <div class="span4">
        <img src="assets/img/bs-docs-responsive-illustrations.png">
        <h2>Made for everyone.</h2>
        <p>Bootstrap was made to not only look and behave great in the latest desktop browsers (as well as IE7!), but in tablet and smartphone browsers via <a href="./scaffolding.html#responsive">responsive CSS</a> as well.</p>
      </div>
      <div class="span4">
        <img src="assets/img/bs-docs-bootstrap-features.png">
        <h2>Packed with features.</h2>
        <p>A 12-column responsive <a href="./scaffolding.html#grid">grid</a>, dozens of components, <a href="./javascript.html">javascript plugins</a>, typography, form controls, and even a <a href="./customize.html">web-based Customizer</a> to make Bootstrap your own.</p>
      </div>
    </div>
</div>
