<?php

function body_classes() {

    global $post;

    // Echo some of these things
    if ( is_front_page() ) { echo "is_home "; }
    if ( is_home() )       { echo "is_index is_main_feed "; }
    if ( is_archive() )    { echo "is_index is_archive "; }
    if ( is_category() )   { echo "is_index is_category "; }
    if ( is_tax() )        { echo "is_index is_tax "; }
    if ( is_tag() )        { echo "is_index is_tag "; }
    if ( is_author() )     { echo "is_index is_author "; }
    if ( is_search() )     { echo "is_index is_search "; }
    if ( is_single() )     { echo "is_single is_single_except_page "; }
    if ( is_singular() )   { echo "is_single is_single_any "; }
    if ( is_404() )        { echo "is_404 "; }

    // Echo is_page_(page name)
    if( is_page()) {
        $pn = $post->post_name;
        echo "is_page_".$pn." ";
    }

    // Echo has_parent_(parent name)
    $post_parent = get_post( $post->post_parent );
    $parentSlug = $post_parent->post_name;

    if ( is_page() && $post->post_parent ) {
            echo "has_parent_".$parentSlug." ";
    }

    // Echo is_tpl_(template name)
    $temp = get_page_template();
    if ( $temp != null ) {
        $path = pathinfo($temp);
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace(".php", "", $tmp);
        echo "is_tpl_".$tn." ";
    }

    // Echo is_term_(term_name)
    $tax_slug = get_query_var( 'taxonomy' );
    $term_slug = get_query_var( 'term' );
    if ( $tax_slug != null && $tax_slug != null ) {
        echo "is_tax_$tax_slug is_term_$term_slug ";
    }

    // Woocommerce
    if ( $theme_config['woocommerce_support'] === true ) {
        if ( is_woocommerce() || is_checkout() || is_cart() || is_account_page() ) {
            echo "is_shop_page is_woocommerce ";
        }

        if ( 'product' == get_post_type() && is_singular() || is_account_page() ) {
            echo "is_shop_single ";
        }

        if ( ! 'product' == get_post_type() && ! is_singular() || ! is_account_page() ) {
            echo "is_shop_loop ";
        }
    }

    // Are they logged in?
    if ( is_user_logged_in() )   { echo "is_logged-in "; }
}