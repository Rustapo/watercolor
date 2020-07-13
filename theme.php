<?php global $Wcms ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="title" content="<?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?>" />
		<meta name="description" content="<?= $Wcms->page('description') ?>">
		<meta name="keywords" content="<?= $Wcms->page('keywords') ?>">

		<meta property="og:url" content="<?= $this->url() ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="<?= $Wcms->get('config', 'siteTitle') ?>" />
		<meta property="og:title" content="<?= $Wcms->page('title') ?>" />
		<meta name="twitter:site" content="<?= $this->url() ?>" />
		<meta name="twitter:title" content="<?= $Wcms->get('config', 'siteTitle') ?> - <?= $Wcms->page('title') ?>" />
		<meta name="twitter:description" content="<?= $Wcms->page('description') ?>" />

		<title><?= strip_tags($Wcms->get('config', 'siteTitle')) ?> - <?= $Wcms->page('title') ?></title>

		<?= $Wcms->css() ?>
		<link rel="stylesheet" rel="preload" as="style" href="<?= $Wcms->asset('assets/style.css') ?>">

		<?php if($Wcms->loggedIn): ?>
			<script src="<?= $Wcms->asset('assets/jquery.min.js') ?>"></script>
			<script>
				// Admin fix

				addEventListener("load", e => {
					[...document.querySelectorAll(".close")].forEach(elem => elem.addEventListener("click", e => {
						e.target.parentElement.parentElement.removeChild(e.target.parentElement)
					}))
				})
			</script>
			<style>
				nav {
					padding-right: 9em;
				}
			</style>
		<?php endif; ?>

	</head>

	<body class="d-flex flex-column <?= $Wcms->currentPage === $Wcms->get("config", "defaultPage") ? "home" : "page" ?> no-js">
		<?= $Wcms->settings() ?>
		<?= $Wcms->alerts() ?>

		<?php // Embed some fontawesome icons on the homepage, we don't need the whole font. Saves a lot of data! ?>
		<?php if($Wcms->currentPage === $Wcms->get("config", "defaultPage")): ?>
			<svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" style="display:none">
				<defs>
					<path fill="currentColor" id="fab-behance" d="M232 237.2c31.8-15.2 48.4-38.2 48.4-74 0-70.6-52.6-87.8-113.3-87.8H0v354.4h171.8c64.4 0 124.9-30.9 124.9-102.9 0-44.5-21.1-77.4-64.7-89.7zM77.9 135.9H151c28.1 0 53.4 7.9 53.4 40.5 0 30.1-19.7 42.2-47.5 42.2h-79v-82.7zm83.3 233.7H77.9V272h84.9c34.3 0 56 14.3 56 50.6 0 35.8-25.9 47-57.6 47zm358.5-240.7H376V94h143.7v34.9zM576 305.2c0-75.9-44.4-139.2-124.9-139.2-78.2 0-131.3 58.8-131.3 135.8 0 79.9 50.3 134.7 131.3 134.7 61.3 0 101-27.6 120.1-86.3H509c-6.7 21.9-34.3 33.5-55.7 33.5-41.3 0-63-24.2-63-65.3h185.1c.3-4.2.6-8.7.6-13.2zM390.4 274c2.3-33.7 24.7-54.8 58.5-54.8 35.4 0 53.2 20.8 56.2 54.8H390.4z"></path>
					<path fill="currentColor" id="fab-facebook" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
					<path fill="currentColor" id="fab-google" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
					<path fill="currentColor" id="fab-instagram" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
					<path fill="currentColor" id="fab-linkedin" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
					<path fill="currentColor" id="fab-mastodon" d="M433 179.11c0-97.2-63.71-125.7-63.71-125.7-62.52-28.7-228.56-28.4-290.48 0 0 0-63.72 28.5-63.72 125.7 0 115.7-6.6 259.4 105.63 289.1 40.51 10.7 75.32 13 103.33 11.4 50.81-2.8 79.32-18.1 79.32-18.1l-1.7-36.9s-36.31 11.4-77.12 10.1c-40.41-1.4-83-4.4-89.63-54a102.54 102.54 0 0 1-.9-13.9c85.63 20.9 158.65 9.1 178.75 6.7 56.12-6.7 105-41.3 111.23-72.9 9.8-49.8 9-121.5 9-121.5zm-75.12 125.2h-46.63v-114.2c0-49.7-64-51.6-64 6.9v62.5h-46.33V197c0-58.5-64-56.6-64-6.9v114.2H90.19c0-122.1-5.2-147.9 18.41-175 25.9-28.9 79.82-30.8 103.83 6.1l11.6 19.5 11.6-19.5c24.11-37.1 78.12-34.8 103.83-6.1 23.71 27.3 18.4 53 18.4 175z"></path>
					<path fill="currentColor" id="fab-pinterest" d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"></path>
					<path fill="currentColor" id="fab-tumblr" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-82.3 364.2c-8.5 9.1-31.2 19.8-60.9 19.8-75.5 0-91.9-55.5-91.9-87.9v-90h-29.7c-3.4 0-6.2-2.8-6.2-6.2v-42.5c0-4.5 2.8-8.5 7.1-10 38.8-13.7 50.9-47.5 52.7-73.2.5-6.9 4.1-10.2 10-10.2h44.3c3.4 0 6.2 2.8 6.2 6.2v72h51.9c3.4 0 6.2 2.8 6.2 6.2v51.1c0 3.4-2.8 6.2-6.2 6.2h-52.1V321c0 21.4 14.8 33.5 42.5 22.4 3-1.2 5.6-2 8-1.4 2.2.5 3.6 2.1 4.6 4.9l13.8 40.2c1 3.2 2 6.7-.3 9.1z"></path>
					<path fill="currentColor" id="fab-twitter" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
					<path fill="currentColor" id="far-globe" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm179.3 160h-67.2c-6.7-36.5-17.5-68.8-31.2-94.7 42.9 19 77.7 52.7 98.4 94.7zM248 56c18.6 0 48.6 41.2 63.2 112H184.8C199.4 97.2 229.4 56 248 56zM48 256c0-13.7 1.4-27.1 4-40h77.7c-1 13.1-1.7 26.3-1.7 40s.7 26.9 1.7 40H52c-2.6-12.9-4-26.3-4-40zm20.7 88h67.2c6.7 36.5 17.5 68.8 31.2 94.7-42.9-19-77.7-52.7-98.4-94.7zm67.2-176H68.7c20.7-42 55.5-75.7 98.4-94.7-13.7 25.9-24.5 58.2-31.2 94.7zM248 456c-18.6 0-48.6-41.2-63.2-112h126.5c-14.7 70.8-44.7 112-63.3 112zm70.1-160H177.9c-1.1-12.8-1.9-26-1.9-40s.8-27.2 1.9-40h140.3c1.1 12.8 1.9 26 1.9 40s-.9 27.2-2 40zm10.8 142.7c13.7-25.9 24.4-58.2 31.2-94.7h67.2c-20.7 42-55.5 75.7-98.4 94.7zM366.3 296c1-13.1 1.7-26.3 1.7-40s-.7-26.9-1.7-40H444c2.6 12.9 4 26.3 4 40s-1.4 27.1-4 40h-77.7z"></path>
					<path fill="currentColor" id="fas-brackets" d="M144 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h112a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16H64V96h80a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zm272 0H304a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h80v320h-80a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h112a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32z"></path>
					<path fill="currentColor" id="fas-brackets-curly" d="M208 32h-48a96 96 0 0 0-96 96v37.48a32.06 32.06 0 0 1-9.38 22.65L9.37 233.37a32 32 0 0 0 0 45.26l45.25 45.25A32 32 0 0 1 64 346.51V384a96 96 0 0 0 96 96h48a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-48a32 32 0 0 1-32-32v-37.48a96 96 0 0 0-28.13-67.89L77.25 256l22.63-22.63A96 96 0 0 0 128 165.48V128a32 32 0 0 1 32-32h48a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zm358.63 201.37l-45.25-45.24a32.06 32.06 0 0 1-9.38-22.65V128a96 96 0 0 0-96-96h-48a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h48a32 32 0 0 1 32 32v37.47a96 96 0 0 0 28.13 67.91L498.75 256l-22.62 22.63A96 96 0 0 0 448 346.52V384a32 32 0 0 1-32 32h-48a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h48a96 96 0 0 0 96-96v-37.49a32 32 0 0 1 9.38-22.63l45.25-45.25a32 32 0 0 0 0-45.26z"></path>
					<path fill="currentColor" id="fas-comment" d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"></path>
					<path fill="currentColor" id="fas-envelope" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path>
				</defs>
			</svg>
		<?php endif; ?>

		<nav>
			<h2><a href="<?= $Wcms->url() ?>"><?= $Wcms->siteTitle() ?></a></h2>
			<ul>
				<?= $Wcms->menu() ?>
			</ul>
		</nav>

		<header>


			<?php if($Wcms->currentPage === $Wcms->get("config", "defaultPage")): ?>
				<div class="header-content container">
					<?= newEditableArea("{$Wcms->currentPage}_header", "
	<h1>Hi! <span>I'm Watercolor.</span></h1>
	<span>This is a detailed watercolor theme by <a href=\"https://stephanstanisic.nl\">Stephan Stanisic</a>.</span>

	<div class=\"header-socials\">
		<a class=\"fab fa-twitter\" href=\"https://nitter.net/Stephan_Stanisi\"></a>
		<a class=\"fab fa-mastodon\" href=\"https://mas.to/@steph\"></a>
		<a class=\"fas fa-comment\" href=\"http://delta.stanisic.nl/stephan\"></a>
	</div>
	") ?>
				</div>

				<div class="icon-scroll"></div>
			<?php elseif($Wcms->currentPage === $Wcms->get("config", "login")): ?>
				<div class="header-content container">
					<h1>Login</h1>
				</div>
			<?php elseif($Wcms->loggedIn): ?>
				<div class="header-content">
					<?= newEditableArea("{$Wcms->currentPage}_header", "<h1>Page <span>Title.</span></h1>
<span>And a subtitle</span>") ?>
				</div>
			<?php elseif(isset($Wcms->get("pages")->{$Wcms->currentPage})): ?>
				<div class="header-content">
					<?= $Wcms->block("{$Wcms->currentPage}_header") ?>
				</div>
			<?php else: ?>
				<div class="header-content">
					<?= newEditableArea("404_header", "<h1>four - oh - four</h1>
<span>Page not found</span>") ?>
				</div>
			<?php endif; ?>

		</header>

		<main>

			<?= $Wcms->page('content') ?>

		</main>
		<footer>

			<?= $Wcms->footer() ?>

			<p>Theme made by <a href="https://stephanstanisic.nl">Stephan Stanisic</a>.
				<a href="https://mas.to/@cosmicbun11/104335426368943008" rel="noreferrer">Look ma, no squarespace!</a><br>
				Font <a href="https://github.com/zephyo/5fonts10hours/tree/master/Good%20Day" rel="noreferrer">Good Day</a> by <a href="https://angelahe.dev">Angela He</a> used under <a href="https://creativecommons.org/licenses/by/3.0/us/" rel="noreferrer">CC-BY-3.0-US</a>.<br>
				Font <a href="https://github.com/zephyo/5fonts10hours/tree/master/qtpi" rel="noreferrer">qtpi</a> by <a href="https://angelahe.dev">Angela He</a> modified and used under <a href="https://creativecommons.org/licenses/by/3.0/us/" rel="noreferrer">CC-BY-3.0-US</a>. </p>

		</footer>

		<script src="<?= $Wcms->asset('assets/script.js') ?>"></script>
		<script>let config = { page: <?=json_encode($Wcms->currentPage); ?>, home: <?=json_encode($Wcms->get("config", "defaultPage"))?>}</script>
		<?= $Wcms->js() ?>
		<noscript><link rel="stylesheet" rel="preload" as="style" href="<?= $Wcms->asset('assets/noscript.css') ?>"></noscript>

	</body>
</html>
