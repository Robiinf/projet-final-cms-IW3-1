<?php
//include comments.php
/* include 'comments.php'; */
include 'inc/search.php';
include 'inc/commentForm.php';

// SETUP THEME
add_action( 'after_setup_theme', 'setup_theme', 0);
function setup_theme(){
	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'widgets' );

	// MENU
	register_nav_menu( 'main-menu', 'Menu principal' );	
}

add_action( 'wp_enqueue_scripts', 'enqueue_assets', 1);
function enqueue_assets(){
	wp_enqueue_style('main', get_stylesheet_uri());
}

// WIDGETS SIDE BAR
add_action( 'widgets_init', 'theme_register_sidebar' );
function theme_register_sidebar(){
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'description' => 'Sidebar pour la page blog',
		'before_widget' => '<div>',
		'after_widget' => '</div> g',
	) );
}

add_action( 'widgets_init', 'wpm_remove_default_widgets' );

function wpm_remove_default_widgets() {

  unregister_widget( 'WP_Widget_Pages' ); // Le widget Pages
  unregister_widget( 'WP_Widget_Calendar' ); // Le widget Calendrier
  unregister_widget( 'WP_Widget_Archives' ); // Le widget Archives
  unregister_widget( 'WP_Widget_Meta' ); // Le widget Meta
  unregister_widget( 'WP_Widget_Search' ); // Le widget Rechercher
  unregister_widget( 'WP_Widget_Text' ); // Le widget de texte
  unregister_widget( 'WP_Widget_Media_Audio' ); // Le widget Audio
  unregister_widget( 'WP_Widget_Media_Image' ); // Le widget Image
  unregister_widget( 'WP_Widget_Media_Video' ); // Le widget Vidéo
  unregister_widget( 'WP_Widget_Custom_HTML' ); // Le widget HTML personnalisé
  unregister_widget( 'WP_Widget_Categories' ); // Le widget catégories
  unregister_widget( 'WP_Widget_Recent_Posts' ); // Le widget articles récents
  unregister_widget( 'WP_Widget_Recent_Comments' ); // Le widget Commentaires récents
  unregister_widget( 'WP_Widget_RSS' ); // Le widget RSS
  unregister_widget( 'WP_Widget_Tag_Cloud' ); // Le widget nuage d'étiquettes
  unregister_widget( 'WP_Nav_Menu_Widget' ); // Le widget menu personnalisé
}


