<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>

	<head>

		<title> My FW Implementation - NewsView </title>

		<link rel="stylesheet" type="text/css" media="all" href="/app/media/css/layout.css" />

	</head>

	<body>

		<div id="body-container">

			<?php $this->addInclude( 'header.stpl.php' ); ?>

			<div id="crumbs">
				<?php echo $this->model->getCrumbs(); ?>
			</div>

			<div id="menu">
				<p>testing</p>
			</div>

			<div id="container">
				<h2> IM A VIEW </h2>
				<p>
					This is were i add all the information into the webpage
				</p>
			</div>

			<div id="footer">
				schnoodles
			</div>

		</div>

	</body>

</html>
