<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;
use App\Models\BlogCategory;

trait DzMeSettings {

    public $setting_config      = array();

    public function getAllSettings(){
        $default_settings       = $this->default_settings();
        $userdefined_settings   = $this->userdefined_settings();
        $this->setting_config = array_merge($default_settings, $userdefined_settings);

        return $this->setting_config;

    }

    public function getPostCategoryList(){
        $categories     = array();
        $blog_categories    = (new BlogCategory)->generateCategoryTreeArray(Null, "_", ['id', 'title', 'slug']);
        foreach ($blog_categories as $key => $value) {
            $categories[$value['slug']] =  $value['title'];
        }

        return $categories;
    }

    public function getAllPostTypes(){
        $all_cpt   = Blog::where('post_type', '=', config('w3cpt.post_type'))->pluck('title', 'slug')->toArray();
        return $all_cpt;
    }

    public function getPostTypeCategories($postType=''){

        $all_Categories = array();
        $taxonomyArr = array();

        if ($postType) {

            $blogObj = new \Modules\W3CPT\Entities\Blog;
            $cpt_taxonomies = $blogObj->getTaxonomiesByPostType($postType);
            if ($cpt_taxonomies) {
                foreach ($cpt_taxonomies as $value) {
                    $taxonomyArr[] = $value['cpt_tax_name'];
                }
            }
            return $all_Categories = \Modules\W3CPT\Entities\BlogCategory::whereIn('type', $taxonomyArr)->pluck('title', 'slug');
        }

        return $all_Categories;
    }

    public function getPostsList($post_type){
        $blogs = Blog::WherePublishBlog($post_type)->pluck('title', 'slug')->toArray();
        return $blogs;
    }

    public function getPagesList(){
        $pages = Page::pluck('title', 'id')->toArray();
        return $pages;
    }

