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
        if (!taxonomy_exists('taxonomy_concept')) {
            function create_taxonomy_concept()
            {
                register_taxonomy(
                    'taxonomy_concept',
                    array('meet_local', 'trip', 'happening', 'places', 'editor_tip', 'companies'),
                    array(
                        'rewrite'                   => array('slug' => 'upplevelser'),
                        'labels'                     => array(
                            'name'                       => _x('Koncept', 'Taxonomy General Name', 'text_domain'),
                            'singular_name'              => _x('Koncept', 'Taxonomy Singular Name', 'text_domain'),
                            'menu_name'                  => __('Koncept', 'text_domain'),
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
            add_action('init', 'create_taxonomy_concept');
        }
    }
}

new VisithallandCustomTaxonomies();
