<?php
function get_body_classes() {

    global $post;
    $return = "";

    // $return .=  some of these things
    if ( is_front_page() ) { $return .=  "is_home "; }
    if ( is_home() )       { $return .=  "is_index is_main_feed "; }
    if ( is_archive() )    { $return .=  "is_index is_archive "; }
    if ( is_category() )   { $return .=  "is_index is_category "; }
    if ( is_tax() )        { $return .=  "is_index is_tax "; }
    if ( is_tag() )        { $return .=  "is_index is_tag "; }
    if ( is_author() )     { $return .=  "is_index is_author "; }
    if ( is_search() )     { $return .=  "is_index is_search "; }
    if ( is_single() )     { $return .=  "is_single is_single_except_page "; }
    if ( is_singular() )   { $return .=  "is_single is_single_any "; }
    if ( is_404() )        { $return .=  "is_404 "; }

    // $return .=  is_page_(page name)
    if( is_page()) {
        $pn = $post->post_name;
        $return .=  "is_page_".$pn." ";
    }

    // $return .=  has_parent_(parent name)
    $post_parent = get_post( $post->post_parent );
    $parentSlug = $post_parent->post_name;

    if ( is_page() && $post->post_parent ) {
        $return .=  "has_parent_".$parentSlug." ";
    }

    // $return .=  is_tpl_(template name)
    $temp = get_page_template();
    if ( $temp != null ) {
        $path = pathinfo($temp);
        $tmp = $path['filename'] . "." . $path['extension'];
        $tn= str_replace(".php", "", $tmp);
        $return .=  "is_tpl_".$tn." ";
    }

    // $return .=  is_term_(term_name)
    $tax_slug = get_query_var( 'taxonomy' );
    $term_slug = get_query_var( 'term' );
    if ( $tax_slug != null && $tax_slug != null ) {
        $return .=  "is_tax_$tax_slug is_term_$term_slug ";
    }

    // Woocommerce
    if ( $theme_config['woocommerce_support'] === true ) {
        if ( is_woocommerce() || is_checkout() || is_cart() || is_account_page() ) {
            $return .=  "is_shop_page is_woocommerce ";
        }

        if ( 'product' == get_post_type() && is_singular() || is_account_page() ) {
            $return .=  "is_shop_single ";
        }

        if ( ! 'product' == get_post_type() && ! is_singular() || ! is_account_page() ) {
            $return .=  "is_shop_loop ";
        }
    }

    // Are they logged in?
    if ( is_user_logged_in() )   { $return .=  "is_logged-in "; }

    return $return;
}

function body_classes() {
    echo get_body_classes();
}