// THEME CUSTOMIZER
add_action( 'customize_register', 'theme_customize_register' );
function theme_customize_register($wp_customize){

	// Ajout du panel custom
	$wp_customize->add_panel( 'panel_theme_custom', array(
		'title' =>  'Réglages theme',
		'description' => 'Modifiez les paramètres du thème',
		'priority' => 1,
	) );
	
	// Ajout des sections custom
	$wp_customize->add_section( 'section_home_custom', array(
		'title' =>  'Réglages Page d\'Accueil',
		'description' => 'Modifiez les paramètres de la page d\'accueil',
		'priority' => 1,
		'panel' => 'panel_theme_custom',
	) ); 

	$wp_customize->add_section( 'about_us_component_custom', array(
		'title' =>  'Réglages component About us',
		'description' => 'Modifiez le component about us',
		'priority' => 2,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( 'services_list_custom', array(
		'title' =>  'Réglages Services',
		'description' => 'Modifiez la liste des services',
		'priority' => 3,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( 'partners_list_custom', array(
		'title' =>  'Réglages Partners',
		'description' => 'Modifiez la liste des partenaires',
		'priority' => 4,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( 'team_list_custom', array(
		'title' =>  'Réglages Team',
		'description' => 'Modifiez la liste des membres de l\'équipe',
		'priority' => 5,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( 'page_contact_custom', array(
		'title' =>  'Réglages Contacts',
		'description' => 'Modifiez les paramètres de la page contact',
		'priority' => 6,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( 'contact_form_custom', array(
		'title' =>  'Réglages Contact Form',
		'description' => 'Modifiez les paramètres du formulaire de contact',
		'priority' => 7,
		'panel' => 'panel_theme_custom',
	));

	$wp_customize->add_section( 'search_page_custom', array(
		'title' =>  'Réglages Page recherche',
		'description' => 'Modifiez les paramètres de la page de recherche',
		'priority' => 8,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( '404_page_custom', array(
		'title' =>  'Réglages Page 404',
		'description' => 'Modifiez les paramètres de la page 404',
		'priority' => 9,
		'panel' => 'panel_theme_custom',
	) );

	$wp_customize->add_section( 'section_footer', array(
		'title' =>  'Réglages Footer',
		'description' => 'Modifiez les paramètres du footer',
		'priority' => 10,
		'panel' => 'panel_theme_custom',
	) );

	// Ajout des reglages

	// FOOTER
	$wp_customize->add_setting( 'footer_logo', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/logo-white.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'contact_job_1', array(
		'type' => 'theme_mod',
		'default' => 'Manager',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'contact_job_1_tel', array(
		'type' => 'theme_mod',
		'default' => '+33 1 53 31 25 23',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'contact_job_1_mail', array(
		'type' => 'theme_mod',
		'default' => 'info@esgi.com',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'contact_job_2', array(
		'type' => 'theme_mod',
		'default' => 'CEO',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'contact_job_2_tel', array(
		'type' => 'theme_mod',
		'default' => '+33 1 53 31 25 25',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'contact_job_2_mail', array(
		'type' => 'theme_mod',
		'default' => 'ceo@company.com',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'footer_copyright', array(
		'type' => 'theme_mod',
		'default' => '2022  Figma Template by ESGI',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting('footer_url_linkedin', array(
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'default' => false,
  		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_setting('footer_url_facebook', array(
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'default' => false,
  		'sanitize_callback' => 'esc_url_raw',
	));


	// HOME INTRO
	$wp_customize->add_setting( 'main_title', array(
		'type' => 'theme_mod',
		'default' => 'A really professional structure for all your events!',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	// ABOUT US 
	$wp_customize->add_setting( 'abous_us_title', array(
		'type' => 'theme_mod',
		'default' => 'About us',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'abous_us_content', array(
		'type' => 'theme_mod',
		'default' => 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution. ',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'about_us_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/2.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'who_are_we_title', array(
		'type' => 'theme_mod',
		'default' => 'Who are we?',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'who_are_we_content', array(
		'type' => 'theme_mod',
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu convallis elit, at convallis magna.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting('our_vision_title', array(
		'type' => 'theme_mod',
		'default' => 'Our vision',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('our_vision_content', array(
		'type' => 'theme_mod',
		'default' => 'Nullam faucibus interdum massa. Duis eget leo mattis, pulvinar nisi et, consequat lectus. Suspendisse commodo magna orci, id luctus risus porta pharetra. Fusce vehicula aliquet urna non ultricies.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('our_mission_title', array(
		'type' => 'theme_mod',
		'default' => 'Our mission',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('our_mission_content', array(
		'type' => 'theme_mod',
		'default' => 'Vivamus et viverra neque, ut pharetra ipsum. Aliquam eget consequat libero, quis cursus tortor. Aliquam suscipit eros sit amet velit malesuada dapibus. Fusce in vehicula tellus. Donec quis lorem ut magna tincidunt egestas.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	// SERVICES
	$wp_customize->add_setting('our_services_title', array(
		'type' => 'theme_mod',
		'default' => 'Our Services',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting( 'service1_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/12.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'service2_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/11.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'service3_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/12.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'service4_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/3.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'service1_title', array(
		'type' => 'theme_mod',
		'default' => 'Corp. Parties',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'service1_content', array(
		'type' => 'theme_mod',
		'default' => 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	// PARTNERS
	$wp_customize->add_setting('our_partners_title', array(
		'type' => 'theme_mod',
		'default' => 'Our Partners',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting( 'partner1_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/partner-1.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'partner2_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/partner-2.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'partner3_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/partner-3.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'partner4_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/partner-4.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'partner5_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/partner-5.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'partner6_image', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/svg/partner-6.svg',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	

	// TEAM
	$wp_customize->add_setting('team_section_title', array(
		'type' => 'theme_mod',
		'default' => 'Our Team',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting( 'team_member1_img', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/5.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'team_member2_img', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/6.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'team_member3_img', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/7.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );
	$wp_customize->add_setting( 'team_member4_img', array(
		'type' => 'theme_mod',
		'default' => get_template_directory_uri() . '/assets/images/png/8.png',
		'sanitize_callback' => 'sanitize_url',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting('team_member1_position', array(
		'type' => 'theme_mod',
		'default' => 'Sales Manager',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member2_position', array(
		'type' => 'theme_mod',
		'default' => 'Event planner',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member3_position', array(
		'type' => 'theme_mod',
		'default' => 'Designer',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member4_position', array(
		'type' => 'theme_mod',
		'default' => 'CEO',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member1_tel', array(
		'type' => 'theme_mod',
		'default' => '+33 1 53 31 25 23',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member2_tel', array(
		'type' => 'theme_mod',
		'default' => '+33 1 53 31 25 24',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member3_tel', array(
		'type' => 'theme_mod',
		'default' => '+33 1 53 31 25 20',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member4_tel', array(
		'type' => 'theme_mod',
		'default' => '+33 1 53 31 25 25',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member1_mail', array(
		'type' => 'theme_mod',
		'default' => 'sales@company.com',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member2_mail', array(
		'type' => 'theme_mod',
		'default' => 'plan@company.com',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member3_mail', array(
		'type' => 'theme_mod',
		'default' => 'design@company.com',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('team_member4_mail', array(
		'type' => 'theme_mod',
		'default' => 'ceo@company.com',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	));

	// CONTACT

	$wp_customize->add_setting( 'contact_content', array(
		'type' => 'theme_mod',
		'default' => 'A desire for a big big party or a very select congress ? Contact us.',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'contact_content', array(
		'type' => 'theme_mod',
		'default' => 'A desire for a big big party or a very select congress ? Contact us.',
		'sanitize_callback' => 'sanitize_textarea_field',
		'transport' => 'refresh',
	) );
	
	$wp_customize->add_setting( 'contact_location', array(
		'type' => 'theme_mod',
		'default' => 'Location',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'contact_location_address', array(
		'type' => 'theme_mod',
		'default' => '242 Rue du Faubourg Saint-Antoine',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'contact_location_city', array(
		'type' => 'theme_mod',
		'default' => '75020 Paris FRANCE',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	// CONTACT FORM

	$wp_customize->add_setting( 'form_title', array(
		'type' => 'theme_mod',
		'default' => 'Write us here',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'form_subtitle', array(
		'type' => 'theme_mod',
		'default' => 'Go! Don\'t be shy.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'placeholder_subjet', array(
		'type' => 'theme_mod',
		'default' => 'Subject',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'placeholder_email', array(
		'type' => 'theme_mod',
		'default' => 'Email',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'placeholder_phone', array(
		'type' => 'theme_mod',
		'default' => 'Phone no.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'placeholder_message', array(
		'type' => 'theme_mod',
		'default' => 'Message',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'text_submit_button', array(
		'type' => 'theme_mod',
		'default' => 'Submit',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	// SEARCH PAGE

	$wp_customize->add_setting( 'resultat_recherche', array(
		'type' => 'theme_mod',
		'default' => 'Search results for: ',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'text_case_no_result', array(
		'type' => 'theme_mod',
		'default' => 'No result.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	// 404 PAGE

	$wp_customize->add_setting( 'text_404', array(
		'type' => 'theme_mod',
		'default' => '404 Error.',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'text_404_subtitle', array(
		'type' => 'theme_mod',
		'default' => 'The page you were looking for couldn\'t be found. Maybe try a search?',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'refresh',
	) );


	// Ajout des controles

	// FOOTER
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
		'label' => __( 'Logo footer' ),
		'section' => 'section_footer',
		'settings' => 'footer_logo',
	) ) );

	$wp_customize->add_control('footer_copyright', array(
		'type' => 'text',
		'section' => 'section_footer',
		'label' => __( 'Copyright' ),
	));
	$wp_customize->add_control( 'footer_url_linkedin', array(
		'type' => 'url',
		'section' => 'section_footer',
		'label' => __( 'URL du compte linkedin.' ),
	));
	$wp_customize->add_control( 'footer_url_facebook', array(
		'type' => 'url',
		'section' => 'section_footer',
		'label' => __( 'URL du compte facebook.' ),
	));

	// HOME

	// INTRO
	$wp_customize->add_control( 'main_title', array(
		'type' => 'text',
		'section' => 'section_home_custom',
		'label' => __( 'Titre principal' ),
	  ) );

	// ABOUT US
	$wp_customize->add_control( 'abous_us_title', array(
		'type' => 'text',
		'section' => 'about_us_component_custom',
		'label' => __( 'Titre de la section "About us"' ),
	  ) );

	$wp_customize->add_control( 'abous_us_content', array(
		'type' => 'textarea',
		'section' => 'about_us_component_custom',
		'label' => __( 'Contenu de la section "About us"' ),
	  ) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_us_image', array(
		'label' => __( 'Image de la section "About us"' ),
		'section' => 'about_us_component_custom',
		'settings' => 'about_us_image',
	) ) );

	$wp_customize->add_control( 'who_are_we_title', array(
		'type' => 'text',
		'section' => 'about_us_component_custom',
		'label' => __( 'Titre de la sous section "Who are we?"' ),
	  ) );
	
	$wp_customize->add_control( 'who_are_we_content', array(
		'type' => 'textarea',
		'section' => 'about_us_component_custom',
		'label' => __( 'Contenu de la sous section "Who are we?"' ),
	  ) );

	$wp_customize->add_control( 'our_vision_title', array(
		'type' => 'text',
		'section' => 'about_us_component_custom',
		'label' => __( 'Titre de la sous section "Our Vision"' ),
	  ) );

	$wp_customize->add_control( 'our_vision_content', array(
		'type' => 'textarea',
		'section' => 'about_us_component_custom',
		'label' => __( 'Contenu de la sous section "Our Vision"' ),
	  ) );

	$wp_customize->add_control( 'our_mission_title', array(
		'type' => 'text',
		'section' => 'about_us_component_custom',
		'label' => __( 'Titre de la sous section "Our Mission"' ),
	  ) );

	$wp_customize->add_control( 'our_mission_content', array(
		'type' => 'textarea',
		'section' => 'about_us_component_custom',
		'label' => __( 'Contenu de la sous section "Our Mission"' ),
	  ) );

	// SERVICES
	$wp_customize->add_control( 'our_services_title', array(
		'type' => 'text',
		'section' => 'services_list_custom',
		'label' => __( 'Titre de la section "Services"' ),
	  ) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service1_image', array(
		'label' => __( 'Image Service 1' ),
		'section' => 'services_list_custom',
		'settings' => 'service1_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service2_image', array(
		'label' => __( 'Image Service 2' ),
		'section' => 'services_list_custom',
		'settings' => 'service2_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service3_image', array(
		'label' => __( 'Image Service 3' ),
		'section' => 'services_list_custom',
		'settings' => 'service3_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service4_image', array(
		'label' => __( 'Image Service 4' ),
		'section' => 'services_list_custom',
		'settings' => 'service4_image',
	) ) );

	$wp_customize->add_control( 'service1_title', array(
		'type' => 'text',
		'section' => 'services_list_custom',
		'label' => __( 'Titre Service 1' ),
	  ) );

	$wp_customize->add_control( 'service1_content', array(
		'type' => 'textarea',
		'section' => 'services_list_custom',
		'label' => __( 'Contenu Service 1' ),
	  ) );
	

	// PARTNERS
	$wp_customize->add_control( 'our_partners_title', array(
		'type' => 'text',
		'section' => 'partners_list_custom',
		'label' => __( 'Titre de la section "Partners"' ),
	  ) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'partner1_image', array(
		'label' => __( 'Image Partner 1' ),
		'section' => 'partners_list_custom',
		'settings' => 'partner1_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'partner2_image', array(
		'label' => __( 'Image Partner 2' ),
		'section' => 'partners_list_custom',
		'settings' => 'partner2_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'partner3_image', array(
		'label' => __( 'Image Partner 3' ),
		'section' => 'partners_list_custom',
		'settings' => 'partner3_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'partner4_image', array(
		'label' => __( 'Image Partner 4' ),
		'section' => 'partners_list_custom',
		'settings' => 'partner4_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'partner5_image', array(
		'label' => __( 'Image Partner 5' ),
		'section' => 'partners_list_custom',
		'settings' => 'partner5_image',
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'partner6_image', array(
		'label' => __( 'Image Partner 6' ),
		'section' => 'partners_list_custom',
		'settings' => 'partner6_image',
	) ) );

	// TEAM

	$wp_customize->add_control( 'team_section_title', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Titre de la section "Our Team"' ),
	  ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'team_member1_img', array(
		'label' => __( 'Image Member 1' ),
		'section' => 'team_list_custom',
		'settings' => 'team_member1_img',
	) ) );

	$wp_customize->add_control( 'team_member1_position', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Poste du membre 1' ),
	  ) );

	$wp_customize->add_control( 'team_member1_tel', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Téléphone du membre 1' ),
	  ) );
	
	$wp_customize->add_control( 'team_member1_mail', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Mail du membre 1' ),
	  ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'team_member2_img', array(
		'label' => __( 'Image Member 2' ),
		'section' => 'team_list_custom',
		'settings' => 'team_member2_img',
	) ) );

	$wp_customize->add_control( 'team_member2_position', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Poste du membre 2' ),
	  ) );

	$wp_customize->add_control( 'team_member2_tel', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Téléphone du membre 2' ),
	  ) );

	$wp_customize->add_control( 'team_member2_mail', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Mail du membre 2' ),
	  ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'team_member3_img', array(
		'label' => __( 'Image Member 3' ),
		'section' => 'team_list_custom',
		'settings' => 'team_member3_img',
	) ) );

	$wp_customize->add_control( 'team_member3_position', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Poste du membre 3' ),
	  ) );

	$wp_customize->add_control( 'team_member3_tel', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Téléphone du membre 3' ),
	  ) );

	$wp_customize->add_control( 'team_member3_mail', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Mail du membre 3' ),
	  ) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'team_member4_img', array(
		'label' => __( 'Image Member 4' ),
		'section' => 'team_list_custom',
		'settings' => 'team_member4_img',
	) ) );

	$wp_customize->add_control( 'team_member4_position', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Poste du membre 4' ),
	  ) );

	$wp_customize->add_control( 'team_member4_tel', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Téléphone du membre 4' ),
	  ) );

	$wp_customize->add_control( 'team_member4_mail', array(
		'type' => 'text',
		'section' => 'team_list_custom',
		'label' => __( 'Mail du membre 4' ),
	  ) );

	// CONTACT

	$wp_customize->add_control( 'contact_content', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Contenu sous-titre contact' ),
	  ) );

	$wp_customize->add_control('contact_location', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Titre Location' ),
	));

	$wp_customize->add_control('contact_location_address', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Adresse Location' ),
	));

	$wp_customize->add_control('contact_location_city', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Location City' ),
	));

	$wp_customize->add_control('contact_job_1', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Job 1' ),
	));
	$wp_customize->add_control('contact_job_1_tel', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Tel Job 1' ),
	));
	$wp_customize->add_control('contact_job_1_mail', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Mail Job 1' ),
	));

	$wp_customize->add_control('contact_job_2', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Job 2' ),
	));
	$wp_customize->add_control('contact_job_2_tel', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Tel Job 2' ),
	));
	$wp_customize->add_control('contact_job_2_mail', array(
		'type' => 'text',
		'section' => 'page_contact_custom',
		'label' => __( 'Mail Job 2' ),
	));

	// CONTACT FORM

	$wp_customize->add_control('form_title', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Titre Formulaire' ),
	));

	$wp_customize->add_control('form_subtitle', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Sous-titre Formulaire' ),
	));

	$wp_customize->add_control('placeholder_subjet', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Placeholder Subject' ),
	));

	$wp_customize->add_control('placeholder_email', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Placeholder Email' ),
	));

	$wp_customize->add_control('placeholder_phone', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Placeholder Phone' ),
	));

	$wp_customize->add_control('placeholder_message', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Placeholder Message' ),
	));

	$wp_customize->add_control('text_submit_button', array(
		'type' => 'text',
		'section' => 'contact_form_custom',
		'label' => __( 'Text submit button' ),
	));

	// SEARCH PAGE

	$wp_customize->add_control('resultat_recherche', array(
		'type' => 'text',
		'section' => 'search_page_custom',
		'label' => __( 'Titre Search Page' ),
	));

	$wp_customize->add_control('text_case_no_result', array(
		'type' => 'text',
		'section' => 'search_page_custom',
		'label' => __( 'Texte No result' ),
	));

	// 404 PAGE

	$wp_customize->add_control('text_404', array(
		'type' => 'text',
		'section' => '404_page_custom',
		'label' => __( 'Titre 404' ),
	));

	$wp_customize->add_control('text_404_subtitle', array(
		'type' => 'text',
		'section' => '404_page_custom',
		'label' => __( 'Sous-titre 404' ),
	));
	
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

	global $wp_version;
	if ( $wp_version !== '4.7.1' ) {
	   return $data;
	}
  
	$filetype = wp_check_filetype( $filename, $mimes );
  
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  
  }, 10, 4 );
  
  function wppln_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter( 'upload_mimes', 'wppln_mime_types' );
  
  function wppln_fix_svg() {
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
  }
  add_action( 'admin_head', 'wppln_fix_svg' );