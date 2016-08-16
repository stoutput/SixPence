<?php
	$this->layout = false;
?>

<!DOCTYPE html>
<html>
	<head>
		<?= $this->Html->charset() ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
		<title>
		  <?= 'SixPence | Spare Change Making Change' ?>:
		  <?= $this->fetch('title') ?>
		</title>
		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
		<?= $this->Html->meta(
		'logo-favicon.png',
		'img/logo-favicon.png',
		['type' => 'icon']
		); ?>
		<?= $this->Html->css('normalize') ?>
		<?= $this->Html->css('bootstrap.min') ?>
		<?= $this->Html->css('template') ?>
		<?= $this->Html->css('sixpence') ?>
		<?= $this->Html->css('alpha') ?>
		<?= $this->Html->script('modernizr') ?>
		<?= $this->Html->script('webfont') ?>
		<script>
		WebFont.load({
		  google: {
			families: ["Raleway:100,200,300,regular,500,600,700,800,900"]
		  }
		});
		</script>
	</head>
	<body class="body">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  <div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">
					<img src="/img/icon-white-small.png" alt="SixPence" class="brand-image"/>
				</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-button"><?= $this->Html->link(__('Home'), '/'); ?></li>
					<li class="nav-button"><?= $this->Html->link(__('Browse'), ['controller' => 'campaigns']); ?></li>
					<?php if($loggedIn) : ?>
							<li class="nav-button"><?= $this->Html->link(__('Account'), ['controller' => 'users', 'action' => 'myAccount']); ?></li>
							<li class="nav-button last"><?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']); ?></li>
					<?php else :?>
							<li class="nav-button"><?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login']); ?></li>
							<li class="nav-button last"><?= $this->Html->link(__('Sign Up'), ['controller' => 'users', 'action' => 'register']); ?></li>
					<?php endif; ?>
				</ul>
			</div>
		  </div>
		</nav>
		<div class="background"></div>
		<div id="intro" class="w-section section hero">
		<div class="w-container"><img width="750" src="img/clear-white.png" class="hero-image">
		  <h1 class="title-subtext">SPARE CHANGE MAKING CHANGE</h1>
		  <div class="w-row">
			<div class="w-col w-col-6"><a href="#who-we-are" class="w-button button">WHO WE ARE</a>
			</div>
			<div class="w-col w-col-6"><a href="#get-involved" class="button get-involved-button">GET INVOLVED</a>
			</div>
		  </div>
		</div>
		</div>
		<div id="who-we-are" class="w-section section a-type">
		<div class="w-container">
		  <h2 class="section-heading">SIMPLY SERVING, SERVING SIMPLY</h2><img width="54" src="img/website_rule.png" class="rule">
		  <p class="whoweare-text">6pence is a crowdfunding platform built from the ground up to simplify the fundraising process.
			<br>We believe that fundraising should be as simple as handing a friend your spare change.</p><a href="#giving" class="button">GIVING</a>
		</div>
		</div>
		<div id="giving" data-ix="fade-in" class="w-section section">
		<div class="w-container">
		  <h4 class="section-heading giving-heading">GIVING CHEERFULLY</h4><img width="54" src="img/website_rule.png" class="rule">
		  <p class="giving-text">6pence makes it easy to give towards the causes you care about most.</p>
		  <div class="w-row">
			<div class="w-col w-col-4 column-1 columns">
			  <div class="bubble"><img width="136" src="img/roundup.png" class="bubble-image roundup">
			  </div>
			  <h3>ROUND-UPS</h3>
			  <p class="bubble-text">Donate spare change from your daily purchases towards a campaign of your choice.</p>
			</div>
			<div class="w-col w-col-4 column-2 columns">
			  <div class="bubble"><img width="136" src="img/clock (1).png" class="bubble-image reocurring">
			  </div>
			  <h3>REOCCURING</h3>
			  <p class="bubble-text">Donate towards a campaign weekly, monthly or yearly. Just set a time and amount, 6pence will handle the rest!</p>
			</div>
			<div class="w-col w-col-4 column-3 columns">
			  <div class="bubble"><img width="136" src="img/lumpsum.png" class="bubble-image">
			  </div>
			  <h3>LUMP SUM</h3>
			  <p class="bubble-text">Make a one-time donation towards a campaign of your choosing.</p>
			</div>
		  </div>
		</div><a href="#receiving" class="button">RECEIVING</a>
		</div>
		<div id="receiving" class="w-section section a-type">
		<div class="w-container">
		  <h2 class="section-heading">CAMPAIGNING YOUR CAUSE</h2><img width="54" src="img/website_rule.png" class="rule">
		  <p class="whoweare-text">Whatever your cause may be, 6pence helps you help others.</p>
		</div>
		<div class="w-container project-container">
		  <div class="w-row project-container">
			<div class="w-col w-col-4">
			  <div data-ix="bob" class="causecontainer"><img src="img/missions2.jpg" class="project-image">
				<div class="project-overlay">
				  <h6 class="image-heading">Missions</h6>
				  <p class="project-description">Going on a trip? just ask your friends to subscribe to your trip. It's that simple.</p>
				</div>
			  </div>
			</div>
			<div class="w-col w-col-4">
			  <div data-ix="bob" class="causecontainer"><img src="img/ngo.jpg" class="project-image">
				<div class="project-overlay">
				  <h6 class="image-heading">NGOs</h6>
				  <p class="project-description">Create a campaign to start raising funding towards a nonprofit cause.</p>
				</div>
			  </div>
			</div>
			<div class="w-col w-col-4">
			  <div data-ix="bob" class="causecontainer"><img src="img/church.jpg" class="project-image">
				<div class="project-overlay">
				  <h6 class="image-heading">Churches</h6>
				  <p class="project-description">Have your members subscribe to your campaign to start raising funds or collecting tithes.</p>
				</div>
			  </div>
			</div>
		  </div>
		</div><a href="#get-involved" class="button">GET INVOLVED</a>
		</div>
		<div id="get-involved" class="w-section section hero">
		<div class="w-container">
		  <h4 class="section-heading get-involved-heading">GET INVOLVED</h4><img width="54" src="img/website_rule.png" class="rule">
		  <div class="w-form form">
			<form id="ss-form" name="wf-form-ss-form" data-name="ss-form" method="post" action="https://docs.google.com/forms/d/1jYQHNiCaWq1G0aOnjsujtIa2QcfGUkH-Hb3wAm5L4FY/formResponse" class="form-container">
			  <div class="w-checkbox w-clearfix">
				<input id="preReleaseCheckbox" type="checkbox" checked="checked" name="preReleaseCheckbox" data-name="preReleaseCheckbox" class="w-checkbox-input checkbox">
				<label for="preReleaseCheckbox" class="w-form-label checkbox-label">Apply for pre-release testing</label>
			  </div>
			  <div class="w-checkbox w-clearfix">
				<input id="newsCheckbox" type="checkbox" checked="checked" name="newsCheckbox" data-name="newsCheckbox" class="w-checkbox-input checkbox">
				<label for="newsCheckbox" class="w-form-label checkbox-label">Subscribe to our newsletter!</label>
			  </div>
			  <div class="w-row">
				<div class="w-col w-col-6 w-col-small-6">
				  <input id="entry_227968158" type="text" name="entry.227968158" data-name="entry.227968158" class="w-input form-field hidden">
				  <label for="entry_218536637" class="form-label">Name:</label>
				  <input id="entry_218536637" type="text" name="entry.218536637" data-name="entry.218536637" required="required" class="w-input form-field">
				</div>
				<div class="w-col w-col-6 w-col-small-6">
				  <input id="entry_327161462" type="text" name="entry.327161462" data-name="entry.327161462" class="w-input form-field hidden">
				  <label for="entry_1445566598" class="form-label">Email Address:</label>
				  <input id="entry_1445566598" type="email" name="entry.1445566598" data-name="entry.1445566598" required="required" class="w-input form-field">
				</div>
			  </div>
			  <input id="submitButton" type="submit" value="SUBMIT" data-wait="PLEASE WAIT..." wait="PLEASE WAIT..." class="w-button button contact">
			</form>
			<div class="w-form-done success-container">
			  <p class="success-text">Your submission has been received. Thank you!</p>
			</div>
			<div class="w-form-fail error-container">
			  <p class="error-text">Something went wrong while submitting the form. Please try again</p>
			</div>
		  </div>
		</div>
		</div>
		<div class="w-section section footer">
		<div class="w-container">
		  <h4 class="section-heading footer-heading">THANKS FOR VISITING.</h4>
		  <p class="footer-text">OUR APP AND WEBSITE ARE ON THEIR WAY... CHECK BACK SOON!</p>
		  <a href="#intro" class="w-inline-block footer-button">
			<div class="w-icon-slider-right arrow up"></div>
		  </a>
		</div>
		</div>
		<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/template.js"></script>
		<!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
		<script>
		// ----Form Handling----
			var iframeError;

			//Form success, shows success message/hides form
		  function success() {
			$('#ss-form').css('display', 'none');
			$('.w-form-done').css('display', 'block');
			$('.w-form-fail').css('display', 'none');
		  }

			//Form error, shows error message and resets form
		  function error() {
			$('#submitButton').prop('value', 'Submit');
			$('#submitButton').prop('disabled', false);
			$('.w-form-fail').css('display', 'block');
			$('.w-form-done').css('display', 'none');
		  }

			// Interrupt form submission to append checkbox data
		  $('#submitButton').click(function(e){
			e.preventDefault();
			if($('#preReleaseCheckbox').prop('checked')){
				$('#entry_227968158').val('Yes');
			} else {
				$('#entry_227968158').val('No');
			}
			if($('#newsCheckbox').prop('checked')){
				$('#entry_327161462').val('Yes');
			} else {
				$('#entry_327161462').val('No');
			}
			//Submit form
			$('#ss-form').submit();
		  });

		  // On DOM ready
		  $(function () {
			//Append form submission iframe
			$(document.body).append('<IFRAME id="googleSubmit" name="googleSubmit">');
			$('#ss-form').prop('target', 'googleSubmit');
			//Handle form submission
			$('#ss-form').submit(function(event){
				//Start timeout timer
				iframeError = setTimeout(error, 5000);
			  //Alter submit button
			  $('#submitButton').prop('value', 'Please Wait...');
			  $('#submitButton').prop('disabled', true);
			  //On iFrame load
			  $('#googleSubmit').load(function(){
				//Reset timeout
				clearTimeout(iframeError);
				success();
			  });
			});
		  });
		  // ----Analytics----
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-76792905-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</body>
</html>
