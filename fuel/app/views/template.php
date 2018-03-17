<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?= isset($title) ? $title : ''; ?> - 沼東総合の新演習</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<?= Asset::css('materialize.css'); ?>
	<?= Asset::render('add_css'); ?>
	<!--<link rel="apple-touch-icon" sizes="152x152" href="/assets/icon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/icon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/assets/icon/safari-pinned-tab.svg" color="#f59b35">
	<link rel="shortcut icon" href="/assets/icon/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-config" content="/browserconfig.xml">
	<meta name="theme-color" content="#ff9800">-->
</head>
<body>
<header class="navbar-fixed">
	<nav>
		<div class="nav-wrapper deep-purple">
			<?= Html::anchor('', '沼東総合の新演習', ['class' => 'brand-logo left']); ?>
			<a href="#" data-activates="mobile-menu" class="button-collapse right"><i class="material-icons">menu</i></a>
			<ul class="side-nav" id="mobile-menu">
				<li><?= Html::anchor('quiz', '<i class="material-icons">star_rate</i>演習'); ?></li>
			</ul>
			<ul class="right hide-on-med-and-down">
				<li><?= Html::anchor('quiz', '演習'); ?></li>
				<li><?= Html::anchor('login', 'ログイン'); ?></li>
			</ul>
		</div>
	</nav>
</header>
<main class="container">
	<?= isset($contents) ? $contents : ''; ?>
</main>
<footer class="page-footer grey darken-1" id="footer">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">沼東総合の新演習</h5>
				<p class="grey-text text-lighten-4"></p>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			&copy; 2018 Arthur
		</div>
	</div>
</footer>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<?= Asset::js('materialize.min.js'); ?>
<?= Asset::js('footerFixed.js'); ?>
<script type="text/javascript">
$(document).ready(function() {
	$(".button-collapse").sideNav();
});
</script>
<?= Asset::render('add_js'); ?>
</body>
</html>
