<?php

namespace ALegacyGenetics;

class Controller {

	const VERSION = '1.0.0';
	const VERSION_CSS = '1.0.0';
	const VERSION_JS = '1.0.0';

	const APP_NAME = 'a_legacy_genetics';
	const THEME_URI = 'http://www.alegacygenetics.com';
	const OPTION_NAME = 'alg_theme_options';

	const MENU_MAIN = 'alg_main_menu';
	const MENU_SECONDARY = 'alg_secondary_menu';

	const OPTION_VERSION = 'alg_version';
	const OPTION_ADDRESS = 'alg_address';
	const OPTION_PHONE = 'alg_phone';
	const OPTION_FACEBOOK = 'alg_facebook';
	const OPTION_TWITTER = 'alg_twitter';
	const OPTION_INSTAGRAM = 'alg_instagram';
	const OPTION_YOUTUBE = 'alg_youtube';
	const OPTION_GOOGLE = 'alg_google';
	const OPTION_CALL_TO_ACTION = 'alg_call_to_action';
	const OPTION_CALL_TO_ACTION_SUB = 'alg_call_to_action_sub';
	const OPTION_PURCHASE_LINK = 'alg_purchase_link';
	const OPTION_LIFETIME_FEE = 'alg_lifetime_fee';
	const OPTION_ANNUAL_FEE = 'alg_annual_fee';

	private $attributes;
	private $errors;

	/** @var Member $member */
	private $member;

	/**
	 * @return Member
	 */
	public function getMember()
	{
		return ( $this->member === NULL ) ? new Member : $this->member;
	}

