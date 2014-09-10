<?php

$options['shell-aliases']['pull'] = '!git pull'; // We've all done it.
$options['shell-aliases']['pulldb'] = '!git pull && drush updatedb';
$options['shell-aliases']['noncore'] = 'pm-list --no-core';
$options['shell-aliases']['wipe'] = 'cache-clear all';
$options['shell-aliases']['unsuck'] = 'pm-disable -y overlay,dashboard';
$options['shell-aliases']['offline'] = 'variable-set -y --always-set maintenance_mode 1';
$options['shell-aliases']['online'] = 'variable-delete -y --exact maintenance_mode';
$options['shell-aliases']['dis-all'] = '!drush -y dis $(drush pml --status=enabled --type=module --no-core --pipe)';

$command_specific['site-install'] = array(
  'account-name' => 'admin', 
  'account-pass' => 'pass',
  'account-mail' => 'no-reply@site.dev',
  'site-name' => 'site',
  'site-mail' => 'no-reply@site.dev',
);


$command_specific['sql-sync'] = array(
  //'sanitize' => TRUE,
  //'sanitize-password' => 'pass',
  'no-cache' => TRUE,
);


$options['alias-path'] = '/Users/chris/.drush/aliases';


$options['structure-tables'] = array(
 'd6' => array('cache', 'cache_block', 'cache_filter', 'cache_form', 'cache_menu', 'cache_page', 'cache_update', 'cache_views', 'cache_views_data', 'history', 'sessions', 'watchdog'),
 'd7' => array('cache', 'cache_block', 'cache_bootstrap', 'cache_field', 'cache_filter', 'cache_form', 'cache_image', 'cache_menu', 'cache_page', 'cache_path', 'cache_update', 'history', 'sessions', 'watchdog'),
);

$command_specific['rsync'] = array('exclude' => '.DS_Store');