<?php /*Template Name: Front*/ get_header();
get_template_part( 'template-parts/section', 'hero' );

get_template_part( 'template-parts/content', 'features');
get_template_part( 'template-parts/section', 'customers' );

get_template_part( 'template-parts/content', 'goods' );
get_template_part( 'template-parts/section', 'gallery' );
get_template_part( 'template-parts/content', 'news' );
get_template_part( 'template-parts/content', 'kart' );
get_template_part( 'template-parts/section', 'contacts' );

get_template_part( 'template-parts/content', 'widjets' );
get_footer(); 



