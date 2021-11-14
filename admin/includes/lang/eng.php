<?php
function lang($lange){

// NAME NAVBAR
static $lang = array(
    'HomeAdmin'   => 'Home',
    'CATEGRIES'   => 'Categories',
    'ITEMS'       => 'Items',
    'MEMBERS'     => 'Members',
    'COMMENTS'     => 'Comments',
    'STATISTICS'  => 'Settings',
    'LOGS'        => 'Logs'
);
    return $lang[$lange];
}

