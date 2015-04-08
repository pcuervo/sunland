<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>
		<link rel="shortcut icon" href="<?php echo THEMEPATH; ?>images/favicon.ico">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<script src="//use.typekit.net/yms0cif.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
	</head>

	<body>
		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="container">
			<header class="[ bg-dark-shade ]">
				<nav id="sunland-mmenu" class="[ hide ][ bg-highlight ] [ light ]">
					<ul class="[ menu-inicio ]">
						<li><a href="<?php echo site_url() ?>">Inicio</a></li>
						<li><a href="#about">Nosotros</a></li>
						<li><a href="#artes">Artes escénicas</a>
							<ul>
								<li><a href="#artes/talleres">Talleres</a>
									<ul>
										<li><a href="#artes/talleres/danza">Danza</a></li>
										<li><a href="#about/team/sales">Música</a></li>
										<li><a href="#about/team/development">Teatro</a></li>
									</ul>
								</li>
								<li><a href="">Diplomados</a></li>
							</ul>
						</li>
						<li><a href="#contact">Foro Sunland</a></li>
						<li><a href="#contact">Sunland Studios</a></li>
						<li><a href="#contact">Sunland Express</a></li>
						<li><a href="#contact">Contacto</a></li>
					</ul>
				</nav>
				<div class="[ wrapper ]">
					<div class="[ row ]">
						<div class="[ xmall-3 small-2 medium-2 xmedium-1 ] [ inline-block align-middle ]">
							<h1>
								<img src="<?php echo THEMEPATH ?>images/logo-rojo.png" class="[ image-responsive ]">
							</h1>
						</div><div class="[ xmall-9 small-10 medium-10 xmedium-11 ][ hidden--large-inline ] [ light ] [ padding ] [ inline-block align-middle ]">
							<a class="[ pull-right ]" href="#sunland-mmenu"><i class="fa fa-bars fa-2x"></i></a>
						</div><nav class="[ shown--large--inline ] [ large-11 ] [ bg-dark-shade ] [ clearfix ] [ menu-container ] [ inline-block align-middle ]">
							<a class="[ shown--medium--inline middle ] [ inline-block align-middle ] [ boton-menu ] [ left ]" href="contacto.html">
								<p class="[  ]">Contacto</p>
							</a>
							<a class="[ shown--medium--inline align-middle ] [ boton-menu ]" href="contacto.html">
								<p class="[  ]">Sunland Express</p>
							</a>
							<a class="[ shown--medium--inline align-middle ] [ boton-menu ]" href="contacto.html">
								<p class="[  ]">Sunland Studios</p>
							</a>
							<a class="[ shown--medium--inline align-middle ] [ boton-menu ]" href="contacto.html">
								<p class="[  ]">Foro Sunland</p>
							</a>
							<a class="[ shown--medium--inline align-middle ] [ boton-menu ]" href="productos.html">
								<p class="[  ]">Artes escenicas</p>
							</a>
							<a class="<?php echo ( 'nosotros' == get_post_type() ) ? '[ active ]' : '' ?>[ no-xmall medium large ] [ inline-block middle ] [ boton-menu ]" href="<?php echo site_url() . '/nosotros' ?>">
								<p class="[  ]">Nosotros</p>
							</a>
						</nav>
					</div>
				</div>
			</header>
			<div class="main">
