<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8">
		<title>
			<?php
				bloginfo('name');
				echo " | ";
				bloginfo( 'description' );
			?>
		</title>

    <meta name="title" content="<?php bloginfo( 'name' ); ?>">
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="">
		<meta name="color-scheme" content="dark light">

		<?php wp_head(); ?>
	</head>
  <body <?php body_class(); ?>>
    <header>
      <nav>
        <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-principale',
            'container' => false,
						'menu_class' => '',
					 )
          );
          ?>
      </nav>
    </header>
    <main>
