<?php
/**
 * View all bookmarks.
 *
 * @link https://epi.chojna.info.pl
 * @author EPI UJ <epi@uj.edu.pl>
 * @copyright (c) 2017-2020
 */
require_once dirname(__FILE__) . '/inc/debug.inc.php';
require_once dirname(__FILE__) . '/inc/bookmarks.inc.php';

$view = [];
$view['title'] = 'Bookmarks';
$view['template'] = 'index';

$view['bookmarks'] = find_all();

require_once dirname(__FILE__) . '/templates/index.html.php';
?>