	/**
	 * @param Member $member
	 *
	 * @return Controller
	 */
	public function setMember( $member )
	{
		$this->member = $member;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getErrors()
	{
		return ( $this->errors === NULL ) ? array() : $this->errors;
	}

	/**
	 * @param $error
	 *
	 * @return $this
	 */
	public function addError( $error )
	{
		if( $this->errors === NULL )
		{
			$this->errors = array();
		}

		$this->errors[] = $error;
		return $this;
	}

	public function theme_setup()
	{
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		register_nav_menus( array(
			self::MENU_MAIN => __( 'ALG Main Menu', 'a-legacy-genetics' ),
			self::MENU_SECONDARY => __( 'ALG Secondary Menu', 'a-legacy-genetics' )
		) );

		$this->checkForUpdates();
	}

	public function checkForUpdates()
	{
		$version = get_option( self::OPTION_VERSION, '' );

		if ( $version != self::VERSION )
		{
			update_option( self::OPTION_VERSION, self::VERSION );
		}
	}

	/**
	 * @return array
	 */
	public static function get_states()
	{
		return array(
			'AK' => 'Alaska',
			'AL' => 'Alabama',
			'AR' => 'Arkansas',
			'AZ' => 'Arizona',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DC' => 'Washington DC',
			'DE' => 'Delaware',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'IA' => 'Iowa',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'MA' => 'Massachusetts',
			'MD' => 'Maryland',
			'ME' => 'Maine',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MO' => 'Missouri',
			'MS' => 'Mississippi',
			'MT' => 'Montana',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'NE' => 'Nebraska',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NV' => 'Nevada',
			'NY' => 'New York',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VA' => 'Virginia',
			'VT' => 'Vermont',
			'WA' => 'Washington',
			'WI' => 'Wisconsin',
			'WV' => 'West Virginia',
			'WY' => 'Wyoming'
		);
	}

	/**
	 * @param $abbr
	 *
	 * @return string
	 */
	public static function get_state_and_abbr( $abbr )
	{
		$states = self::get_states();
		if ( array_key_exists( $abbr, $states ) )
		{
			return $abbr . ' - ' . $states[ $abbr ];
		}

		return $abbr;
	}

	public function enqueue_styles_and_scripts()
	{
		wp_enqueue_style( 'a-legacy-genetics-fonts', 'https://fonts.googleapis.com/css?family=PT+Serif:400,700|Open+Sans:400,400italic,700,700italic&amp;subset=latin,cyrillic', array(), true );
		wp_enqueue_style( 'a-legacy-genetics-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array() );
		wp_enqueue_style( 'a-legacy-genetics-bootstrap-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array() );
		wp_enqueue_style( 'a-legacy-genetics-styles', get_stylesheet_uri(), array(), ( WP_DEBUG ) ? time() : self::VERSION_CSS );
		wp_enqueue_style( 'a-legacy-genetics-hover-cow-styles', get_template_directory_uri() . '/css/hover_cow.css', array(), ( WP_DEBUG ) ? time() : self::VERSION_CSS );

		wp_enqueue_script( 'a-legacy-genetics-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'a-legacy-genetics-font-awesome', 'https://use.fontawesome.com/0753562cc9.js', array() );
		wp_enqueue_script( 'a-legacy-genetics-js', get_template_directory_uri() . '/js/a-legacy-genetics.js', array( 'jquery' ), ( WP_DEBUG ) ? time() : self::VERSION_JS, TRUE );
	}

	public function enqueue_admin_styles_and_scripts()
	{
		$this->enqueue_styles_and_scripts();
		wp_enqueue_script( 'a-legacy-genetics-admin-js', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ), ( WP_DEBUG ) ? time() : self::VERSION_JS, TRUE );
	}

	public function editor_styles()
	{
		add_editor_style( 'editor-style.css' );
	}

	public function widgets_init()
	{
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'a-legacy-genetics' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'a-legacy-genetics' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<p class="wtitle">',
			'after_title'   => '</p>',
		) );
	}

	/**
	 * @param \WP_Customize_Manager $wp_customize
	 */
	public function customizer( $wp_customize )
	{
		$wp_customize->get_section( 'header_image' )->title    = __( 'Header', 'a-legacy-genetics' );
		$wp_customize->get_section( 'header_image' )->priority = 30;

		$wp_customize->add_control( 'layout_home_control',
			array(
				'settings'        => self::OPTION_NAME . '[layout_home]',
				'label'           => __( "Layout on Home", 'a-legacy-genetics' ),
				'section'         => 'layout',
				'active_callback' => 'is_home',
				'type'            => 'select',
				'choices'         => array(
					'rightbar' => __( "Rightbar", 'a-legacy-genetics' ),
					'leftbar'  => __( "Leftbar", 'a-legacy-genetics' ),
					'full'     => __( "Fullwidth Content", 'a-legacy-genetics' ),
					'center'   => __( "Centered Content", 'a-legacy-genetics' ),
					'lala'   => __( "lala Content", 'a-legacy-genetics' )
				),
			)
		);
	}

	public function page_layout_box()
	{
		add_meta_box( 'ona-page-layout', __( 'Select Layout', 'a-legacy-genetics' ), array( $this, 'ona_page_layout' ), 'page', 'side', 'default' );
	}

	public function ona_page_layout()
	{
		global $post;

		$page_layout = $this->get_default_page_layouts();

		wp_nonce_field( basename( __FILE__ ), 'ona_meta_box_nonce' );

		foreach ( $page_layout as $field )
		{
			$layout_meta = get_post_meta( $post->ID, $field['id'], TRUE );

			if ( empty( $layout_meta ) )
			{
				$layout_meta = 'default';
			}

			echo '
				<label>
					<input type="radio" name="' . $field['id'] . '" value="' . $field['value'] . '" ' . checked( $field['value'], $layout_meta, FALSE ) . '>
					' . $field['label'] . '
				</label><br>';
		}
	}

	public function get_default_page_layouts()
	{
		return array(
			'default-layout' => array(
				'id'    => 'ona_page_layout',
				'value' => 'default',
				'label' => __( 'Default', 'a-legacy-genetics' )
			),
			'rightbar'       => array(
				'id'    => 'ona_page_layout',
				'value' => 'rightbar',
				'label' => __( 'Rightbar', 'a-legacy-genetics' )
			),
			'leftbar'        => array(
				'id'    => 'ona_page_layout',
				'value' => 'leftbar',
				'label' => __( 'Leftbar', 'a-legacy-genetics' )
			),
			'full'           => array(
				'id'    => 'ona_page_layout',
				'value' => 'full',
				'label' => __( 'Fullwidth Content', 'a-legacy-genetics' )
			)
		);
	}

	public function create_post_types()
	{
		$labels = array (
			'name' => __( 'White Angus Bulls' ),
			'singular_name' => __( 'White Angus Bull' ),
			'add_new_item' => __( 'Add New White Angus Bull' ),
			'edit_item' => __( 'Edit White Angus Bull' ),
			'new_item' => __( 'New White Angus Bull' ),
			'view_item' => __( 'View White Angus Bull' ),
			'search_items' => __( 'Search White Angus Bulls' ),
			'not_found' => __( 'No White Angus Bulls Found.' )
		);

		$args = array (
			'labels' => $labels,
			'hierarchical' => FALSE,
			'description' => 'White Angus Bulls',
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => FALSE,
			'show_ui' => TRUE,
			'show_in_menu' => FALSE,
			'show_in_nav_menus' => FALSE,
			'publicly_queryable' => FALSE,
			'exclude_from_search' => FALSE,
			'has_archive' => TRUE
		);

		register_post_type('alg_white_angus_bull', $args);

		$labels = array (
			'name' => __( 'Gyrolondo Bulls' ),
			'singular_name' => __( 'Gyrolondo Bull' ),
			'add_new_item' => __( 'Add New Gyrolondo Bull' ),
			'edit_item' => __( 'Edit Gyrolondo Bull' ),
			'new_item' => __( 'New Gyrolondo Bull' ),
			'view_item' => __( 'View Gyrolondo Bull' ),
			'search_items' => __( 'Search Gyrolondo Bulls' ),
			'not_found' => __( 'No Gyrolondo Bulls Found.' )
		);

		$args = array (
			'labels' => $labels,
			'hierarchical' => FALSE,
			'description' => 'Gyrolondo Bulls',
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => FALSE,
			'show_ui' => TRUE,
			'show_in_menu' => FALSE,
			'show_in_nav_menus' => FALSE,
			'publicly_queryable' => FALSE,
			'exclude_from_search' => FALSE,
			'has_archive' => TRUE
		);

		register_post_type('alg_gyrolondo_bull', $args);
	}

	public function save_custom_page_meta( $post_id )
	{
		$page_layout = $this->get_default_page_layouts();

		// Verify the nonce before proceeding.
		if ( ! isset( $_POST['ona_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['ona_meta_box_nonce'], basename( __FILE__ ) ) )
		{
			return FALSE;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		{
			return FALSE;
		}

		if ( 'page' == $_POST['post_type'] )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		elseif ( ! current_user_can( 'edit_post', $post_id ) )
		{
			return $post_id;
		}

		foreach ( $page_layout as $field )
		{
			$old = get_post_meta( $post_id, $field['id'], TRUE );
			$new = isset( $_POST[ $field['id'] ] ) ? $_POST[ $field['id'] ] : 'default';
			if ( $new && $new != $old )
			{
				update_post_meta( $post_id, $field['id'], $new );
			}
			elseif ( '' == $new && $old )
			{
				delete_post_meta( $post_id, $field['id'], $old );
			}
		}

		return TRUE;
	}

	public function get_theme_option( $key )
	{
		$cache = wp_cache_get( self::OPTION_NAME );
		if ( $cache )
		{
			return ( isset( $cache[ $key ] ) ) ? $cache[ $key ] : FALSE;
		}

		$opt = get_option( self::OPTION_NAME );

		wp_cache_add( self::OPTION_NAME, $opt );

		return ( isset( $opt[ $key ] ) ) ? $opt[ $key ] : FALSE;
	}

	public function has_left_side_bar()
	{
		/** @var \WP_Post $post */
		global $post;

		$layout = get_post_meta( $post->ID, 'ona_page_layout', FALSE );

		if ( isset( $layout[0] ) && $layout[0] == 'leftbar' )
		{
			return TRUE;
		}

		return FALSE;
	}

	public function has_right_side_bar()
	{
		/** @var \WP_Post $post */
		global $post;

		$layout = get_post_meta( $post->ID, 'ona_page_layout', FALSE );

		if ( isset( $layout[0] ) && $layout[0] == 'rightbar' )
		{
			return TRUE;
		}

		return FALSE;
	}

	/**
	 * @param $menu
	 *
	 * @return MenuItem[]
	 */
	public function get_menu_items( $menu )
	{
		/** @var MenuItem[] $menu_items */
		$menu_items = array();

		$menu_locations = get_nav_menu_locations();
		$menu = $menu_locations[ $menu ];
		$menus = wp_get_nav_menu_items( $menu );

		if ( $menus !== FALSE )
		{
			/** @var \WP_Post $menu*/

			foreach ( $menus as $menu )
			{
				$menu_item = new MenuItem;
				$menu_item
					->setTitle( $menu->title )
					->setUrl( $menu->url );

				if ( $menu->menu_item_parent == 0 )
				{
					$menu_items[ $menu->ID ] = $menu_item;
				}
				elseif ( array_key_exists( $menu->menu_item_parent, $menu_items ) )
				{
					$menu_items[ $menu->menu_item_parent ]->addChild( $menu_item );
				}
			}
		}

		return $menu_items;
	}

	public function admin_menus()
	{
		add_menu_page( 'A Legeacy Genetics', 'A Legacy Genetics', 'manage_options', 'a_legacy_genetics', array( $this, 'print_settings_page' ), 'dashicons-awards' );
		add_submenu_page( 'a_legacy_genetics', 'General Settings', 'General Settings', 'manage_options', 'a_legacy_genetics' );
		add_submenu_page('a_legacy_genetics', 'ONA White Angus Bulls', 'ONA White Angus Bulls', 'manage_options', 'edit.php?post_type=alg_white_angus_bull');
		add_submenu_page('a_legacy_genetics', 'Gyrolondo Bulls', 'Gyrolondo Bulls', 'manage_options', 'edit.php?post_type=alg_gyrolondo_bull');
		//add_submenu_page( 'a_legacy_genetics', 'Homepage Boxes', 'Homepage Boxes', 'manage_options', 'a_legacy_genetics_homepage_boxes', array( $this, 'print_homepage_boxes_page' ) );
		//add_submenu_page( 'a_legacy_genetics', 'Hover Cow', 'Hover Cow', 'manage_options', 'a_legacy_genetics_hover_cow', array( $this, 'print_hover_cow_page' ) );
		//add_submenu_page( 'a_legacy_genetics', 'Members', 'Members', 'manage_options', 'a_legacy_genetics_members', array( $this, 'print_members_page' ) );
	}

	public function print_settings_page()
	{
		include( dirname( dirname( __DIR__ ) ) . '/includes/settings.php' );
	}

	public function print_homepage_boxes_page()
	{
		include( dirname( dirname( __DIR__ ) ) . '/includes/homepage_boxes.php' );
	}

	public function print_hover_cow_page()
	{
		include( dirname( dirname( __DIR__ ) ) . '/includes/hover_cow.php' );
	}

	public function print_members_page()
	{
		include( dirname( dirname( __DIR__ ) ) . '/includes/members.php' );
	}

	public function register_settings()
	{
		register_setting( 'a_legacy_genetics_settings', HoverCow::OPTION_NAME );
		register_setting( 'a_legacy_genetics_settings', HomepageBox::OPTION_NAME );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_ADDRESS );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_PHONE );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_FACEBOOK );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_TWITTER );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_INSTAGRAM );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_YOUTUBE );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_GOOGLE );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_CALL_TO_ACTION );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_CALL_TO_ACTION_SUB );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_PURCHASE_LINK );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_LIFETIME_FEE );
		register_setting( 'a_legacy_genetics_settings', self::OPTION_ANNUAL_FEE );
	}

	public function getAddress( $nl2br = TRUE )
	{
		if ( $nl2br )
		{
			return nl2br( get_option( self::OPTION_ADDRESS, '' ) );
		}

		return get_option( self::OPTION_ADDRESS, '' );
	}

	public function getPhoneNumber( $numbers_only = FALSE )
	{
		if ( $numbers_only )
		{
			return preg_replace( '/[^0-9]/', '', get_option( self::OPTION_PHONE, '' ) );
		}

		return get_option( self::OPTION_PHONE, '' );
	}

	public function getFacebookLink()
	{
		return self::addHttp( get_option( self::OPTION_FACEBOOK, '' ) );
	}

	public function getTwitterLink()
	{
		return self::addHttp( get_option( self::OPTION_TWITTER, '' ) );
	}

	public function getInstagramLink()
	{
		return self::addHttp( get_option( self::OPTION_INSTAGRAM, '' ) );
	}

	public function getYouTubeLink()
	{
		return self::addHttp( get_option( self::OPTION_YOUTUBE, '' ) );
	}

	public function getGooglePlusLink()
	{
		return self::addHttp( get_option( self::OPTION_GOOGLE, '' ) );
	}

	public static function addHttp( $link )
	{
		if ( strlen( $link ) > 0 && strtolower( substr( $link, 0 , 4 ) ) != 'http' )
		{
			$link = 'http://' . $link;
		}

		return $link;
	}

	public function hasSocialLinks()
	{
		return ( strlen( $this->getFacebookLink() . $this->getTwitterLink() . $this->getInstagramLink() . $this->getYouTubeLink() . $this->getGooglePlusLink() ) > 0 );
	}

	public function getCallToAction()
	{
		return get_option( self::OPTION_CALL_TO_ACTION, '' );
	}

	public function getCallToActionSub()
	{
		return get_option( self::OPTION_CALL_TO_ACTION_SUB, '' );
	}

	public function getPurchaseLink()
	{
		return get_option( self::OPTION_PURCHASE_LINK, '' );
	}

	public function getLifetimeFee()
	{
		$fee = get_option( self::OPTION_LIFETIME_FEE, '' );
		if ( strlen( $fee ) > 0 )
		{
			$fee = preg_replace( '/[^0-9.]*/', '', $fee );
		}

		return $fee;
	}

	public function getAnnualFee()
	{
		$fee =  get_option( self::OPTION_ANNUAL_FEE, '' );
		if ( strlen( $fee ) > 0 )
		{
			$fee = preg_replace( '/[^0-9.]*/', '', $fee );
		}

		return $fee;
	}

	public function short_code( $attributes )
	{
		$this->attributes = shortcode_atts( array(
			'page' => ''
		), $attributes );

		ob_start();
		include( dirname( dirname( __DIR__ ) ) . '/includes/shortcode.php' );
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}

	public function getAttribute( $key )
	{
		if ( array_key_exists( $key, $this->attributes ) )
		{
			return $this->attributes[ $key ];
		}

		return '';
	}

	public function add_favicon()
	{
		echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/img/favicon.ico">';
	}

	public function add_to_querystring( array $args, $remove_old_query_string=FALSE )
	{
		$url = $_SERVER['REQUEST_URI'];
		$parts = explode( '?', $url );
		$url = $parts[0];
		$querystring = array();
		if ( count( $parts ) > 1 )
		{
			$parts = explode( '&', $parts[1] );
			foreach ( $parts as $part )
			{
				if ( ! $remove_old_query_string || substr( $part, 0, 3 ) == 'id=' )
				{
					$querystring[] = $part;
				}
			}
		}

		foreach ( $args as $key => $val )
		{
			$querystring[] = $key . '=' . $val;
		}

		return $url . ( ( count( $querystring ) > 0 ) ? '?' . implode( '&', $querystring ) : '' );
	}

	public function form_capture()
	{
		if ( isset( $_POST['a_legacy_genetics_action'] ) )
		{
			if ( isset( $_POST['a_legacy_genetics_nonce'] ) && wp_verify_nonce( $_POST['a_legacy_genetics_nonce'], 'a_legacy_genetics_' . $_POST['a_legacy_genetics_action'] ) )
			{
				switch ( $_POST['a_legacy_genetics_action'] )
				{
					case 'signup':

						$current_user = wp_get_current_user();

						if ( strlen( $_POST['email'] ) == 0 )
						{
							$this->addError( 'Please enter your email address.' );
						}
						elseif ( ! is_email( $_POST['email'] ) )
						{
							$this->addError( 'Please enter a valid email address.' );
						}
						elseif ( email_exists( $_POST['email'] ) )
						{
							if ( ! is_user_logged_in() || strtolower( $current_user->user_email ) != strtolower( $_POST['email'] ) )
							{
								$this->addError( 'The email address you entered already exists in our registry.' );
							}
						}

						if ( ! is_user_logged_in() )
						{
							if ( 4 > strlen( $_POST['username'] ) )
							{
								$this->addError( 'Username too short. At least 4 characters is required.' );
							}
							elseif ( username_exists( $_POST['username'] ) )
							{
								$this->addError( 'Sorry, that username already exists.' );
							}
							elseif ( ! validate_username( $_POST['username'] ) )
							{
								$this->addError( 'Sorry, the username you entered is not valid.' );
							}

							if ( 5 > strlen( $_POST['password'] ) )
							{
								$this->addError( 'Password length must be greater than 5.' );
							}
						}

						if ( strlen( $_POST['fname'] ) == 0 )
						{
							$this->addError( 'Please enter your first name.' );
						}

						if ( strlen( $_POST['lname'] ) == 0 )
						{
							$this->addError( 'Please enter your last name.' );
						}

						if ( strlen( $_POST['address'] ) == 0 )
						{
							$this->addError( 'Please enter your address.' );
						}

						if ( strlen( $_POST['city'] ) == 0 )
						{
							$this->addError( 'Please enter your city.' );
						}

						if ( strlen( $_POST['state'] ) == 0 )
						{
							$this->addError( 'Please enter your state.' );
						}

						if ( strlen( $_POST['zip'] ) == 0 )
						{
							$this->addError( 'Please enter your zip code.' );
						}

						if ( strlen( $_POST['phone'] ) == 0 )
						{
							$this->addError( 'Please enter your phone number.' );
						}

						if ( count( $this->getErrors() ) == 0 )
						{
							$member = new Member;
							$member
								->setFirstName( $_POST['fname'] )
								->setLastName( $_POST['lname'] )
								->setEmail( $_POST['email'] )
								->setFarmName( $_POST['farm_name'] )
								->setAddress( $_POST['address'] )
								->setCity( $_POST['city'] )
								->setState( $_POST['state'] )
								->setZip( $_POST['zip'] )
								->setPhone( $_POST['phone'] );


							if ( is_user_logged_in() )
							{
								$member->setWpUserId( get_current_user_id() );
							}
							else
							{
								$user_data = array(
									'user_login' => $_POST['username'],
									'user_email' => $_POST['email'],
									'user_pass'  => $_POST['password'],
									'first_name' => $_POST['fname'],
									'last_name'  => $_POST['lname']
								);
								$user_id = wp_insert_user( $user_data );
								$member->setWpUserId( $user_id );
							}

							$member->create();

							header( 'Location:' . $this->add_to_querystring( array( 'action' => 'signedup' ), TRUE ) );
							exit;
						}

						break;

				}
			}
			else
			{
				$this->addError( 'It appears you are submitting this form from a different website' );
			}
		}
	}
}