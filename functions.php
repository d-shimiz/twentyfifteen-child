<?php

// Customize "--more--"
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">続きを読む »</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


// Add Original CSS
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles_toc() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/toc.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles_toc' );


// Add Original js
function customjs() {
   wp_enqueue_script( 'custom', get_stylesheet_directory_uri().'/custom.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'customjs');


// short_code Customize
function escape_short_code_terminal( $attr, $content = null ){
    $content = clean_pre($content);
    //$content = trim($content);
    //$content = wpautop( $content );
    $content = str_replace("\t", '    ', $content);
    $content = str_replace('<', '&lt', $content);
    $content = str_replace('>', '>', $content);
    return '<pre class="terminal">'.$content.'</pre>';
    //return '<code>'.$content.'</code>';
}
//add_shortcode('code', 'escape_short_code');
add_shortcode('terminal', 'escape_short_code_terminal');

function escape_short_code_text( $attr, $content = null ){
    $content = clean_pre($content);
    //$content = trim($content);
    //$content = wpautop( $content );
    $content = str_replace("\t", '    ', $content);
    $content = str_replace('<', '&lt', $content);
    $content = str_replace('>', '>', $content);
    return '<pre class="terminal">'.$content.'</pre>';
    //return '<code>'.$content.'</code>';
}
add_shortcode('text', 'escape_short_code_text');
add_shortcode('file', 'escape_short_code_text');


function escape_short_code( $attr, $content = null ){
    $content = clean_pre($content);
    //$content = trim($content);
    //$content = wpautop( $content );
    $content = str_replace("\t", '    ', $content);
    $content = str_replace('<', '&lt', $content);
    $content = str_replace('>', '>', $content);
    return '<code>'.$content.'</code>';
}
add_shortcode('file', 'escape_short_code');


// Customize Comment Post
if (basename($_SERVER["REQUEST_URI"]) == "wp-comments-post.php") {
    if ($_POST['email'] == null || $_POST['email'] == '') {
        $_POST['email'] = 'guest@dshimizu.jp';
    }
}
function custom_comment_form_fields( $fields){
  unset( $fields['email'] ); //「メールアドレス」を非表示
  unset( $fields['url'] ); //「ウェブサイト」を非表示
  return $fields;
}
add_filter( 'comment_form_default_fields', 'custom_comment_form_fields' );

// Hatena Bookmark Button JS
function hatena_bookmark_button_js() {
?>
  <script type="text/javascript" src="//b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
}
add_action('wp_head', 'hatena_bookmark_button_js');


// Google Analytics Tag
function wp_google_analytics(){
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163900450-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-163900450-1');
</script>
<?php
}
add_action('wp_head', 'wp_google_analytics');
?>
