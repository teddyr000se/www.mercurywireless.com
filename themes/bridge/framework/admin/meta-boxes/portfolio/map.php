<?php
//$qode_custom_sidebars = array();
//foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
//	if(isUserMadeSidebar(ucwords($sidebar['name']))){
//		$qode_custom_sidebars[$sidebar['id']] = ucwords( $sidebar['name']);
//	}
//}

$qode_pages = array();
$pages = get_pages(); 
foreach($pages as $page) {
	$qode_pages[$page->ID] = $page->post_title;
}



//Portfolio Images

$qodePortfolioImages = new QodeMetaBox("portfolio_page", "Qode Portfolio Images (multiple upload)");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_images",$qodePortfolioImages);

	$qode_portfolio_image_gallery = new QodeMultipleImages("qode_portfolio-image-gallery","Portfolio Images","Choose your portfolio images");
	$qodePortfolioImages->addChild("qode_portfolio-image-gallery",$qode_portfolio_image_gallery);

/*//Portfolio Images/Videos

$qodePortfolioImagesVideos = new QodeMetaBox("portfolio_page", "Qode Portfolio Images/Videos (single upload)");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_images_videos",$qodePortfolioImagesVideos);

	$qode_portfolio_images_videos = new QodeImagesVideos("Portfolio Images/Videos","ThisIsDescription");
	$qodePortfolioImagesVideos->addChild("qode_portfolio_images_videos",$qode_portfolio_images_videos);
*/
//Portfolio Images/Videos 2

$qodePortfolioImagesVideos2 = new QodeMetaBox("portfolio_page", "Qode Portfolio Images/Videos (single upload)");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_images_videos2",$qodePortfolioImagesVideos2);

	$qode_portfolio_images_videos2 = new QodeImagesVideosFramework("Portfolio Images/Videos 2","ThisIsDescription");
	$qodePortfolioImagesVideos2->addChild("qode_portfolio_images_videos2",$qode_portfolio_images_videos2);

//Portfolio Additional Sidebar Items

$qodeAdditionalSidebarItems = new QodeMetaBox("portfolio_page", "Qode Additional Portfolio Sidebar Items");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_properties",$qodeAdditionalSidebarItems);

	$qode_portfolio_properties = new QodeOptionsFramework("Portfolio Properties","ThisIsDescription");
	$qodeAdditionalSidebarItems->addChild("qode_portfolio_properties",$qode_portfolio_properties);


//General

