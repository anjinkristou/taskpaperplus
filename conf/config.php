<?php
/**
 * default application config files
 *
 */
$config = array();

$config['website_url']      = "http://tasks.kristou.com";
$config['version_number']   = '1.0.0.0 alpha | 05-Nov-2012';
$config['debug_file']       = 'logs/debug.txt';       // relative to App Base Path
$config['log_file']         = 'logs/log.txt';
$config['user_file']        = '_conf/users';
$config['data_dir']         = 'data';
$config['deleted_dir']      = '_deleted/';
$config['cache_dir']        = '_cache/';
$config['hide_tips']        = false;    // hide all pop up tool tips
$config['edit_new_tab']     = true;     // open new tabs in 'edit' state

$config['title']            = 'Kristou Tasks';
$config['default_active']   = 'tasks';
$config['date_format']      = "%d-%b-%Y";   // strftime formatting!  See php help files
?>
