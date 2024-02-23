<?php



return [

	/*
	* Version of W3cms
	*/
	'version' => '2.0',

	/*
	* Default Image for user and category
	*/
	'user_default_img' => env('ASSET_URL').'/images/no-user.png',
	'category_default_img' => env('ASSET_URL').'/images/no-category.png',

	/*
	* Usage for super admin condition
	*/
	'roles' => array(
		'admin' => 'Super Admin'
	),

	/*
	* Default translable language
	*/
	'available_langs' => [
	  'en' => 'English',
	  'ru' => 'Russian',
	  'fr' => 'French',
	  'hi' => 'Hindi',

	],

	/*
	|--------------------------------------------------------------------------
	| Permalink Option Format
	|--------------------------------------------------------------------------
	|
	| These configuration options determine permalink option.
	|
	*/
	'routesType' => array(
			'Plain'             => '',
			'DayName'           => '/%year%/%month%/%day%/%slug%/',
			'MonthName'         => '/%year%/%month%/%slug%/',
			'Numeric'           => '/archives/%post_id%',
			'PostName'          => '/%slug%/',
			'CustomeStructure'  => 'custom',
		    ),


	'post_formats' => array(
			'0' 		=> 'Standard',
						'aside' 	=> 'Aside',
						'chat' 		=> 'Chat',
						'gallery' 	=> 'Gallery',
						'link' 		=> 'Link',
						'image' 	=> 'Image',
						'quote' 	=> 'Quote',
						'status' 	=> 'Status',
						'video' 	=> 'Video',
						'audio' 	=> 'Audio',

		    ),

	/*
	|--------------------------------------------------------------------------
	| Discussion Comment Cookie
	|--------------------------------------------------------------------------
	|
	| These configuration options determine hash cookie.
	|
	*/
	'comment_cookie_hash' => md5(env('APP_URL')),

	'Placeholder'   => array(
				'User' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'name'=>array('placeholder'=>'#FULLNAME#','guideline'=>'Firstname can display with this placeholder.'),
					'email'=>array('placeholder'=>'#EMAIL#','guideline'=>'Firstname can display with this placeholder.'),
					'firstname'=>array('placeholder'=>'#FIRSTNAME#','guideline'=>'Firstname can display with this placeholder.'),
					'lastname'=>array('placeholder'=>'#LASTNAME#','guideline'=>'Lastname can display with this placeholder.'),
					'password'=>array('placeholder'=>'#PASSWORD#','guideline'=>'password can display with this placeholder.'),
					'role'=>array('placeholder'=>'#ROLE#','guideline'=>'User role can display with this placeholder.'),
					'profile'=>array('placeholder'=>'#PROFILE#','guideline'=>'User profile can display with this placeholder.')
				),
				'Role' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'name'=>array('placeholder'=>'#NAME#','guideline'=>'Firstname can display with this placeholder.')
				),
				'Config' => array(
					'Site.title'=>array('placeholder'=>'#SITETITLE#','guideline'=>'Site title can display with this placeholder.'),
					'Site.link'=>array('placeholder'=>'#SITELINK#','guideline'=>'Site link can display with this placeholder.'),
					'Site.admin_email'=>array('placeholder'=>'#ADMINEMAIL#','guideline'=>'Admin email can display with this placeholder.'),
					'Site.support_email'=>array('placeholder'=>'#SUPPORTEMAIL#','guideline'=>'Support email can display with this placeholder.'),
					'Site.company_address'=>array('placeholder'=>'#SITEADDRESS#','guideline'=>'Site address can display with this placeholder.')
				),
				'Generate' => array(
					'activation_link'=>array('placeholder'=>'#ACTIVATIONLINK#','guideline'=>'Activation link can display with this placeholder.'),
					'site_logo'=>array('placeholder'=>'#SITELOGO#','guideline'=>'Site logo can display with this placeholder.'),
					'login_link' =>array('placeholder'=>'#LOGINLINK#','guideline'=>'Login link can display with this placeholder.'),
					'register_link' =>array('placeholder'=>'#REGESTERLINK#','guideline'=>'Registration link can display with this placeholder.')
				),
				'Contact' => array(
					'name'=>array('placeholder'=>'#NAME#','guideline'=>'Contact user name can display with this placeholder.'),
					'email'=>array('placeholder'=>'#EMAIL#','guideline'=>'Contact user email can display with this placeholder.'),
					'message'=>array('placeholder'=>'#MESSAGE#','guideline'=>'Contact user message can display with this placeholder.')
				),
				'Subscribe' => array(
					'name'=>array('placeholder'=>'#USERNAME#','guideline'=>'Subscribe user email can display with this placeholder.')
				),
				'Blog' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'title'=>array('placeholder'=>'#BLOGTITLE#','guideline'=>'Blog title can display with this placeholder.'),
					'content'=>array('placeholder'=>'#BLOGCONTENT#','guideline'=>'Blog content can display with this placeholder.'),
					'taxonomy_title'=>array('placeholder'=>'#TAXONOMYTITLE#','guideline'=>'Taxonomy title can display with this placeholder.'),
					'taxonomy_content'=>array('placeholder'=>'#TAXONOMYCONTENT#','guideline'=>'Taxonomy content can display with this placeholder.'),
					'post_type_title'=>array('placeholder'=>'#POSTTYPETITLE#','guideline'=>'Post type title can display with this placeholder.'),
					'post_type_content'=>array('placeholder'=>'#POSTTYPECONTENT#','guideline'=>'Post type content can display with this placeholder.'),
				),
				'Comment' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'comment'=>array('placeholder'=>'#BLOGCOMMENT#','guideline'=>'Blog comment can display with this placeholder.'),
					'title'=>array('placeholder'=>'#BLOGTITLE#','guideline'=>'Blog title can display with this placeholder.'),
				),
				'BlogCategory' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'title'=>array('placeholder'=>'#BLOGCATEGORYTITLE#','guideline'=>'Blog category title can display with this placeholder.'),
					'content'=>array('placeholder'=>'#BLOGCATEGORYCONTENT#','guideline'=>'Blog category content can display with this placeholder.'),
				),
				'BlogTag' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'title'=>array('placeholder'=>'#BLOGTAGTITLE#','guideline'=>'Blog tag title can display with this placeholder.'),
				),
				'Page' => array(
					'username'=>array('placeholder'=>'#USERNAME#','guideline'=>'Username can display with this placeholder.'),
					'title'=>array('placeholder'=>'#PAGETITLE#','guideline'=>'Page title can display with this placeholder.'),
					'content'=>array('placeholder'=>'#PAGECONTENT#','guideline'=>'Page content can display with this placeholder.'),
				)
		    ),

	/*
	|--------------------------------------------------------------------------
	| Super Admin Id
	|--------------------------------------------------------------------------
	|
	| These configuration options determine superadmin user id.
	|
	*/
	'superadmin' => '1',

	/* Admin theme layouts start */
	'dezThemeSet0' => array( /* Default Theme */
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'headerBg' => "color_1",
		'primary' => "color_1",
		'navheaderBg' => "color_1",
		'sidebarBg' => "color_1",
		'sidebarStyle' => "full",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet1' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_15",
		'headerBg' => "color_1",
		'navheaderBg' => "color_13",
		'sidebarBg' => "color_13",
		'sidebarStyle' => "full",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet2' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_7",
		'headerBg' => "color_1",
		'navheaderBg' => "color_7",
		'sidebarBg' => "color_1",
		'sidebarStyle' => "modern",
		'sidebarPosition' => "static",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),


	'dezThemeSet3' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "horizontal",
		'primary' => "color_3",
		'headerBg' => "color_1",
		'navheaderBg' => "color_1",
		'sidebarBg' => "color_3",
		'sidebarStyle' => "full",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet4' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_9",
		'headerBg' => "color_9",
		'navheaderBg' => "color_9",
		'sidebarBg' => "color_1",
		'sidebarStyle' => "compact",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet5' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_7",
		'headerBg' => "color_1",
		'navheaderBg' => "color_7",
		'sidebarBg' => "color_7",
		'sidebarStyle' => "icon-hover",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet6' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_3",
		'headerBg' => "color_3",
		'navheaderBg' => "color_1",
		'sidebarBg' => "color_1",
		'sidebarStyle' => "mini",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet7' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_2",
		'headerBg' => "color_1",
		'navheaderBg' => "color_2",
		'sidebarBg' => "color_2",
		'sidebarStyle' => "mini",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),

	'dezThemeSet8' => array(
		'typography' => "poppins",
		'version' => "light",
		'layout' => "vertical",
		'primary' => "color_2",
		'headerBg' => "color_14",
		'navheaderBg' => "color_14",
		'sidebarBg' => "color_2",
		'sidebarStyle' => "full",
		'sidebarPosition' => "fixed",
		'headerPosition' => "fixed",
		'containerLayout' => "full",
		'direction' => 'ltr'
	),
	/* Admin theme layouts end */

	'themes_api' => 'https://w3cms.in/api/api/themes',
    'language_api' => 'https://w3cms.in/api/get-language-file/',
    'client_information_api' => 'https://w3cms.in/api/client-information-api/',
    'get_main_language_api' => 'http://192.168.29.205/w3cms/W3CMSMASTER/api/get-main-language-detail/',
    'language_detail_api' => 'http://192.168.29.205/w3cms/W3CMSMASTER/api/get-language-detail/',
];