$qodeGeneral = new QodeMetaBox("portfolio_page", "Qode General");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_general",$qodeGeneral);

    $qode_portfolio_date = new QodeMetaField("date","qode_portfolio_date","","Date","Set date for portfolio item");
    $qodeGeneral->addChild("qode_portfolio_date",$qode_portfolio_date);

	$qode_page_background_color = new QodeMetaField("color","qode_page_background_color","","Page Background Color","Choose the page background (body) color");
	$qodeGeneral->addChild("qode_page_background_color",$qode_page_background_color);

	$qode_show_animation = new QodeMetaField("selectblank", "qode_show-animation", "", "Page Transition", 'Choose a type of transition between loading pages.', array(
		"no_animation" => "No Animation",
		"updown" => "Up / Down",
		"fade" => "Fade",
		"updown_fade" => "Up/Down (In) / Fade (Out)",
		"leftright" => "Left / Right"
	), array(), "enable_grid_elements", array("yes"));
	$qodeGeneral->addChild("qode_show-animation", $qode_show_animation);

	$page_transitions_notice = new QodeNotice("Page Transition",'Choose a a type of transition between loading pages. In order for animation to work properly, you must choose "Post name" in permalinks settings', "AJAX Page transitions are disabled due to VC Grid Elements", "enable_grid_elements","no");
	$qodeGeneral->addChild("page_transitions_notice",$page_transitions_notice);

	$qode_revolution_slider = new QodeMetaField("text","qode_revolution-slider","","Layer Slider or Qode Slider Shortcode","Copy and paste your shortcode located in Qode Slider -> Slider");
	$qodeGeneral->addChild("qode_revolution-slider",$qode_revolution_slider);

	$qode_choose_portfolio_single_view = new QodeMetaField("selectblank","qode_choose-portfolio-single-view","","Portfolio Type",'Choose a portfolio type', array(
		"1" => "Portfolio small images",
		"2" => "Portfolio small slider",
		"5" => "Portfolio big images",
		"3" => "Portfolio big slider",
		"4" => "Portfolio custom - in grid",
		"7" => "Portfolio custom - full width",
		"6" => "Portfolio gallery"
	),
        array("dependence" => true,
            "hide" => array(
                ""=>"#qodef_qode_choose_number_of_portfolio_columns_container",
                "1"=>"#qodef_qode_choose_number_of_portfolio_columns_container",
                "2"=>"#qodef_qode_choose_number_of_portfolio_columns_container",
                "3"=>"#qodef_qode_choose_number_of_portfolio_columns_container",
                "4"=>"#qodef_qode_choose_number_of_portfolio_columns_container",
                "5"=>"#qodef_qode_choose_number_of_portfolio_columns_container",
                "7"=>"#qodef_qode_choose_number_of_portfolio_columns_container"
            ),
            "show" => array(
                "6"=>"#qodef_qode_choose_number_of_portfolio_columns_container")
        )
    );
	$qodeGeneral->addChild("qode_choose-portfolio-single-view",$qode_choose_portfolio_single_view);

    $qode_choose_number_of_portfolio_columns_container = new QodeContainer("qode_choose_number_of_portfolio_columns_container","qode_choose-portfolio-single-view","no",array("", "1", "2", "3", "4", "5", "7"));
    $qodeGeneral->addChild("qode_choose_number_of_portfolio_columns_container",$qode_choose_number_of_portfolio_columns_container);

	$qode_choose_number_of_portfolio_columns = new QodeMetaField("selectblank","qode_choose-number-of-portfolio-columns","","Number of Columns",'Enter the number of columns for Portfolio Gallery type', array(
		"2" => "2 Columns",
		"3" => "3 Columns",
		"4" => "4 Columns"
	));

    $qode_choose_number_of_portfolio_columns_container->addChild("qode_choose-number-of-portfolio-columns",$qode_choose_number_of_portfolio_columns);

	$qode_portfolio_image_galery_orientation = new QodeMetaField("select","qode_portfolio_gallery_image_orientation","full","Image Proportions","Choose image proportions for Portfolio Gallery type",array(
		"full" => "Original",
		"portfolio-square" => "Square",
		"portfolio-portrait" => "Portrait",
		"portfolio-landscape" => "Landscape"
	));

	$qode_choose_number_of_portfolio_columns_container->addChild("qode_portfolio-external-link",$qode_portfolio_image_galery_orientation);


	$qode_choose_portfolio_list_page = new QodeMetaField("selectblank","qode_choose-portfolio-list-page","",'"Back To" Link','Choose "Back To" page to link from portfolio Single Project page',$qode_pages);
	$qodeGeneral->addChild("qode_choose-portfolio-list-page",$qode_choose_portfolio_list_page);

	$qode_portfolio_external_link = new QodeMetaField("text","qode_portfolio-external-link","","Portfolio External Link","Enter URL to link from Portfolio List page");
	$qodeGeneral->addChild("qode_portfolio-external-link",$qode_portfolio_external_link);

	$qode_portfolio_type_masonry_style = new QodeMetaField("select","qode_portfolio_type_masonry_style","","Dimensions for Masonry",'Choose image layout when it appears in Masonry type portfolio lists', array(
		"default" => "Default",
		"large_width" => "Large width",
		"large_height" => "Large height",
		"large_width_height" => "Large width/height"
	));
	$qodeGeneral->addChild("qode_portfolio_type_masonry_style",$qode_portfolio_type_masonry_style);

// Header

$qodeHeader = new QodeMetaBox("portfolio_page", "Qode Header","vertical_area",array("yes"));
$qodeFramework->qodeMetaBoxes->addMetaBox("porfolio_header",$qodeHeader);

	$qode_header_style = new QodeMetaField("selectblank","qode_header-style","","Header Skin","Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style", array(
       "light" => "Light",
       "dark" => "Dark"
      ));
	$qodeHeader->addChild("qode_header-style",$qode_header_style);

	$qode_header_color_per_page = new QodeMetaField("color","qode_header_color_per_page","","Initial Header Background Color","Choose a background color for header area");
	$qodeHeader->addChild("qode_header_color_per_page",$qode_header_color_per_page);

	$qode_header_color_transparency_per_page = new QodeMetaField("text","qode_header_color_transparency_per_page","","Initial Header Transparency","Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)", array(), array("col_width" => 3));
	$qodeHeader->addChild("qode_header_color_transparency_per_page",$qode_header_color_transparency_per_page);

	$qode_page_scroll_amount_for_sticky = new QodeMetaField("text","qode_page_scroll_amount_for_sticky","","Scroll amount for sticky header appearance (px)","Define scroll amount for sticky header appearance", array(), array("col_width" => 3),"header_bottom_appearance",array( "regular","fixed","fixed_hiding") );
	$qodeHeader->addChild("qode_page_scroll_amount_for_sticky",$qode_page_scroll_amount_for_sticky);

