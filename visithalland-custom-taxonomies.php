<?php

/*
Plugin Name: Visithalland Custom Taxonomies
Plugin URI: https://github.com/RegionHalland/visithalland-cms
Description: Wordpress plugin for adding custom taxonomy used on https://www.visithalland.com.
Author: Sebastian Marcusson
Version: 0.9
Author URI: https://github.com/sebastiansson
*/

class VisithallandCustomTaxonomies
{
    public function __construct()
    {
        $this->registerCustomTaxonomies();
    }

    public function registerCustomTaxonomies()
    {
        // We only want to register the taxonomy if it does not already exist.
        if (!taxonomy_exists('experience')) {
            function create_experience()
            {
                register_taxonomy(
                    'experience',
                    array('meet_local', 'spotlight', 'happening', 'places', 'editor_tip', 'companies', 'tips_guides'),
                    array(
                        'rewrite'                   => array('slug' => 'upplevelser'),
                        'labels'                     => array(
                            'name'                       => _x('Upplevelse', 'Taxonomy General Name', 'text_domain'),
                            'singular_name'              => _x('Upplevelse', 'Taxonomy Singular Name', 'text_domain'),
                            'menu_name'                  => __('Upplevelse', 'text_domain'),
                        ),
                        'hierarchical'               => true,
                        'public'                     => true,
                        'show_ui'                    => true,
                        'show_admin_column'          => true,
                        'show_in_nav_menus'          => true,
                        'show_tagcloud'              => true,
                        'show_in_rest'               => true,
                    )
                );
            }
            add_action('init', 'create_experience');
        }
    }
}

new VisithallandCustomTaxonomies();
