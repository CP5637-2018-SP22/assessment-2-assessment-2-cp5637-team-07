<?php
/**
 * groupseven functions and definitions
 *
 * @subpackage groupseven
 * @since      groupseven 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 656;
}
function groupseven_setup() {
	/* Sets up the content width value based on the theme's design. */
	load_theme_textdomain( 'groupseven', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	/* This theme styles the visual editor with editor-style.css to match the theme style. */
	add_editor_style( 'css/editor_style.css' );
	/* Adds RSS feed links to <head> for posts and comments. */
	add_theme_support( 'automatic-feed-links' );
	/* Switches default core markup for search form, comment form, and comments to output valid HTML5. */
	add_theme_support( 'html5', array( 'comment-form', 'comment-list' ) );
	/* This theme supports all available post formats by default. See http://codex.wordpress.org/Post_Formats */
	add_theme_support( 'post-formats',
		array(
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		)
	);
	add_theme_support( 'custom-header',
		array(
			'default-image'          => '',
			'width'                  => 1920,
			'height'                 => 245,
			'flex-width'             => false,
			'flex-height'            => false,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '#444',
			'uploads'                => true,
			'wp-head-callback'       => 'groupseven_header_style',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		)
	);
	/* This theme supports custom background color and image, and here we also set up the default background color. */
	add_theme_support( 'custom-background',
		array(
			'default-color' => 'fff',
		)
	);
	/* This theme uses a custom image size for featured images, displayed on "standard" posts. */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'groupseven_image_content_size', 656, 9999 ); /* Unlimited height, soft crop */
}
/* register navigation menu */
function groupseven_register_nav_menu() {
	register_nav_menu( 'header-menu', __( 'Header Menu', 'groupseven' ) );
}
/* ?onclusion sidebar */
function groupseven_register_sidebar() {
	/* Right sidebar */
	register_sidebar(
		array(
			'name'          => __( 'Home Right Sidebar', 'groupseven' ),
			'id'            => 'groupseven_right_sidebar',
			'before_widget' => '<section class="groupseven-witget-right-sidebar">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="groupseven-widget-title">',
			'after_title'   => '</h2>',
		)
	);
	/* Footer sidebar */
	register_sidebar(
		array(
			'name'          => __( 'Footer Sidebar', 'groupseven' ),
			'id'            => 'groupseven_footer_sidebar',
			'before_widget' => '<section class="groupseven-witget-footer-sidebar">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="groupseven-widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
/* Proper way to enqueue scripts and styles */
function groupseven_style_scripts() {
	/* Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use). */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'groupseven-styles', get_stylesheet_uri() );
	wp_enqueue_script( 'groupseven-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
	/* including scripts for compatibility html5 with IE */
	wp_enqueue_script( 'groupseven-html5', get_template_directory_uri() . '/js/html5.js' );
	/* array with elements to localize in scripts */
	$script_localization = array(
		'choose_file'          => __( 'Choose file', 'groupseven' ),
		'file_is_not_selected' => __( 'File is not selected', 'groupseven' ),
		'groupseven_home_url'        => esc_url( home_url() ),
	);
	wp_localize_script( 'groupseven-scripts', 'script_loc', $script_localization );
}
/* Includes support Breadcrumbs */
function groupseven_breadcrumbs() {
	echo '<h3>';
	if ( is_single() ) {
		/* show title differently depending on whether list of categories is displayed   */
		if ( has_category() ) { /* check if the post belongs to any categories  */
			echo get_the_title();
		} elseif ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) { /* if it is a page of a paginated post  */
			if ( ! is_front_page() ) { /* if it is not home page add hyphen before 'page' */
				_e( 'Page ', 'groupseven' );
				echo $_GET['page'];
			}
		}
	} elseif ( is_category() ) {
		printf( __( 'Category Archives', 'groupseven' ) . ':&thinsp;%s', single_cat_title( '', false ) );
	} elseif ( is_attachment() ) {
		echo get_the_title();
	} elseif ( is_page() ) {
		echo get_the_title();
	} elseif ( is_tag() ) { /* if it is a tags archive page  */
		printf( __( 'Tag Archives', 'groupseven' ) . ':&thinsp;%s', single_tag_title( '', false ) );
	} elseif ( is_day() ) {
		echo __( 'Archive for', 'groupseven' ) . ' &thinsp;';
		the_time( 'F jS Y' );
	} elseif ( is_month() ) {
		echo __( 'Archive for', 'groupseven' ) . ' &thinsp;';
		the_time( 'F Y' );
	} elseif ( is_year() ) {
		echo __( 'Archive for', 'groupseven' ) . ' &thinsp;';
		the_time( 'Y' );
	} elseif ( is_author() ) {
		echo __( 'Author&#8217;s Archive', 'groupseven' ) . ':&thinsp;';
		the_author();
	} elseif ( is_search() ) {
		echo __( 'Search Results', 'groupseven' );
	} elseif ( is_404() ) {
		echo __( 'Page not found', 'groupseven' );
	}
	if ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { /* if it is a page of the post list  */
		echo '&thinsp;' . __( 'Page ', 'groupseven' );
		echo $_GET['paged'];
	}
	echo '</h3>';
	if ( ( ! is_front_page() ) && ( ! is_404() ) ) { /* if it is Front Page 'Home' is not displayed  */
		echo '<a href="' . esc_url( get_home_url( null, '/' ) ) . '">' . __( 'Home', 'groupseven' ) . '</a>'; /* link to Front Page */
	} /*endif is_front_page()  */
	if ( is_single() ) {
		/* show title differently depending on whether list of categories is displayed   */
		if ( has_category() ) { /* check if the post belongs to any categories  */
			echo '&thinsp;/&thinsp;' . get_the_title();
		} else {
			echo '&thinsp;/&thinsp;' . get_the_title();
		}
		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) ) { /* if it is a page of a paginated post 	 */
			if ( ! is_front_page() ) { /* if it is not home page add hyphen before 'page' */
				$symbol_before_page = '&thinsp;/&thinsp;';
			} else {
				$symbol_before_page = '';
			}
			echo $symbol_before_page;
			_e( 'Page ', 'groupseven' );
			echo $_GET['page'];
		}
	} elseif ( is_category() ) {
		$category  = get_queried_object();
		$this_cat  = $category->name;
		$cat_bread = array();
		if ( $category->parent ) {
			while ( $category->parent ) {
				$category = get_category( $category->parent );
				array_push( $cat_bread, '&thinsp;/&thinsp;<a href="' . esc_url( get_category_link( $category->cat_ID ) ) . '" title="' . esc_attr( $category->slug ) . '">' . $category->name . '</a>' );
			}
			for ( $i = count( $cat_bread ) - 1; $i >= 0; $i -- ) {
				echo $cat_bread[ $i ];
			}
		}
		echo '&thinsp;/&thinsp;' . $this_cat;
	} elseif ( is_attachment() ) {
		echo '&thinsp;/&thinsp;' . get_the_title();
	} elseif ( is_page() ) {
		global $post;
		if ( $post->ancestors ) {
			/* reverse order of a parent pages array for the current page  */
			$ancestors = array_reverse( $post->ancestors );
			/* display links to parent pages of the current page  */
			for ( $i = 0; $i < count( $ancestors ); $i ++ ) {
				if ( 0 == $i ) {
					echo '&thinsp;/&thinsp;<a href=' . get_permalink( $ancestors[ $i ] ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>';
				} else {
					echo '&thinsp;/&thinsp;<a href=' . get_permalink( $ancestors[ $i ] ) . '>' . get_the_title( $ancestors[ $i ] ) . '</a>';
				}
			}
			echo '&thinsp;/&thinsp;' . get_the_title();
		} else {
			echo '&thinsp;/&thinsp;' . get_the_title();
		}
	} elseif ( is_tag() ) { /* if it is a tags archive page  */
		printf( '&thinsp;/&thinsp;%s', single_tag_title( '', false ) );
	} elseif ( is_day() ) {
		echo '&thinsp;/&thinsp;';
		the_time( 'F jS Y' );
	} elseif ( is_month() ) {
		echo '&thinsp;/&thinsp;';
		the_time( 'F Y' );
	} elseif ( is_year() ) {
		echo '&thinsp;/&thinsp;';
		the_time( 'Y' );
	} elseif ( is_author() ) {
		echo '&thinsp;/&thinsp;';
		the_author();
	} elseif ( is_search() ) {
		echo '&thinsp;/&thinsp;' . __( 'Search Results', 'groupseven' );
	} elseif ( is_404() ) {
		echo '&thinsp;/&thinsp;' . __( 'Page not found', 'groupseven' );
	}
	if ( isset( $_GET['paged'] ) && ! empty( $_GET['paged'] ) ) { /* if it is a page of the post list  */
		if ( ! is_front_page() ) { /* if it is not home page add hyphen before 'page' */
			$symbol_before_page = '&thinsp;/&thinsp;';
		} else {
			$symbol_before_page = '';
		}
		echo $symbol_before_page;
		_e( 'Page ', 'groupseven' );
		echo $_GET['paged'];
	}
}
/* output function posts */
function groupseven_posts() {
	global $wp_query;
	$num_posts = $wp_query->found_posts;
	$num_posts = sprintf( _n( '%s Post', '%s Posts', $num_posts, 'groupseven' ), number_format_i18n( $num_posts ) );
	if ( ! is_singular() ) {
		echo $num_posts;
	}
}
/* caption text */
function groupseven_the_post_thumbnail_caption() {
	global $post;
	$thumbnail_id    = get_post_thumbnail_id( $post->ID );
	$thumbnail_image = get_posts(
		array(
			'p'         => $thumbnail_id,
			'post_type' => 'attachment',
		)
	);
	if ( $thumbnail_image && isset( $thumbnail_image[0] ) ) {
		if ( '' != $thumbnail_image[0]->post_excerpt ) {
			echo '<p class="wp-caption-text">' . $thumbnail_image[0]->post_excerpt . '</p>';
		}
	}
}
/* functions file enables you to customize the read more link text */
function groupseven_modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">' . __( 'More Link', 'groupseven' ) . '</a>';
}
function groupseven_header_style() {
	$text_color   = get_header_textcolor();
	$display_text = display_header_text();
	/* If no custom options for text are set, return default. */
	if ( HEADER_TEXTCOLOR == $text_color ) {
		return;
	}
	/* If optins are set, we use them  */ ?>
	<style type="text/css">
		<?php /*If the user has set a custom color for the text use that */
		if ( 'blank' != $text_color ) { ?>
			.groupseven-site-title,
			.groupseven-site-title a {
				color: <?php echo '#' . $text_color . '!important'; ?>;
			}
		<?php }
		/* Display text or not */
		if ( ! $display_text ) { ?>
			.groupseven-site-title {
				display: none;
			}
		<?php } ?>
	</style>
<?php }
add_action( 'after_setup_theme', 'groupseven_setup' );
add_action( 'init', 'groupseven_register_nav_menu' );
add_action( 'widgets_init', 'groupseven_register_sidebar' );
add_action( 'wp_enqueue_scripts', 'groupseven_style_scripts' );
add_action( 'groupseven_breadcrumbs', 'groupseven_breadcrumbs' );
add_action( 'groupseven_posts', 'groupseven_posts' );
add_action( 'groupseven_the_post_thumbnail_caption', 'groupseven_the_post_thumbnail_caption' );
add_filter( 'the_content_more_link', 'groupseven_modify_read_more_link' );