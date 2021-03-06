<!doctype html>
	<head>
		<meta charset="utf-8">
		<title><?php print_title(); ?></title>

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEMEPATH; ?>images/favicon/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php echo THEMEPATH; ?>images/favicon/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php echo THEMEPATH; ?>images/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#fc3a1e">
		<meta name="msapplication-TileImage" content="<?php echo THEMEPATH; ?>images/favicon/mstile-144x144.png">
		<meta name="theme-color" content="#fc3a1e">

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">

		<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

		<script src="//use.typekit.net/yms0cif.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<script>(function() {
			var _fbq = window._fbq || (window._fbq = []);
			if (!_fbq.loaded) {
			var fbds = document.createElement('script');
			fbds.async = true;
			fbds.src = '//connect.facebook.net/en_US/fbds.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(fbds, s);
			_fbq.loaded = true;
			}
			_fbq.push(['addPixelId', '979643168714891']);
			})();
			window._fbq = window._fbq || [];
			window._fbq.push(['track', 'PixelInitialized', {}]);
		</script>
		<noscript>
			<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=979643168714891&amp;ev=PixelInitialized" />
		</noscript>

		<?php wp_head(); ?>

		<!-- Hotjar Tracking Code for sunland.mx -->
		<script>
		    (function(h,o,t,j,a,r){
		        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		        h._hjSettings={hjid:35954,hjsv:5};
		        a=o.getElementsByTagName('head')[0];
		        r=o.createElement('script');r.async=1;
		        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		        a.appendChild(r);
		    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>

	</head>

	<body>
		<!-- Google Tag Manager -->
		<noscript>
			<iframe src="//www.googletagmanager.com/ns.html?id=GTM-WFG9VW"
		height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WFG9VW');</script>
		<!-- End Google Tag Manager -->

		<!--[if lt IE 9]>
			<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor 
				<a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
		<![endif]-->
		<div class="container">
			<header class="[ bg-dark-shade ]">
				<nav id="sunland-mmenu" class="[ hide ][ bg-highlight ] [ light ]">
					<ul class="[ no-margin ]">
						<li><a href="<?php echo site_url() ?>">Inicio</a></li>
						<li><a href="<?php echo site_url() . '/nosotros' ?>">Nosotros</a></li>
						<li><a href="#artes">Oferta académica</a>
							<ul>
								<li><a href="#artes/talleres">Talleres</a>
									<ul>
										<li><a href="<?php echo site_url( 'danza' ) ?>">Danza</a></li>
										<li><a href="<?php echo site_url( 'musica' ) ?>">Música</a></li>
										<li><a href="<?php echo site_url( 'teatro' ) ?>">Teatro</a></li>
									</ul>
								</li>
								<li><a href="<?php echo site_url( 'intensivo' );?>">Programa intensivo</a></li>
							</ul>
						</li>
						<li><a href="<?php echo site_url() . '/foro-sunland' ?>">Foro Sunland</a></li>
						<li><a href="<?php echo site_url() . '/sunland-studios' ?>">Sunland Studios</a></li>
						<li><a href="<?php echo site_url() . '/sunland-express' ?>">Sunland Express</a></li>
						<li><a href="<?php echo site_url() . '/contacto' ?>">Contacto</a></li>
					</ul>
				</nav>
				<div class="[ wrapper ]">
					<div class="[ row ]">
						<div class="[ xmall-6 large-1 ][ inline-block align-middle ]">
							<div class="[ logo ]">
								<a href="<?php echo site_url() ?>">
									<img alt="Sunland - School of arts" src="<?php echo THEMEPATH ?>images/logo-rojo.png" class="[ image-responsive ]">
								</a>
							</div>
						</div><div class="[ xmall-6 ][ hidden--large-inline ][ light ][ padding ][ inline-block align-middle ]">
						<a class="[ pull-right ]" href="#sunland-mmenu"><i class="fa fa-bars fa-2x"></i></a>
						</div><nav class="[ shown--large--inline ] [ large-11 ] [ bg-dark-shade ] [ clearfix ] [ menu-container ] [ inline-block align-middle ]">
							<a class="<?php echo ( 'Contacto' == get_the_title() ) ? '[ active ]' : '[ active--light ]' ?>[ shown--medium--inline middle ][ inline-block align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url() . '/contacto' ?>">
								Contacto
							</a>
							<a class="<?php echo ( 'Sunland Express' == get_the_title() ) ? '[ active ]' : '' ?>[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url() . '/sunland-express' ?>">
								Sunland Express
							</a>
							<a class="<?php echo ( 'Sunland Studios' == get_the_title() ) ? '[ active ]' : '' ?>[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url() . '/sunland-studios' ?>">
								Sunland Studios
							</a>
							<a class="<?php echo ( 'Foro Sunland' == get_the_title() ) ? '[ active ]' : '' ?>[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url() . '/foro-sunland' ?>">
								Foro Sunland
							</a>
							<?php
								$active_artes = '[]';
								if( 'Danza' == get_the_title() || 'Teatro' == get_the_title() || 'Música' == get_the_title() || 'Intensivo' == get_the_title()  ){
									$active_artes = '[ active ]';
								}
							?>
							<div class="[ shown--medium--inline align-middle ][ button button--menu ][ pull-right ] <?php echo $active_artes ?>">
								Oferta académica
								<ul class="[ dropdown ][ no-margin ]">
									<li><a href="#artes/talleres">Talleres <i class="[ icon-angle-down ][ pull-right ]"></i></a>
										<ul class="[ sub-dropdown ]">
											<li><a href="<?php echo site_url( 'danza' ) ?>">Danza</a></li>
											<li><a href="<?php echo site_url( 'musica' ) ?>">Música</a></li>
											<li><a href="<?php echo site_url( 'teatro' ) ?>">Teatro</a></li>
										</ul>
									</li>
									<li><a href="<?php echo site_url( 'intensivo' );?>">Programa intensivo</a></li>
								</ul>
							</div>
							<a class="<?php echo ( 'nosotros' == get_post_type() ) ? '[ active ]' : '' ?>[ no-xmall medium large ][ inline-block middle ][ button button--menu ][ pull-right ]" href="<?php echo site_url() . '/nosotros' ?>">
								Nosotros
							</a>
						</nav>
					</div>
				</div>
			</header>
			<div class="main">
<?php
	global $section;

	$section = get_the_title();
	if( 'nosotros' == get_post_type() ) $section = 'Nosotros';
?>