    /*
     * default_settings
     */
    public function default_settings() {

        $teams_categories = $testimonial_categories = $services_categories = $all_cpt = $items = $categories = $pages = $blogs = array();
        $categories = $this->getPostCategoryList();
        $blogs = $this->getPostsList(config('blog.post_type'));
        $pages = $this->getPagesList();
        $all_cpt = $this->getAllPostTypes();

        $services_categories = $this->getPostTypeCategories('services');
        $testimonial_categories = $this->getPostTypeCategories('testimonials');
        $teams_categories = $this->getPostTypeCategories('teams');
        $portfolio_categories = $this->getPostTypeCategories('portfolios');

        $limit = config('Reading.nodes_per_page');

        $page_fields = $post_fields = array(
            'title' => 'Title',
            'excerpt' => 'Excerpt',
            'publish_on' => 'Publish On',
            'modified' => 'Modified Date',
            'created' => 'Created Date'
        );

        $more_posts_fields = array(
            'BlogTag' => 'Tags',
            'FeatureImage' => 'Feature Image',
            'BlogSeo' => 'Seo Content',
            'User' => 'Author Details'
        );

        $more_pages_fields = array(
            'FeatureImage' => 'Feature Image',
            'ContentSeo' => 'Seo Content',
            'User' => 'Author Details'
        );

        $orderby_options = array(
            'title' => 'Title',
            'publish_on' => 'Publish On',
            'created_at' => 'Created Date',
            'rand' => 'Random'
        );

        $background_options = array(
            'dark'  =>  'Dark',
            'light' =>  'Light',
            'white' =>  'White'
        );

        $order_options = array(
            'ASC' => 'Ascending',
            'DESC' => 'Descending',
            'RAND' => 'Random'
        );

        $social_icons = array(
            'facebook'  => 'Facebook',
            'instagram' => 'Instagram',
            'whatsapp'  => 'Whatsapp',
            'twitter'   => 'Twitter',
            'youtube'   => 'YouTube',
            'linkedin'  => 'LinkedIn',
            'reddit'    => 'Reddit',
            'pinterest' => 'Pinterest',
            'google'   => 'Google+'
        );


        /* w3cms default elements start */
        $default_settings['w3cms_post_element'] = array(
            'name' => 'Post Listing',
            'base' => 'w3cms_post_element',
            'class' => '',
            'category' => 'Global',
            'icon' => asset('/images/MagicEditor/theme-elements/global/list-items.png'),
            'description' => 'Shows Posts Listing.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "value"         => array(),
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Fields to Display",
                    "param_name"    => "post_fields",
                    "value"         => array(),
                    "options"       => $post_fields,
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "checkbox_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Display More Fields",
                    "param_name"    => 'contain_post_fields',
                    "value"         => array(),
                    "options"       => $more_posts_fields,
                    "group"         => 'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Pagination',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'number',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'value'         =>  array(),
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'value'         =>  array(),
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'value'         =>  array(),
                    'options'       =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['w3cms_page_element'] = array(
            'name' => 'Page Listing',
            'base' => 'w3cms_page_element',
            'class' => '',
            'category' => 'Global',
            'icon' => asset('/images/MagicEditor/theme-elements/global/page.png'),
            'description' => 'Shows Page.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Pages",
                    "param_name"    => 'page_ids',
                    "value"         => array(),
                    "options"       => $pages,
                    "description"    => "Note: If select nothing then show All Pages.",
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Page With Images Only',
                    'param_name'    => 'page_with_images',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Fields to Display",
                    "param_name"    => "page_fields",
                    "value"         => array(),
                    "options"       => $page_fields,
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "checkbox_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Display More Fields",
                    "param_name"    => 'contain_page_fields',
                    "options"         => $more_pages_fields,
                    "group"         => 'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Enable Pagination',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>    'textfield',
                    'heading'       =>    'No. of Pages Per Page',
                    'param_name'    =>    'No_of_pages',
                    'value'         =>    $limit,
                    'group'         =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'value'         =>  array(),
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'value'         =>  array(),
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'value'         =>  array(),
                    'options'       =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            ),
        );

        $default_settings['w3cms_category_element'] = array(
            'name' => 'Category Listing',
            'base' => 'w3cms_category_element',
            'class' => '',
            'category' => 'Global',
            'icon' => asset('/images/MagicEditor/theme-elements/global/categories.png'),
            'description' => 'Shows Categories.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'category_ids',
                    'value'         =>  array(),
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Category With Images Only',
                    'param_name'    => 'category_with_images',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Enable Pagination',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination Section'
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  'No. of Category Per Page',
                    'param_name'    =>  'no_of_category',
                    'value'         =>  $limit,
                    'group'         =>  'Pagination Section'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'value'         =>  array(),
                    'options'       =>  array(
                                            'title' => 'Title',
                                            'created_at' => 'Created Date',
                                            'rand' => 'Random'
                                        ),
                    'group'         =>  'Pagination Section'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'value'         =>  array(),
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination Section'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Pagination Section'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'value'         =>  array(),
                    'options'       =>  $pages,
                    'group'         =>  'Pagination Section',
                    'depend_on'     =>  'view_all'
                ),
            ),
        );

        $default_settings['w3cms_swiper_element'] = array(
            "name" => "Swiper Element",
            "base" => "w3cms_swiper_element",
            "class" => "",
            "category" => "Global",
            "icon" => asset("/images/MagicEditor/theme-elements/global/slider.png"),
            "description" => "Shows Swiper Banner.",
            "css" => "",
            "params" => array(
                array(
                    "type"          => "radio",
                    "class"         => "",
                    "heading"       => "Select Content Type",
                    "param_name"    => "content_type",
                    "options"       => array(
                                            "blog"      => "Post",
                                            "category"  => "Category",
                                            "cpt"       => "CPT - Custom Post Type",
                                            "upload"    => "Upload Images",
                                        ),
                    "group"         => "General"
                ),
                array(
                    "type"          => "dropdown_multi",
                    "class"         => "",
                    "heading"       => "Select Post Categories",
                    "param_name"    => "post_category_ids",
                    "value"         => array(),
                    "options"       => $categories,
                    "group"         => "General",
                    "depend_on"     => array(
                                        "content_type" => array(
                                            "value" => "blog",
                                            "operator" => "=="
                                            ),
                                        )
                ),
                array(
                    'type'        =>    'number',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'General',
                    "depend_on"   => array(
                                        "content_type" => array(
                                            "value" => "blog",
                                            "operator" => "=="
                                            ),
                                        )
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'value'         =>  array(),
                    'options'       =>  $orderby_options,
                    'group'         =>  'General',
                    "depend_on"     => array(
                                        "content_type" => array(
                                            "value" => "blog",
                                            "operator" => "=="
                                            ),
                                        )
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'value'         =>  array(),
                    'options'       =>  $order_options,
                    'group'         =>  'General',
                    "depend_on"     => array(
                                        "content_type" => array(
                                            "value" => "blog",
                                            "operator" => "=="
                                            ),
                                        )
                ),
                array(
                    "type"          => "dropdown_multi",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => "category_ids",
                    "options"       => $categories,
                    "group"         => "General",
                    "depend_on"     => array(
                                        "content_type" => array(
                                            "value" => "category",
                                             "operator" => "=="
                                            )
                                        )
                ),
                array(
                    "type"          => "attach_multiple_images",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select multiple Swiper Images",
                    "param_name"    => "swiper_images",
                    "description"   => "",
                    "group"         => "General",
                    "depend_on"     => array(
                                            "content_type" => array(
                                                "value" => "upload",
                                                 "operator" => "=="
                                                )

                                            )
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Post Type",
                    "param_name"    => "post_types",
                    "description"   => "",
                    "options"       => $all_cpt,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_cpt_categories',
                    "ajax_container"=> "post_type_catagoriesContainer",
                    "depend_on"     => array(
                                            "content_type" => array(
                                                "value" => "cpt",
                                                 "operator" => "=="
                                                )
                                            )
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Category of Post Type",
                    "param_name"    => "post_type_catagories",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "item_idsContainer",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "post_types"
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Items",
                    "param_name"    => "item_ids",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "post_type_catagories"
                ),

                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Height (in px)",
                    "param_name"    => "slider_height",
                    "value"         => "",
                    "description"    => "Note: slider container height in pexel(px) , Default - 400px, 0 for fullscreen.",
                    "group"         => "General"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Navigation (Next & Prev Buttons)",
                    "param_name"    => "navigation",
                    "value"         => "true",
                    "group"         => "Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Pagination",
                    "param_name"    =>  "pagination",
                    "options"         =>  array(
                                            ""      =>"No Pagination",
                                            "bullets"   =>"Pagination Bullets",
                                            "fraction"  =>"Pagination Fraction",
                                            "progressbar"  =>"Pagination Progress Bar",
                                        ),
                    "group"         =>  "Advance",
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Dynamic Bullets",
                    "param_name"    => "dynamic_bullets",
                    "value"         => "true",
                    "group"         => "Advance",
                    "description"   => "Note: it will only make Bullets pagination dynamic.",
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Show Scrollbar",
                    "param_name"    => "scrollbar",
                    "value"         => "true",
                    "description"   => "Note: Not Works fine when Loop is True",
                    "group"         => "Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "description"    => "Note: Add space between slides ( Default is 30px ).",
                    "group"         => "Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked ( Default is 1500ms )",
                    "depend_on"     => "auto_play",
                    "group"         => "Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Advance",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Slides Direction",
                    "param_name"    =>  "direction",
                    "value"         => "horizontal",
                    "options"         =>  array(
                                            "horizontal"=>"Horizontal",
                                            "vertical"  =>"Vertical",
                                        ),
                    "group"         =>  "Slide Related",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect ( Default is 4 ). ",
                    "group"         => "Slide Related"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slide Related"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slide Related"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slide Related",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "description"   => "Note: Default value is 1500ms ).",
                    "group"         => "Slide Related"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Thumb Slider",
                    "param_name"    => "thumb_slider",
                    "value"         => "true",
                    "description"   => "Note: Only works when Content Type is Upload Images.",
                    "group"         => "Slide Related"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Thumb Slider Per View",
                    "param_name"    => "thumb_slider_view",
                    "group"         => "Slide Related",
                    "depend_on"     => "thumb_slider",
                ),
            )
        );

        /* w3cms default elements end*/



        /* w3cms cryptozone elements start */

        $default_settings['cryptozone_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'cryptozone_page_banner',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['cryptozone_services_listing_1'] = array(
            'name' => 'Services Listing 1',
            'base' => 'cryptozone_services_listing_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/services_listing_1.png'),
            'description' => 'Shows Icon Box style 3.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services Category",
                    "param_name"    => "services_categories",
                    "description"   => "",
                    "options"       => $services_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "servicesContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services",
                    "param_name"    => "services",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "services_categories"
                ),
            )
        );

        $default_settings['cryptozone_pricing_box_1'] = array(
            'name' => 'Pricing Box 1',
            'base' => 'cryptozone_pricing_box_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/pricing_box_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'pricing',
                    "heading"       => 'Add More',
                    'group' => 'Pricing Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Title',
                            "param_name"    => "pricing_title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Tag',
                            "param_name"    => "pricing_tag",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Title Icon',
                            "param_name"    => "pricing_title_icon",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Description',
                            "param_name"    => "pricing_description",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Item Price',
                            "param_name"    => "item_price",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Features (Separated By comma)',
                            "param_name"    => "features",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Feature Description',
                            "param_name"    => "feature_description",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Btn',
                            "param_name"    => "pricing_btn",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Btn Link',
                            "param_name"    => "pricing_btn_link",
                        ),
                    )
                )
            )
        );

        $default_settings['cryptozone_contact_us_form_1'] = array(
            'name' => 'Contact Us Form 1',
            'base' => 'cryptozone_contact_us_form_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/contact_us_form_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Form Title',
                    "param_name"    => "form_title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Form Description',
                    "param_name"    => "form_description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Address 1',
                    "param_name"    => "address1",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Address 2',
                    "param_name"    => "address2",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail 1',
                    "param_name"    => "email1",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail 2',
                    "param_name"    => "email2",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Phone Number 1',
                    "param_name"    => "phone_number1",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Phone Number 2',
                    "param_name"    => "phone_number2",
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add More Social Icon',
                    'group' => 'Social Icons',
                    'params' => array(

                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'       =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )
            )
        );

        $default_settings['cryptozone_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'cryptozone_content_box_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/content_box_1.png'),
            'description' => 'Shows About Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image 1',
                    "param_name"    => "image1",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image 2',
                    "param_name"    => "image2",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image 3',
                    "param_name"    => "image3",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image 4',
                    "param_name"    => "image4",
                    "group"         => 'Advance'
                ),
            )
        );

        $default_settings['cryptozone_video_box_1'] = array(
            'name' => 'Video Box 1',
            'base' => 'cryptozone_video_box_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/video_box_1.png'),
            'description' => 'Video Box Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select Box image',
                    "param_name"    => "box_image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Video Box Link',
                    "param_name"    => "video_link",
                    "group"         => 'General'
                )
            )
        );

        $default_settings['cryptozone_post_listing_1'] = array(
            'name' => 'Post Listing 1',
            'base' => 'cryptozone_post_listing_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/post_listing_1.png'),
            'description' => 'Shows some Recent Posts.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    'value'         =>  array(),
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Pagination',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'number',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     '3',
                    "description" =>    'Note : Default value is 3 ',
                    'group'       =>    'Pagination',
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'value'         =>  array(),
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'value'         =>  array(),
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'value'         =>  array(),
                    'options'       =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['cryptozone_icon_box_2'] = array(
            'name' => 'Icon Box 2',
            'base' => 'cryptozone_icon_box_2',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/icon_box_2.png'),
            'description' => 'Shows Icon Box style 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'depend_on'     =>  'learn_more_button',
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    'depend_on'     =>  'learn_more_button',
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box_2',
                    "heading"       => 'Add More icon Box',
                    'group' => 'Features',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Description',
                            "param_name"    => "description",
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Icon',
                            "param_name"    => "icon",
                            "description"   => '',
                        ),
                    )
                )
            )
        );

        $default_settings['cryptozone_icon_box_1'] = array(
            'name' => 'Icon Box 1',
            'base' => 'cryptozone_icon_box_1',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/icon_box_1.png'),
            'description' => 'Shows Icon Box style 1.',
            'css' => '',
            'params' => array(
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Under Another Section',
                    'param_name'    => 'under_section',
                    'value'         => 'true',
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box',
                    "heading"       => 'Add More icon Box',
                    'group' => 'General',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Description',
                            "param_name"    => "description",
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Icon',
                            "param_name"    => "icon",
                            "description"   => '',
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Price',
                            "param_name"    => "price",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Price Title',
                            "param_name"    => "price_title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Average Ratio',
                            "param_name"    => "ratio",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Ratio Title',
                            "param_name"    => "ratio_title",
                        ),
                    )
                )
            )
        );

        $default_settings['cryptozone_main_banner'] = array(
            'name' => 'Main Banner',
            'base' => 'cryptozone_main_banner',
            'class' => '',
            'category' => 'Cryptozone',
            'icon' => asset('/themes/frontend/cryptozone/images/MagicEditor/theme-elements/cryptozone/main_banner.png'),
            'description' => 'Shows Main Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Left Image',
                    "param_name"    => "left_image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Right Image',
                    "param_name"    => "right_image",
                    "group"         => 'General'
                ),
            )
        );

        /* w3cms cryptozone elements end */


        /* w3cms bodyshape elements start */

        $default_settings['bodyshape_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'bodyshape_page_banner',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['bodyshape_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'bodyshape_content_box_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/content_box_1.png'),
            'description' => '',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Text',
                    "param_name"    => "bg_text",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Video btn',
                    'param_name'    => 'video_btn',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Video Btn Link',
                    "param_name"    => "video_btn_link",
                    "group"         => 'Advance',
                    'depend_on'     => 'video_btn'
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Clients Logo',
                    'param_name'    => 'clients_logo',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Clients Logo Title',
                    "param_name"    => "clients_logo_title",
                    'depend_on'     => 'clients_logo',
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading"       => 'Add More Logo Images',
                    'param_name' => 'clients_logo_images',
                    'depend_on'     => 'clients_logo',
                    'group' => 'Advance',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Upload Logo Image',
                            "param_name"    => "logo_image",
                        ),
                    ),
                ),
            )
        );

        $default_settings['bodyshape_content_box_2'] = array(
            'name' => 'Content Box 2',
            'base' => 'bodyshape_content_box_2',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/content_box_2.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'Advance',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'Advance',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image Title Big',
                    "param_name"    => "image_title_big",
                    "group"         => 'Advance',
                    "description"   => '',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image Title small',
                    "param_name"    => "image_title_small",
                    "group"         => 'Advance',
                    "description"   => '',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Column Image',
                    "param_name"    => "image",
                    "group"         => 'Advance',
                    "description"   => '',
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Icon Box',
                    'param_name'    => 'show_icon_box',
                    'value'         => 'true',
                    "group"         => 'Icon Box'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box',
                    "heading"       => 'Add More icon Box',
                    'group' => 'Icon Box',
                    'depend_on'     => 'show_icon_box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Icon',
                            "param_name"    => "icon",
                            "description"   => '',
                        ),
                    )
                ),
            )
        );

        $default_settings['bodyshape_contact_us_form_1'] = array(
            'name' => 'Contact Us 1',
            'base' => 'bodyshape_contact_us_form_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/contact_us_form_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Address',
                    "param_name"    => "address",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail',
                    "param_name"    => "email",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Phone Number',
                    "param_name"    => "phone",
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add More Social Icon',
                    'group' => 'Social Icons',
                    'params' => array(
                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'         =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )
            )
        );

        $default_settings['bodyshape_content_box_3'] = array(
            'name' => 'Content Box 3',
            'base' => 'bodyshape_content_box_3',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/content_box_3.png'),
            'description' => 'Shows About Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Tabs',
                    'param_name'    => 'show_tabs',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Tab Title 1',
                    "param_name"    => "tab_title_1",
                    'depend_on'     => 'show_tabs',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Tab Content 1',
                    "param_name"    => "tab_content_1",
                    'depend_on'     => 'show_tabs',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Tab Title 2',
                    "param_name"    => "tab_title_2",
                    'depend_on'     => 'show_tabs',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Tab content 2',
                    "param_name"    => "tab_content_2",
                    'depend_on'     => 'show_tabs',
                    "group"         => 'Advance'
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Call Us Btn',
                    'param_name'    => 'show_call_us',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Call Us Number',
                    "param_name"    => "call_us_number",
                    'depend_on'     => 'show_call_us',
                    "group"         => 'Advance',
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Background And Top Padding',
                    'param_name'    => 'show_bg_padding',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image 1',
                    "param_name"    => "image1",
                    "group"         => 'Image Content'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image 1 Title',
                    "param_name"    => "image_title_1",
                    "group"         => 'Image Content'
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Video btn',
                    'param_name'    => 'video_btn',
                    'value'         => 'true',
                    "group"         => 'Image Content'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Video Btn Link',
                    "param_name"    => "video_btn_link",
                    'depend_on'     => 'video_btn',
                    "group"         => 'Image Content',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image 2',
                    "param_name"    => "image2",
                    "group"         => 'Image Content'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image 2 Title',
                    "param_name"    => "image_title_2",
                    "group"         => 'Image Content'
                ),

            )
        );

        $default_settings['bodyshape_counter_1'] = array(
            'name' => 'Counter',
            'base' => 'bodyshape_counter_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/counter_1.png'),
            'description' => 'Video Box Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Counting 1',
                    "param_name"    => "counting1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Counting Title 1',
                    "param_name"    => "counting_title_1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Counting 2',
                    "param_name"    => "counting2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Counting Title 2',
                    "param_name"    => "counting_title_2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Counting 3',
                    "param_name"    => "counting3",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Counting Title 3',
                    "param_name"    => "counting_title_3",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Side Image',
                    "param_name"    => "image",
                    "group"         => 'Advance'
                ),
            )
        );

        $default_settings['bodyshape_post_slider_1'] = array(
            'name' => 'Post Slider 1',
            'base' => 'bodyshape_post_slider_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/post_slider_1.png'),
            'description' => 'Show post slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"         => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Slider Pagination & Navigation',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),

                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'         =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'         =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Button',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page for View All',
                    'param_name'    =>  'page_id',
                    'options'         =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 2 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['bodyshape_services_listing_2'] = array(
            'name' => 'Services List 2',
            'base' => 'bodyshape_services_listing_2',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/services_listing_2.png'),
            'description' => 'Shows services Box style 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services Category",
                    "param_name"    => "services_categories",
                    "description"   => "",
                    "options"       => $services_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "servicesContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services",
                    "param_name"    => "services",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "services_categories"
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['bodyshape_portfolio_slider_1'] = array(
            'name' => 'Portfolio Slider 1',
            'base' => 'bodyshape_portfolio_slider_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/portfolio_slider_1.png'),
            'description' => 'Shows portfolio slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Portfolio Category",
                    "param_name"    => "portfolio_categories",
                    "description"   => "",
                    "options"       => $portfolio_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "portfoliosContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Portfolio",
                    "param_name"    => "portfolios",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "portfolio_categories"
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Slider Pagination & Navigation',
                    'param_name'    => 'show_pagination',
                    'value'         => 'true',
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
            )
        );

        $default_settings['bodyshape_services_listing_1'] = array(
            'name' => 'Service Listing 1',
            'base' => 'bodyshape_services_listing_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/services_listing_1.png'),
            'description' => 'Shows Main Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services Category",
                    "param_name"    => "services_categories",
                    "description"   => "",
                    "options"       => $services_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "servicesContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services",
                    "param_name"    => "services",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "services_categories"
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'General',
                    'depend_on'     =>  'view_all'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['bodyshape_subscription_box_1'] = array(
            'name' => 'Subscription Box 1',
            'base' => 'bodyshape_subscription_box_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/subscription_box_1.png'),
            'description' => 'Shows subscription box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                )
            )
        );

        $default_settings['bodyshape_testimonial_slider_1'] = array(
            'name' => 'Testimonial Slider 1',
            'base' => 'bodyshape_testimonial_slider_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/testimonial_slider_1.png'),
            'description' => 'Shows Swiper Testimonial.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title Sub Part',
                    "param_name"    => "title_sub_part",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background text',
                    "param_name"    => "background_text",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonial Category",
                    "param_name"    => "testimonial_categories",
                    "description"   => "",
                    "options"       => $testimonial_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "testimonialsContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonials",
                    "param_name"    => "testimonials",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "testimonial_categories"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "value"         => "true",
                    "heading"       => 'Slider Pagination',
                    "param_name"    => "pagination",
                    "group"         => 'Slider Basic'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
            )
        );

        $default_settings['bodyshape_map_1'] = array(
            'name' => 'Map 1',
            'base' => 'bodyshape_map_1',
            'class' => '',
            'category' => 'Bodyshape',
            'icon' => asset('/themes/frontend/bodyshape/images/MagicEditor/theme-elements/bodyshape/bodyshape_map_1.png'),
            'description' => 'Shows Map.',
            'css' => '',
            'params' => array(
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of map',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
            )
        );

        /* w3cms bodyshape elements end */


        /* w3cms lemars elements start */
        $default_settings['lemars_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'lemars_page_banner',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['lemars_contact_us_form_1'] = array(
            'name' => 'Contact Us',
            'base' => 'lemars_contact_us_form_1',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/contact_us_form_1.png'),
            'description' => 'Contact Us 3.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Image',
                    'param_name'    =>  'show_image',
                    'value'         =>  'true',
                    "description"   => "Note: It will show an input for image if it is Checked",
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image',
                    "param_name"    => "image",
                    "group"         => 'General',
                    'depend_on'     =>  'show_image'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Address',
                    "param_name"    => "address",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail',
                    "param_name"    => "email",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Phone Number',
                    "param_name"    => "phone",
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add More Social Icon',
                    'group' => 'Social Icons',
                    'params' => array(
                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'         =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )
            )
        );

        $default_settings['lemars_post_listing_1'] = array(
            'name' => 'Post listing 1',
            'base' => 'lemars_post_listing_1',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/post_listing_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Pagination ( Load More Button )',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    "description"   => "Note: Works when Pagination is not Checked",
                    'group'         =>  'Pagination'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'Pagination',
                    'depend_on'     =>  'view_all'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['lemars_post_listing_2'] = array(
            'name' => 'Post Listing 2',
            'base' => 'lemars_post_listing_2',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/post_listing_2.png'),
            'description' => 'Shows Section of post listing.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Pagination ( Load More Button )',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),

                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    "description"   => "Note: Works when Pagination is not Checked",
                    'group'         =>  'Pagination'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Btn Text',
                    "param_name"    => "btn_text",
                    "group"         => 'Pagination',
                    'depend_on'     =>  'view_all'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['lemars_slider_banner_1'] = array(
            'name' => 'Slider Banner 1',
            'base' => 'lemars_slider_banner_1',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/slider_banner_1.png'),
            'description' => 'Shows About Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Banner Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'General'
                ),

                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'General'
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            ""          =>  "No Effect",
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 1 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 2 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['lemars_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'lemars_content_box_1',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/content_box_1.png'),
            'description' => 'Shows About Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Content Left',
                    "param_name"    => "content1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Content Right',
                    "param_name"    => "content2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Facebook Link',
                    "param_name"    => "facebook_link",
                    "group"         => 'Socials'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Instagram Link',
                    "param_name"    => "instagram_link",
                    "group"         => 'Socials'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Twitter Link',
                    "param_name"    => "twitter_link",
                    "group"         => 'Socials'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Whatsapp Link',
                    "param_name"    => "whatsapp_link",
                    "group"         => 'Socials'
                ),
            ),
        );

        $default_settings['lemars_subscription_box_1'] = array(
            'name' => 'Subscribe Box 1',
            'base' => 'lemars_subscription_box_1',
            'class' => '',
            'category' => 'Lemars',
            'icon' => asset('/themes/frontend/lemars/images/MagicEditor/theme-elements/lemars/subscription_box_1.png'),
            'description' => 'Subscribe Box 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            )
        );
        /* w3cms lemars elements end */


        /* w3cms bucklin elements start */
        $default_settings['bucklin_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'bucklin_page_banner',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['bucklin_slider_banner_1'] = array(
            'name' => 'Slider Banner 1',
            'base' => 'bucklin_slider_banner_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/slider_banner_1.png'),
            'description' => 'slider banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Facebook Link',
                    "param_name"    => "facebook_link",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Instagram Link',
                    "param_name"    => "instagram_link",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Location',
                    "param_name"    => "location",
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Enable Header',
                    'param_name'    => 'header',
                    'value'         => 'true',
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'slider_banner',
                    "heading"       => 'Add More Slide',
                    'group' => 'Features',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Subtitle',
                            "param_name"    => "subtitle",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Description',
                            "param_name"    => "description",
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'slide background image',
                            "param_name"    => "slide_image",
                        ),
                    )
                )
            )
        );

        $default_settings['bucklin_post_slider_1'] = array(
            'name' => 'Post Slider 1',
            'base' => 'bucklin_post_slider_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/post_slider_1.png'),
            'description' => 'Shows Post Slider.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 3 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 5 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            ),
        );

        $default_settings['bucklin_post_listing_1'] = array(
            'name' => 'Post Listing 1',
            'base' => 'bucklin_post_listing_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/post_listing_1.png'),
            'description' => 'Shows Contact Us.',
            'css' => '',
            'params' => array(
				array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
				array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
				array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Enable Collage',
                    'param_name'    => 'enable_collage',
                    'value'         => 'true',
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Pagination ( Load More button )',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    "description"   => "Note: Works when Pagination is not Checked",
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            ),
        );

        $default_settings['bucklin_post_slider_2'] = array(
            'name' => 'Post Slider 2',
            'base' => 'bucklin_post_slider_2',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/post_slider_2.png'),
            'description' => 'Shows Post Slider 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Bacground Image',
                    "param_name"    => "background_image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Navigation Buttons',
                    'param_name'    =>  'navigation',
                    'value'         =>  'true',
                    'group'         =>  'Slider Basic'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
            ),
        );

        $default_settings['bucklin_instagram_slider_1'] = array(
            'name' => 'Instagram Slider',
            'base' => 'bucklin_instagram_slider_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/instagram_slider_1.png'),
            'description' => 'Instagram Slider.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "(Default is 0)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.(Default is 2)",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 3 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 5 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 6 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 6 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'instagram_slider',
                    "heading"       => 'Add More Slide',
                    'group' => 'Add Slide',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Image',
                            "param_name"    => "image",
                            "description"   => '',
                        )
                    )
                ),
            )
        );

        $default_settings['bucklin_subscription_box_1'] = array(
            'name' => 'Subscription Box 1',
            'base' => 'bucklin_subscription_box_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/subscription_box_1.png'),
            'description' => 'subscription box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Input Title',
                    "param_name"    => "input_title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Button Text',
                    "param_name"    => "button_text",
                    "group"         => 'General'
                ),
            )
        );

        $default_settings['bucklin_social_links_1'] = array(
            'name' => 'Social Links 1',
            'base' => 'bucklin_social_links_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/social_links_1.png'),
            'description' => 'social links.',
            'css' => '',
            'params' => array(
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add More Social Icon',
                    'group' => 'Social Icons',
                    'params' => array(
                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'         =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )
            )
        );

        $default_settings['bucklin_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'bucklin_content_box_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/content_box_1.png'),
            'description' => 'Shows Contact Us.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Content 1',
                    "param_name"    => "content1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image 1',
                    "param_name"    => "image1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image 2',
                    "param_name"    => "image2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Content 2',
                    "param_name"    => "content2",
                    "group"         => 'General'
                ),array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add More Social Icon',
                    'group' => 'Social Links',
                    'params' => array(
                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'         =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )
            )
        );

        $default_settings['bucklin_contact_us_form_1'] = array(
            'name' => 'Contact Us',
            'base' => 'bucklin_contact_us_form_1',
            'class' => '',
            'category' => 'Bucklin',
            'icon' => asset('/themes/frontend/bucklin/images/MagicEditor/theme-elements/bucklin/contact_us_form_1.png'),
            'description' => 'Shows Contact Us.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Content',
                    "param_name"    => "content",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Image',
                    'param_name'    =>  'show_image',
                    'value'         =>  'true',
                    "description"   => "Note: It will show an input for image if it is Checked",
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image',
                    "param_name"    => "image",
                    "group"         => 'General',
                    'depend_on'     =>  'show_image'
                ),
            )
        );
        /* w3cms bucklin elements end */


        /* w3cms indiro elements start */

        $default_settings['indiro_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'indiro_page_banner',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['indiro_slider_banner_1'] = array(
            'name' => 'Slider Banner 1',
            'base' => 'indiro_slider_banner_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/slider_banner_1.png'),
            'description' => 'Shows slider banner 1.',
            'css' => '',
            'params' => array(
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Read More Link',
                    'param_name'    =>  'read_more',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'read_more_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'read_more'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Get in touch',
                    'param_name'    =>  'get_in_touch',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'get_in_touch_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'get_in_touch'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Pagination Bar',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Navigation Buttons',
                    'param_name'    =>  'navigation',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'slider_banner',
                    "heading"       => 'Add More Slide',
                    'group' => 'Slides',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Description',
                            "param_name"    => "description",
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'slide image',
                            "param_name"    => "image",
                        ),
                    )
                )
            )
        );

        $default_settings['indiro_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'indiro_content_box_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/content_box_1.png'),
            'description' => 'Shows content box 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Read More Button',
                    'param_name'    =>  'read_more',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page for Read More',
                    'param_name'    =>  'read_more_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'read_more'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select images 1',
                    "param_name"    => "image1",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select images 2',
                    "param_name"    => "image2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Experience Number',
                    "param_name"    => "exp_number",
                    "group"         => 'Features'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter any no. or symbol or letter',
                    "param_name"    => "extra_alpha",
                    "group"         => 'Features'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Experience Title',
                    "param_name"    => "exp_title",
                    "group"         => 'Features'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'logo_slider',
                    "heading"  => 'Add Feature for box',
                    'group' => 'Features',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                            "description"   => '',
                        )
                    )
                )
            )
        );

        $default_settings['indiro_services_slider_1'] = array(
            'name' => 'Services Slider 1',
            'base' => 'indiro_services_slider_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/services_slider_1.png'),
            'description' => 'Shows services slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Navigation Buttons',
                    'param_name'    =>  'navigation',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services Category",
                    "param_name"    => "services_category",
                    "description"   => "",
                    "options"       => $services_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "servicesContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services ",
                    "param_name"    => "services",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "services_category"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 0 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 2 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 3 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            ),
        );

        $default_settings['indiro_content_box_2'] = array(
            'name' => 'Content Box 2',
            'base' => 'indiro_content_box_2',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/content_box_2.png'),
            'description' => 'Shows content box 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Read More button',
                    'param_name'    =>  'read_more',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page for Read More',
                    'param_name'    =>  'read_more_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'read_more'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'General',
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Video Box',
                    'param_name'    =>  'video_box',
                    'value'         =>  'true',
                    'group'         =>  'Video Box'
                ),
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of video',
                    'param_name'    =>  'iframe',
                    'group'         =>  'Video Box',
                    'depend_on'     =>  'video_box'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image Video Box',
                    "param_name"    => "video_box_image",
                    "group"         => 'Video Box',
                    'depend_on'     => 'video_box'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'add_feature',
                    "heading"  => 'Add More Feature',
                    'group' => 'Features',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Feature Title',
                            "param_name"    => "title",
                            "description"   => '',
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Feature Description',
                            "param_name"    => "description",
                            "description"   => '',
                        )
                    )
                )
            )
        );

        $default_settings['indiro_content_box_3'] = array(
            'name' => 'Content Box 3',
            'base' => 'indiro_content_box_3',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/content_box_3.png'),
            'description' => 'Shows content box 3.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Read More button',
                    'param_name'    =>  'read_more',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page for Read More',
                    'param_name'    =>  'read_more_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'read_more'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'General',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'add_feature',
                    "heading"  => 'Add More Feature',
                    'group' => 'Features',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Feature Title',
                            "param_name"    => "title",
                            "description"   => '',
                        ),
                        array(
                            "type"          => "textarea",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Feature Description',
                            "param_name"    => "description",
                            "description"   => '',
                        )
                    )
                )
            ),
        );

        $default_settings['indiro_logo_slider_1'] = array(
            'name' => 'Clients logo slider 1',
            'base' => 'indiro_logo_slider_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/logo_slider_1.png'),
            'description' => 'Shows logo slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'logo_slider',
                    "heading"  => 'Add More Logo',
                    'group' => 'Add Slide',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Image',
                            "param_name"    => "image",
                            "description"   => '',
                        )
                    )
                )
            ),
        );

        $default_settings['indiro_content_box_4'] = array(
            'name' => 'content box 4',
            'base' => 'indiro_content_box_4',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/content_box_4.png'),
            'description' => 'Shows content box 4.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Read More button',
                    'param_name'    =>  'read_more',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page for Read More',
                    'param_name'    =>  'read_more_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'read_more'
                ),
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of video',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image for Video Box',
                    "param_name"    => "video_box_image",
                    "group"         => 'General',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'counter',
                    "heading"       => 'Add More Counter',
                    'group' => 'Features',
                    'params' => array(
                        array(
                            "type"          => "number",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Counting',
                            "param_name"    => "counting",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Extra character if needed',
                            "param_name"    => "extra_alpha",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                    )
                )
            )
        );

        $default_settings['indiro_testimonial_slider_1'] = array(
            'name' => 'testimonials slider 1',
            'base' => 'indiro_testimonial_slider_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/testimonial_slider_1.png'),
            'description' => 'Shows testimonials slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "value"         => "true",
                    "heading"       => 'Pagination & Navigation',
                    "param_name"    => "pagination",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonial Category",
                    "param_name"    => "testimonial_category",
                    "description"   => "",
                    "options"       => $testimonial_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "testimonialsContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonial Posts ",
                    "param_name"    => "testimonials", /* #param_nameContainer*/
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "testimonial_category"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
            )
        );

        $default_settings['indiro_video_box_1'] = array(
            'name' => 'video box 1',
            'base' => 'indiro_video_box_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/video_box_1.png'),
            'description' => 'Shows video box 1.',
            'css' => '',
            'params' => array(
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of video',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'Title',
                    'param_name'    =>  'title',
                    'group'         =>  'General',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image for Video Box',
                    "param_name"    => "video_box_image",
                    "group"         => 'General',
                ),
            ),
        );

        $default_settings['indiro_post_listing_1'] = array(
            'name' => 'post listing 1',
            'base' => 'indiro_post_listing_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/post_listing_1.png'),
            'description' => 'Shows post listing 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Advance'
                ),

                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'Advance'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Advance'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'Advance',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['indiro_contact_us_1'] = array(
            'name' => 'contact us 1',
            'base' => 'indiro_contact_us_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/contact_us_1.png'),
            'description' => 'Shows contact us 1.',
            'css' => '',
            'params' => array(
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of map',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Address',
                    "param_name"    => "address",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail 1',
                    "param_name"    => "email1",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail 2',
                    "param_name"    => "email2",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Phone Number 1',
                    "param_name"    => "phone_number1",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Phone Number 2',
                    "param_name"    => "phone_number2",
                    "group"         => 'Advance',
                ),
            )
        );

        $default_settings['indiro_services_slider_2'] = array(
            'name' => 'Services Slider 2',
            'base' => 'indiro_services_slider_2',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/services_slider_2.png'),
            'description' => 'Services Slider 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Year in number',
                    "param_name"    => "year",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Small text field',
                    "param_name"    => "subpart_1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Big text field',
                    "param_name"    => "subpart_2",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Read More button',
                    'param_name'    =>  'read_more',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page for Read More',
                    'param_name'    =>  'read_more_page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'read_more'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Pagination',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services Category",
                    "param_name"    => "services_categories",
                    "description"   => "",
                    "options"       => $services_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "servicesContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Services ",
                    "param_name"    => "services",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "services_categories"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 2 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['indiro_video_box_2'] = array(
            'name' => 'Video Box 2',
            'base' => 'indiro_video_box_2',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/video_box_2.png'),
            'description' => 'Shows Video Box 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of video',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image for Video Box',
                    "param_name"    => "video_box_image",
                    "group"         => 'General',
                ),
            )
        );

        $default_settings['indiro_counter_1'] = array(
            'name' => 'Counter 1',
            'base' => 'indiro_counter_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/counter_1.png'),
            'description' => 'Shows Counter 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'counter',
                    "heading"  => 'Add More',
                    'group' => 'General',
                    'params' => array(
                        array(
                            "type"          => "number",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Progress',
                            "param_name"    => "progress",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            )
        );

        $default_settings['indiro_team_slider_1'] = array(
            'name' => 'Team Slider 1',
            'base' => 'indiro_team_slider_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/team_slider_1.png'),
            'description' => 'Shows Team Slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "value"         => "true",
                    "heading"       => 'Show Navigation',
                    "param_name"    => "navigation",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Team Category",
                    "param_name"    => "teams_categories",
                    "description"   => "",
                    "options"       => $teams_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "teamsContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Team Member",
                    "param_name"    => "teams",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "teams_categories"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 2 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['indiro_contact_us_form_1'] = array(
            'name' => 'Contact Us Form',
            'base' => 'indiro_contact_us_form_1',
            'class' => '',
            'category' => 'Indiro',
            'icon' => asset('/themes/frontend/indiro/images/MagicEditor/theme-elements/indiro/contact_us_form_1.png'),
            'description' => 'Shows Contact Us Form.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Contact Form Subtitle',
                    "param_name"    => "form_subtitle",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Contact Form Title',
                    "param_name"    => "form_title",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Address',
                    "param_name"    => "address",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'E-mail',
                    "param_name"    => "email",
                    "group"         => 'Advance',
                ),
            )
        );
        /* w3cms indiro elements end */



        /* w3cms pendown elements start */

        $default_settings['pendown_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'pendown_page_banner',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['pendown_content_box_2'] = array(
            'name' => 'Content Box 2',
            'base' => 'pendown_content_box_2',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/content_box_2.png'),
            'description' => 'Shows Content Box 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select Author image',
                    "param_name"    => "image",
                    "group"         => 'General',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add Social Icon',
                    'group' => 'Social Icons',
                    'params' => array(
                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'       =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )

            )
        );

        $default_settings['pendown_post_slider_1'] = array(
            'name' => 'Post Slider 1',
            'base' => 'pendown_post_slider_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/post_slider_1.png'),
            'description' => 'Shows Post Slider.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 10 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 2 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 3 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 4 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 5 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['pendown_post_slider_2'] = array(
            'name' => 'Post Slider 2',
            'base' => 'pendown_post_slider_2',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/post_slider_2.png'),
            'description' => 'Shows Post Slider 2.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 10 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1.5 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 3 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1400(px).( Default is 4 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['pendown_category_slider_1'] = array(
            'name' => 'Category Slider',
            'base' => 'pendown_category_slider_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/category_slider_1.png'),
            'description' => 'Shows Category Slider.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 2 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 3 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 4 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 5 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['pendown_subscription_box_1'] = array(
            'name' => 'Subscription Box',
            'base' => 'pendown_subscription_box_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/subscription_box_1.png'),
            'description' => 'Shows Subscription Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
            )
        );

        $default_settings['pendown_post_listing_1'] = array(
            'name' => 'Post Listing',
            'base' => 'pendown_post_listing_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/post_listing_1.png'),
            'description' => 'Shows Post Listing.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    'heading'       => 'Post With Images Only',
                    'param_name'    => 'post_with_images',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Pagination',
                    'param_name'    =>  'pagination',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts Per Page',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'       =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'       =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'View All Link',
                    'param_name'    =>  'view_all',
                    'value'         =>  'true',
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'textfield',
                    'heading'       =>  'Button text',
                    'param_name'    =>  'btn_text',
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'description'   => 'Note : Only work when pagination is not checked',
                    'group'         =>  'Pagination',
                    'depend_on'     =>  'view_all'
                ),
            )
        );

        $default_settings['pendown_instagram_slider_1'] = array(
            'name' => 'Instagram Slider',
            'base' => 'pendown_instagram_slider_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/instagram_slider_1.png'),
            'description' => 'Shows Instagram Slider.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'Select icon',
                    'param_name'    =>  'icon',
                    'options'         =>  $social_icons,
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 0 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 4 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 5 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 6 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 7 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 8 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'instagram_slider',
                    "heading"       => 'Add More Slide',
                    'group' => 'Add Slide',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Image',
                            "param_name"    => "image",
                        )
                    )
                ),
            )
        );

        $default_settings['pendown_contact_us_form_1'] = array(
            'name' => 'Contact Us Form',
            'base' => 'pendown_contact_us_form_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/contact_us_form_1.png'),
            'description' => 'Shows Contact Us Form.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Show Image',
                    'param_name'    =>  'show_image',
                    'value'         =>  'true',
                    "description"   => "Note: It will show an input for image if it is Checked",
                    'group'         =>  'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Image',
                    "param_name"    => "image",
                    "group"         => 'General',
                    'depend_on'     =>  'show_image'
                ),
            )
        );

        $default_settings['pendown_content_box_1'] = array(
            'name' => 'Content Box',
            'base' => 'pendown_content_box_1',
            'class' => '',
            'category' => 'Pendown',
            'icon' => asset('/themes/frontend/pendown/images/MagicEditor/theme-elements/pendown/content_box_1.png'),
            'description' => 'Shows Content Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textarea",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'General',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'social_icon',
                    "heading"       => 'Add More Social Icon',
                    'group' => 'Social Icons',
                    'params' => array(
                        array(
                            'type'          =>  'dropdown',
                            "holder"        =>  "div",
                            "class"         =>  "",
                            'heading'       =>  'Select icon',
                            'param_name'    =>  'icon',
                            'options'       =>  $social_icons,
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Social Icon Link',
                            "param_name"    => "social_link",
                        ),
                    )
                )
            )
        );
        /* w3cms pendown elements end */
        

        
        /* w3cms samar elements start */

        $default_settings['samar_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'samar_page_banner',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['samar_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'samar_content_box_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/content_box_1.png'),
            'description' => '',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Sub Title',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'List Item 1',
                    "param_name"    => "list_item_1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'List Item 2',
                    "param_name"    => "list_item_2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Image',
                    "param_name"    => "image",
                    "group"         => 'Advance'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
            ),
        );

        $default_settings['samar_content_box_2'] = array(
            'name' => 'Content Box 2',
            'base' => 'samar_content_box_2',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/content_box_2.png'),
            'description' => 'Shows Content Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'General',
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'List_points',
                    "heading"       => 'Add More',
                    'group' => 'Advance',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Enter list description',
                            "param_name"    => "list",
                        ),
                    )
                )
            )
        );

        $default_settings['samar_content_box_3'] = array(
            'name' => 'Content Box 3',
            'base' => 'samar_content_box_3',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/content_box_3.png'),
            'description' => 'Shows Content Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box',
                    "heading"       => 'Add More',
                    'group' => 'Icon Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "selectIcon",
                            "heading"       => 'Select Icon',
                            "param_name"    => "icon",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            ),
        );

        $default_settings['samar_counter_1'] = array(
            'name' => 'Counter 1',
            'base' => 'samar_counter_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/counter_1.png'),
            'description' => 'Video Box Section.',
            'css' => '',
            'params' => array(
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'counter',
                    "heading"       => 'Add More',
                    'group' => 'Counter',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "selectIcon",
                            "heading"       => 'Select Icon',
                            "param_name"    => "icon",
                        ),
                        array(
                            "type"          => "number",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Progress',
                            "param_name"    => "progress",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "title",
                        ),
                    )
                )
            )
        );

        $default_settings['samar_pricing_box_1'] = array(
            'name' => 'Pricing',
            'base' => 'samar_pricing_box_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/pricing_box_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'pricing',
                    "heading"       => 'Add More',
                    'group' => 'Pricing Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Title',
                            "param_name"    => "pricing_title",
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Select Image',
                            "param_name"    => "image",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Per Month',
                            "param_name"    => "pricing_per_month",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing Per Year',
                            "param_name"    => "pricing_per_year",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing List Item 1',
                            "param_name"    => "pricing_list_item_1",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing List Item 2',
                            "param_name"    => "pricing_list_item_2",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing List Item 3',
                            "param_name"    => "pricing_list_item_3",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing List Item 4',
                            "param_name"    => "pricing_list_item_4",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing List Item 5',
                            "param_name"    => "pricing_list_item_5",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Pricing List Item 6',
                            "param_name"    => "pricing_list_item_6",
                        ),
                    )
                )
            )
        );

        $default_settings['samar_services_listing_1'] = array(
            'name' => 'Services Listing 1',
            'base' => 'samar_services_listing_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/services_listing_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'box_wrapper',
                    "heading"       => 'Add More',
                    'group' => 'Service Container',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Select Image',
                            "param_name"    => "image",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "section_title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            )
        );

        $default_settings['samar_portfolio_list_1'] = array(
            'name' => 'Portfolio List 1',
            'base' => 'samar_portfolio_list_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/portfolio_list_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Portfolio Category",
                    "param_name"    => "portfolio_categories",
                    "description"   => "",
                    "options"       => $portfolio_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "portfoliosContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Portfolio",
                    "param_name"    => "portfolios",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "portfolio_categories"
                ),
            )
        );

        $default_settings['samar_testimonial_slider_1'] = array(
            'name' => 'Testimonial Slider 1',
            'base' => 'samar_testimonial_slider_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/testimonial_slider_1.png'),
            'description' => 'Shows Swiper Testimonial.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonial Category",
                    "param_name"    => "testimonial_categories",
                    "description"   => "",
                    "options"       => $testimonial_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "testimonialsContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonials",
                    "param_name"    => "testimonials",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "testimonial_categories"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Navigation (Next & Prev Buttons)",
                    "param_name"    => "navigation",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "value"         => "true",
                    "heading"       => 'Slider Pagination',
                    "param_name"    => "pagination",
                    "group"         => 'Slider Basic'
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect ( Default is 1 ). ",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Dynamic Bullets",
                    "param_name"    => "dynamic_bullets",
                    "value"         => "true",
                    "group"         => "Advance",
                    "description"   => "Note: it will only make Bullets pagination dynamic.",
                ),
            )
        );

        $default_settings['samar_post_slider_1'] = array(
            'name' => 'Post Slider 1',
            'base' => 'samar_post_slider_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/post_slider_1.png'),
            'description' => 'Show post slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"         => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'         =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'         =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 1 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 2 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['samar_logo_slider_1'] = array(
            'name' => 'Clients logo slider 1',
            'base' => 'samar_logo_slider_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/logo_slider_1.png'),
            'description' => 'Shows logo slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 2 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 3 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 4 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 5 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 6 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'logo_slider',
                    "heading"  => 'Add More Logo',
                    'group' => 'Add Slide',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Image 1',
                            "param_name"    => "image_1",
                            "description"   => '',
                        ),
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Image 2',
                            "param_name"    => "image_2",
                            "description"   => '',
                        ),
                    ),
                ),
            ),
        );

        $default_settings['samar_icon_box_1'] = array(
            'name' => 'Samar Icon Box 1',
            'base' => 'samar_icon_box_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/icon_box_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box_1',
                    "heading"       => 'Add More',
                    'group' => 'Icon Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "selectIcon",
                            "heading"       => 'Select Icon',
                            "param_name"    => "icon",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "section_title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            )
        );

        $default_settings['samar_video_box_1'] = array(
            'name' => 'Video Box Section',
            'base' => 'samar_video_box_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/video_box_1.png'),
            'description' => 'Video Box Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select Box image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Video Box Link',
                    "param_name"    => "video_link",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Heading',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "selectIcon",
                    "heading"       => 'Select Icon',
                    "param_name"    => "icon",
                    "group"         => 'General'
                ),
            )
        );

        $default_settings['samar_contact_us_form_1'] = array(
            'name' => 'Contact Us 1',
            'base' => 'samar_contact_us_form_1',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/contact_us_form_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of map',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
            )
        );

        $default_settings['samar_icon_box_2'] = array(
            'name' => 'Samar Icon Box 2',
            'base' => 'samar_icon_box_2',
            'class' => '',
            'category' => 'Samar',
            'icon' => asset('/themes/frontend/samar/images/MagicEditor/theme-elements/samar/icon_box_2.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title 1',
                    "param_name"    => "title_1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter phone no. 1',
                    "param_name"    => "phone_1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter phone no. 2',
                    "param_name"    => "phone_2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title 2',
                    "param_name"    => "title_2",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter your location',
                    "param_name"    => "location",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title 3',
                    "param_name"    => "title_3",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter email 1',
                    "param_name"    => "email_1",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter email 2',
                    "param_name"    => "email_2",
                    "group"         => 'General'
                ),
            )
        );

        /* w3cms samar elements end */



        /* w3cms akcel elements start */

        $default_settings['akcel_page_banner'] = array(
            'name' => 'Page Banner',
            'base' => 'akcel_page_banner',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/page_banner.png'),
            'description' => 'Shows Page Banner.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Background Image',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
            ),
        );

        $default_settings['akcel_content_box_1'] = array(
            'name' => 'Content Box 1',
            'base' => 'akcel_content_box_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/content_box_1.png'),
            'description' => '',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Sub Title',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Main Image',
                    "description"   => 'Image should be in png. format',
                    "param_name"    => "image",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Small Image',
                    "description"   => 'Note : This image will be appear on the main image',
                    "param_name"    => "image_2",
                    "group"         => 'General'
                ),
                array(
                    'type'          => 'checkbox',
                    "holder"        => "div",
                    'heading'       => 'Show Clients Slider',
                    'param_name'    => 'clients_logo',
                    'value'         => 'true',
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Clients Logo Title',
                    "param_name"    => "clients_logo_title",
                    'depend_on'     => 'clients_logo',
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "heading"       => 'Add More Logo Images',
                    'param_name' => 'clients_logo_images',
                    'depend_on'     => 'clients_logo',
                    'group' => 'Advance',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Upload Logo Image',
                            "param_name"    => "logo_image",
                        ),
                    ),
                ),
            ),
        );

        $default_settings['akcel_team_slider_1'] = array(
            'name' => 'Team Slider 1',
            'base' => 'akcel_team_slider_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/team_slider_1.png'),
            'description' => 'Shows Team Slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Team Category",
                    "param_name"    => "teams_categories",
                    "description"   => "",
                    "options"       => $teams_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "teamsContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Team Member",
                    "param_name"    => "teams",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "teams_categories"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 2 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 2 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 2 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 3 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 4 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['akcel_logo_slider_1'] = array(
            'name' => 'Clients logo slider 1',
            'base' => 'akcel_logo_slider_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/logo_slider_1.png'),
            'description' => 'Shows logo slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 2 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms). ( Default is 1000 )",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 3 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 4 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 5 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 6 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'logo_slider',
                    "heading"  => 'Add More Logo',
                    'group' => 'Add Slide',
                    'params' => array(
                        array(
                            "type"          => "attach_image",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Image',
                            "param_name"    => "image",
                            "description"   => '',
                        ),
                    ),
                ),
            ),
        );

        $default_settings['akcel_testimonial_slider_1'] = array(
            'name' => 'Testimonial Slider 1',
            'base' => 'akcel_testimonial_slider_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/testimonial_slider_1.png'),
            'description' => 'Shows Swiper Testimonial.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonial Category",
                    "param_name"    => "testimonial_categories",
                    "description"   => "",
                    "options"       => $testimonial_categories,
                    "group"         => "General",
                    "ajax_url"      => \url('/').'/admin/magic_editors/get_post_by_cpt_category',
                    "ajax_container"=> "testimonialsContainer",
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Testimonials",
                    "param_name"    => "testimonials",
                    "group"         => "General",
                    "ajax_field"    => "true",
                    "depend_on"     => "testimonial_categories"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Navigation (Next & Prev Buttons)",
                    "param_name"    => "navigation",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect ( Default is 1 ). ",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
            )
        );

        $default_settings['akcel_counter_1'] = array(
            'name' => 'Counter 1',
            'base' => 'akcel_counter_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/counter_1.png'),
            'description' => 'Video Box Section.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'counter',
                    "heading"       => 'Add More',
                    'group' => 'Counter',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Progress',
                            "param_name"    => "progress",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Enter any Static value (format in string).',
                            "param_name"    => "extra_alpha",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "title",
                        ),
                    )
                )
            )
        );

        $default_settings['akcel_category_slider_1'] = array(
            'name' => 'Category Slider',
            'base' => 'akcel_category_slider_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/category_slider_1.png'),
            'description' => 'Shows Category Slider.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Subtitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'category_ids',
                    "options"       => $categories,
                    "group"         => 'General'
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "value"         => "true",
                    "heading"       => 'Slider Pagination',
                    "param_name"    => "pagination",
                    "group"         => 'Slider Basic'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px).( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Keyboard control",
                    "param_name"    => "keyboard_control",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 2 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Free Mode Slider",
                    "param_name"    => "free_mode",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms). ( Default is 1000 )",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 3 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 3 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 4 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 5 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['akcel_content_box_2'] = array(
            'name' => 'Content Box 2',
            'base' => 'akcel_content_box_2',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/content_box_2.png'),
            'description' => '',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Sub Title',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'General'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'General',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Side Image',
                    "param_name"    => "image",
                    "group"         => 'Advance'
                ),
                
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Second Title',
                    "param_name"    => "second_title",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Second Description',
                    "param_name"    => "second_description",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter Symbol',
                    "param_name"    => "symbol",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter Total Fund',
                    "param_name"    => "counter",
                    "group"         => 'Advance'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter Title For Funds',
                    "param_name"    => "third_title",
                    "group"         => 'Advance'
                ),
            ),
        );

        $default_settings['akcel_post_slider_1'] = array(
            'name' => 'Post Slider 1',
            'base' => 'akcel_post_slider_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/post_slider_1.png'),
            'description' => 'Show post slider 1.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "dropdown_multi",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Select Categories",
                    "param_name"    => 'post_category_ids',
                    "options"         => $categories,
                    "group"         => 'General'
                ),
                array(
                    'type'        =>    'textfield',
                    'heading'     =>    'No. of Posts',
                    'param_name'  =>    'no_of_posts',
                    'value'       =>     $limit,
                    'group'       =>    'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order By',
                    'param_name'    =>  'orderby',
                    'options'         =>  $orderby_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Order',
                    'param_name'    =>  'order',
                    'options'         =>  $order_options,
                    'group'         =>  'Pagination'
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Space Between (in px)",
                    "description"   => "( Default is 30 )",
                    "param_name"    => "space_between",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play",
                    "param_name"    => "auto_play",
                    "value"         => "true",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Auto Play Delay Time(in .ms)",
                    "param_name"    => "autoplay_delay",
                    "description"   => "Note: Works when Auto Play Checked",
                    "depend_on"     => "auto_play",
                    "group"         => "Slider Basic"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Looping",
                    "param_name"    =>  "loop",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Grabcursor",
                    "param_name"    =>  "grabCursor",
                    "options"         =>  array(
                                            "true"=>"True",
                                            "false"=>"False"
                                        ),
                    "group"         =>  "Slider Basic",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slides Per View",
                    "param_name"    => "slides_per_view",
                    "description"   => "Note: Do Not Work with Fade, cards, Cube and Flip effect.( Default is 1 )",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "checkbox",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Centered Slides",
                    "param_name"    => "centered_slides",
                    "value"         => "true",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          =>  "dropdown",
                    "heading"       =>  "Select Slider Effects",
                    "param_name"    =>  "effect",
                    "options"         =>  array(
                                            "fade"      =>  "Fade",
                                            "coverflow" =>  "Coverflow",
                                            "cube"      =>  "Cube",
                                            "flip"      =>  "Flip",
                                            "cards"      =>  "Cards",
                                        ),
                    "group"         =>  "Slider Advance",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Sliding Speed (in .ms)",
                    "param_name"    => "speed",
                    "group"         => "Slider Advance"
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 575(px).( Default is 1 )",
                    "param_name"    => "breakpoint1",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 768(px).( Default is 1 )",
                    "param_name"    => "breakpoint2",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 992(px).( Default is 2 )",
                    "param_name"    => "breakpoint3",
                    "group"         => "Responsive",
                ),
                array(
                    "type"          => "number",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => "Slider Per View on min-width 1200(px).( Default is 3 )",
                    "param_name"    => "breakpoint4",
                    "group"         => "Responsive",
                ),
            )
        );

        $default_settings['akcel_content_box_3'] = array(
            'name' => 'Content Box 3',
            'base' => 'akcel_content_box_3',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/content_box_3.png'),
            'description' => 'Shows Content Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select image',
                    "param_name"    => "image",
                    "group"         => 'Advance',
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box',
                    "heading"       => 'Add More',
                    'group' => 'Icon Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "selectIcon",
                            "heading"       => 'Select Icon',
                            "param_name"    => "icon",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Title',
                            "param_name"    => "title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            ),
        );

        $default_settings['akcel_content_box_4'] = array(
            'name' => 'Content Box 4',
            'base' => 'akcel_content_box_4',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/content_box_4.png'),
            'description' => 'Shows Content Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select Side image',
                    "param_name"    => "image",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Upload Signature',
                    "param_name"    => "image_2",
                    "group"         => 'Advance',
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Enter Name',
                    "param_name"    => "name",
                    "group"         => 'Advance'
                ),
            ),
        );

        $default_settings['akcel_content_box_5'] = array(
            'name' => 'Content Box 5',
            'base' => 'akcel_content_box_5',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/content_box_5.png'),
            'description' => 'Shows Content Box.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "attach_image",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Select Side image',
                    "param_name"    => "image",
                    "group"         => 'Advance',
                ),
                array(
                    'type'          =>  'checkbox',
                    'heading'       =>  'Learn More Button',
                    'param_name'    =>  'learn_more_button',
                    'value'         =>  'true',
                    'group'         =>  'Advance'
                ),
                array(
                    'type'          =>  'dropdown',
                    'heading'       =>  'Select Page',
                    'param_name'    =>  'page_id',
                    'options'       =>  $pages,
                    'group'         =>  'Advance',
                    'depend_on'     =>  'learn_more_button'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'counter',
                    "heading"       => 'Add More',
                    'group' => 'Counter',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Progress',
                            "param_name"    => "progress",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "title",
                        ),
                    )
                )
            ),
        );

        $default_settings['akcel_icon_box_1'] = array(
            'name' => 'Icon Box 1',
            'base' => 'akcel_icon_box_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/icon_box_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box_1',
                    "heading"       => 'Add More',
                    'group' => 'Icon Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "selectIcon",
                            "heading"       => 'Select Icon',
                            "param_name"    => "icon",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "section_title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            )
        );

        $default_settings['akcel_icon_box_2'] = array(
            'name' => 'Icon Box 2',
            'base' => 'akcel_icon_box_2',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/icon_box_2.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section SubTitle',
                    "param_name"    => "subtitle",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Title',
                    "param_name"    => "title",
                    "group"         => 'General'
                ),
                array(
                    "type"          => "textfield",
                    "holder"        => "div",
                    "class"         => "",
                    "heading"       => 'Section Description',
                    "param_name"    => "description",
                    "group"         => 'General'
                ),
                array(
                    'type' => 'param_group',
                    'value' => '',
                    'param_name' => 'icon_box_1',
                    "heading"       => 'Add More',
                    'group' => 'Icon Box',
                    'params' => array(
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "selectIcon",
                            "heading"       => 'Select Icon',
                            "param_name"    => "icon",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Title',
                            "param_name"    => "section_title",
                        ),
                        array(
                            "type"          => "textfield",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => 'Section Description',
                            "param_name"    => "description",
                        ),
                    )
                )
            )
        );

        $default_settings['akcel_contact_us_form_1'] = array(
            'name' => 'Contact Us 1',
            'base' => 'akcel_contact_us_form_1',
            'class' => '',
            'category' => 'Akcel',
            'icon' => asset('/themes/frontend/akcel/images/MagicEditor/theme-elements/akcel/contact_us_form_1.png'),
            'description' => 'Shows Section of contact.',
            'css' => '',
            'params' => array(
                array(
                    'type'          =>  'textfield',
                    "holder"        =>  "div",
                    "class"         =>  "",
                    'heading'       =>  'iframe link of map',
                    'param_name'    =>  'iframe',
                    'group'         =>  'General',
                ),
            )
        );

        /* w3cms akcel elements start */

        return $default_settings;
    }

    public function userdefined_settings() {

        $userdefined_settings = array();

        return $userdefined_settings;

    }

}
