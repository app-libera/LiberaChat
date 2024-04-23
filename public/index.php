<?php
defined('ABSPATH') or die("Don't change anything here!");

function liberachat_page( $atts ) {
    $url = APP_LIBERA_CHAT_URLBASE."";
	 if (get_option('liberachat_server') != 'https://web.libera.chat')
        $url = $url."".get_option('liberachat_server');
	 // ? is replaced whit 3 radom numbers 
	 if (get_option('liberachat_nick') != '')
        $url = $url."/?nick=".str_replace("?", rand(100,999), get_option('liberachat_nick'));
     if (get_option('liberachat_style') != '')
        $url = $url."&theme=".get_option('liberachat_style');
	  $channels = isset($atts['chan']) ? $atts['chan'] : '';
     if ($channels == '')
        $channels = get_option('liberachat_chan');
     if ($channels != '')
        $url = $url."".$channels;

?>
<center><iframe marginwidth="0" marginheight="0" src="<?php echo esc_url( $url ); ?>"
<?php
    if (get_option('liberachat_width') != '')
	    echo "width=\"".esc_attr( get_option('liberachat_width'))."\""; ?>
 <?php
    if (get_option('liberachat_height') != '')
        echo "height=\"".esc_attr( get_option('liberachat_height'))."\""; ?>
 scrolling="no" frameborder="0"></iframe></center>
<?php
}

function kiwi_liberachat( $atts ) {
    ob_start();
    liberachat_page( $atts );

    return ob_get_clean();
}
//shortcode
add_shortcode( 'kiwi_liberachat', 'kiwi_liberachat' );
?>
