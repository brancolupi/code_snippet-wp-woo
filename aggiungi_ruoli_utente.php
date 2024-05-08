<?php 

///////////////// Create user's roles ///////////////
// https://developer.wordpress.org/reference/functions/add_role/
// https://developer.wordpress.org/reference/functions/current_user_can/

add_role( 'Rivenditore', 'rivenditore_capability', array('read'=> true) );

function custom_hide_admin_bar() {
    // Verifica il ruolo dell'utente attuale
    if ( current_user_can('rivenditore_capability') ) {
        // Nascondi la barra di amministrazione per gli utenti con il ruolo "Rivenditore"
        show_admin_bar(false);
    }
}

add_action('after_setup_theme', 'custom_hide_admin_bar');

?>


<?php

function current_user_has_the_role($role_name){
    global $user;
    if( isset( $user->roles ) && is_array( $user->roles ) ){
        // if( in_array( 'Pending', $user->roles ) ){
        if( in_array( $role_name, $user->roles ) ){
            return true;
        }else{
            return false;
        }
    }
}

?>