// Left Menu Area

$qodeLeftMenuArea = new QodeMetaBox("portfolio_page", "Qode Left Menu Area","vertical_area",array("no"));
$qodeFramework->qodeMetaBoxes->addMetaBox("porfolio_left_menu",$qodeLeftMenuArea);

	$qode_page_vertical_area_transparency = new QodeMetaField("selectblank","qode_page_vertical_area_transparency","","Enable transparent left menu area","Enabling this option will make Left Menu background transparent ", array(
       "no" => "No",
       "yes" => "Yes"
      ));
	$qodeLeftMenuArea->addChild("qode_page_vertical_area_transparency",$qode_page_vertical_area_transparency);

	$qode_page_vertical_area_background = new QodeMetaField("color","qode_page_vertical_area_background","","Left Menu Area Background Color","Choose a color for Left Menu background");
	$qodeLeftMenuArea->addChild("qode_page_vertical_area_background",$qode_page_vertical_area_background);

	$qode_page_vertical_area_background_image = new QodeMetaField("image","qode_page_vertical_area_background_image","","Left Menu Area Background Image","Choose an image for Left Menu background");
	$qodeLeftMenuArea->addChild("qode_page_vertical_area_background_image",$qode_page_vertical_area_background_image);

// Title

$qodeTitle = new QodeMetaBox("portfolio_page", "Qode Title");
$qodeFramework->qodeMetaBoxes->addMetaBox("porfolio_title",$qodeTitle);

	$qode_show_page_title = new QodeMetaField("yesempty","qode_show-page-title","","Don't Show Title Area","Enable this option to turn off page title area", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_qode_page_title_area_container", "dependence_show_on_yes" => ""));
	$qodeTitle->addChild("qode_show-page-title",$qode_show_page_title);

	$qode_page_title_area_container = new QodeContainer("qode_page_title_area_container","qode_show-page-title","yes");
	$qodeTitle->addChild("qode_page_title_area_container",$qode_page_title_area_container);

	$qode_animate_page_title = new QodeMetaField("selectblank","qode_animate-page-title","no","Animations","Choose an animation for Title Area",array(
		"no" => "No animation",
		"text_right_left" => "Text right to left",
		"area_top_bottom" => "Title area top to bottom"
	));
	$qode_page_title_area_container->addChild("qode_animate_page_title",$qode_animate_page_title);

	$qode_show_page_title_text = new QodeMetaField("yesempty","qode_show-page-title-text","","Don't Show Title Text","Enable this option to hide the title text", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_qode_title_text_container", "dependence_show_on_yes" => ""));
	$qode_page_title_area_container->addChild("qode_show-page-title-text",$qode_show_page_title_text);

	$qode_title_text_container = new QodeContainer("qode_title_text_container","qode_show-page-title-text","yes");
	$qode_page_title_area_container->addChild("qode_title_text_container",$qode_title_text_container);

	$qode_page_title_position = new QodeMetaField("selectblank","qode_page_title_position","","Title Text Alignment","Specify Title text alignment",array(
		"left" => "Left",
		"center" => "Center",
		"right" => "Right"
	));
	$qode_title_text_container->addChild("qode_page_title_position",$qode_page_title_position);

	$group1 = new QodeGroup("Title Text Style","Define styles for text in Title Area");
	$qode_title_text_container->addChild("group1",$group1);

	$row1 = new QodeRow();
	$group1->addChild("row1",$row1);

	$qode_page_title_color = new QodeMetaField("colorsimple","qode_page-title-color","","Text Color","ThisIsDescription");
	$row1->addChild("qode_page-title-color",$qode_page_title_color);

	$qode_page_title_font_size = new QodeMetaField("selectblanksimple","qode_page_title_font_size","","Text Size","ThisIsDescription",array(
		"small" => "Small",
		"medium" => "Medium",
		"large" => "Large"
	));
	$row1->addChild("qode_page_title_font_size",$qode_page_title_font_size);

	$qode_title_text_shadow = new QodeMetaField("selectblanksimple","qode_title_text_shadow","","Text Shadow","ThisIsDescription",array(
		"no" => "No",
		"yes" => "yes"
	));
	$row1->addChild("qode_title_text_shadow",$qode_title_text_shadow);

	$qode_page_title_background_color = new QodeMetaField("color","qode_page-title-background-color","","Background Color","Choose background color for Title Area");
	$qode_page_title_area_container->addChild("qode_page-title-background-color",$qode_page_title_background_color);

	$qode_show_page_title_image = new QodeMetaField("yesempty","qode_show-page-title-image","","Don't Show Background Image","Enable this option to hide background image in Title Area", array(), array("dependence" => true, "dependence_hide_on_yes" => "#qodef_qode_background_image_container", "dependence_show_on_yes" => ""));
	$qode_page_title_area_container->addChild("qode_show-page-title-image",$qode_show_page_title_image);

	$qode_background_image_container = new QodeContainer("qode_background_image_container","qode_show-page-title-image","yes");
	$qode_page_title_area_container->addChild("qode_background_image_container",$qode_background_image_container);

	$qode_title_image = new QodeMetaField("image","qode_title-image","","Background Image","Choose a background image for Title Area");
	$qode_background_image_container->addChild("qode_title-image",$qode_title_image);

	$qode_title_overlay_image = new QodeMetaField("image","qode_title-overlay-image","","Pattern Overlay Image","Choose an image to be used as pattern over Title Area");
	$qode_background_image_container->addChild("qode_title-overlay-image",$qode_title_overlay_image);

	$qode_responsive_title_image = new QodeMetaField("selectblank","qode_responsive-title-image","","Responsive Background Image","Do you want to make Title background image responsive?", array(
			"no" => "No",
			"yes" => "Yes"),
		array("dependence" => true,
			"hide" => array(
				"yes"=>"#qodef_qode_responsive_title_image_container, #qodef_qode_title-height"),
			"show" => array(
				""=>"#qodef_qode_responsive_title_image_container, #qodef_qode_title-height",
				"no"=>"#qodef_qode_responsive_title_image_container, #qodef_qode_title-height") ));
	$qode_background_image_container->addChild("qode_responsive-title-image",$qode_responsive_title_image);


	$qode_responsive_title_image_container = new QodeContainer("qode_responsive_title_image_container","qode_responsive-title-image","yes");
	$qode_background_image_container->addChild("qode_responsive_title_image_container",$qode_responsive_title_image_container);

	$qode_fixed_title_image = new QodeMetaField("selectblank","qode_fixed-title-image","","Parallax Background Image","Do you want background image to have parallax effect?", array(
		"no" => "No",
		"yes" => "Yes",
		"yes_zoom" => "Yes, with zoom out"
	));
	$qode_responsive_title_image_container->addChild("qode_fixed-title-image",$qode_fixed_title_image);

	$qode_title_height = new QodeMetaField("text","qode_title-height","","Title Height (px)","Set a height for Title Area in pixels", array(), array("col_width" => 3));
	$qode_page_title_area_container->addChild("qode_title-height",$qode_title_height);

	$qode_separator_bellow_title = new QodeMetaField("select","qode_separator_bellow_title","","Separator Under Title Text","Do you want to have a separator under title text?", array( "" => "",
		"no" => "No",
		"yes" => "Yes"
	));
	$qode_page_title_area_container->addChild("qode_separator_bellow_title",$qode_separator_bellow_title);

	$qode_title_separator_color = new QodeMetaField("color","qode_title_separator_color","","Separator Color","Choose a color for separator");
	$qode_page_title_area_container->addChild("qode_title_separator_color",$qode_title_separator_color);

	$qode_enable_breadcrumbs = new QodeMetaField("selectblank","qode_enable_breadcrumbs","","Enable Breadcrumbs","Do you want to display breadcrumbs in title area?", array(
		"no" => "No",
		"yes" => "Yes"
	));
	$qode_page_title_area_container->addChild("qode_enable_breadcrumbs",$qode_enable_breadcrumbs);

	$qode_page_breadcrumbs_color = new QodeMetaField("color","qode_page_breadcrumbs_color","","Breadcrumbs Color","Choose a color for breadcrumbs text ");
	$qode_page_title_area_container->addChild("qode_page_breadcrumbs_color",$qode_page_breadcrumbs_color);

	$qode_page_subtitle = new QodeMetaField("text","qode_page_subtitle","","Subtitle Text","Enter your subtitle text");
	$qode_page_title_area_container->addChild("qode_page_subtitle",$qode_page_subtitle);

	$qode_page_subtitle_color = new QodeMetaField("color","qode_page_subtitle_color","","Subtitle Text Color","Choose a color for subtitle text");
	$qode_page_title_area_container->addChild("qode_page_subtitle_color",$qode_page_subtitle_color);


// Content Bottom

$qodeContentBottom = new QodeMetaBox("portfolio_page", "Qode Content Bottom");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_content_bottom_page",$qodeContentBottom);

	$qode_enable_content_bottom_area = new QodeMetaField("selectblank","qode_enable_content_bottom_area","","Show Content Bottom Area","Do you want to show content bottom area?", array(
       "no" => "No",
       "yes" => "Yes"
      ),
      array("dependence" => true,
      	"hide" => array(
      		"no"=>"#qodef_qode_enable_content_bottom_area_container",
			""=>"#qodef_qode_enable_content_bottom_area_container"),
      	"show" => array(
      		"yes"=>"#qodef_qode_enable_content_bottom_area_container") ));
	$qodeContentBottom->addChild("qode_enable_content_bottom_area",$qode_enable_content_bottom_area);
	
	$qode_enable_content_bottom_area_container = new QodeContainer("qode_enable_content_bottom_area_container","qode_enable_content_bottom_area","no",array("", "no"));
	$qodeContentBottom->addChild("qode_enable_content_bottom_area_container",$qode_enable_content_bottom_area_container);

		$qode_content_bottom_background_color = new QodeMetaField("color","qode_content_bottom_background_color","","Background Color","Choose a color for content bottom area");
		$qode_enable_content_bottom_area_container->addChild("qode_content_bottom_background_color",$qode_content_bottom_background_color);
	
		$qode_choose_content_bottom_sidebar = new QodeMetaField("selectblank","qode_choose_content_bottom_sidebar","","Custom Widget","Choose Custom Widget area to display",$qode_custom_sidebars);
		$qode_enable_content_bottom_area_container->addChild("qode_choose_content_bottom_sidebar",$qode_choose_content_bottom_sidebar);
	
		$qode_content_bottom_sidebar_in_grid = new QodeMetaField("selectblank","qode_content_bottom_sidebar_in_grid","","Display in Grid","Enabling this option will place Content Bottom in grid",array(
	       "no" => "No",
	       "yes" => "Yes"
	      ));
		$qode_enable_content_bottom_area_container->addChild("qode_content_bottom_sidebar_in_grid",$qode_content_bottom_sidebar_in_grid);

// Side Bar Area

$qodeSideBar = new QodeMetaBox("portfolio_page", "Qode Sidebar");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_side_bar",$qodeSideBar);

	$qode_show_sidebar = new QodeMetaField("selectblank","qode_portfolio_show_sidebar","default","Layout","Choose the sidebar layout",array( "default" => "Default",
       "1" => "Sidebar 1/3 right",
       "2" => "Sidebar 1/4 right",
       "3" => "Sidebar 1/3 left",
       "4" => "Sidebar 1/4 left",
      ));
	$qodeSideBar->addChild("qode_portfolio_show_sidebar",$qode_show_sidebar);

	$qode_choose_sidebar = new QodeMetaField("selectblank","qode_choose-sidebar","default","Choose Widget Area in Sidebar","Choose Custom Widget area to display in Sidebar", $qode_custom_sidebars);
	$qodeSideBar->addChild("qode_choose-sidebar",$qode_choose_sidebar);

// SEO

$qodeSeo = new QodeMetaBox("portfolio_page", "Qode SEO");
$qodeFramework->qodeMetaBoxes->addMetaBox("portfolio_seo",$qodeSeo);

$seo_title = new QodeMetaField("text","qode_seo_title","","SEO Title","Enter custom Title for this page");
$qodeSeo->addChild("qode_seo_title",$seo_title);

$seo_keywords = new QodeMetaField("text","qode_seo_keywords","","Meta Keywords","Enter the list of keywords separated by comma");
$qodeSeo->addChild("qode_seo_keywords",$seo_keywords);

$seo_description = new QodeMetaField("textarea","qode_seo_description","","Meta Description","Enter meta description for this page");
$qodeSeo->addChild("qode_seo_description",$seo_description);