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

$view =[];
$view['title'] = 'Bookmark';
$view['template'] = 'show';

$id = !empty($_GET['id']) ? $_GET['id'] : '';
$view['bookmark'] = get_by_id((int)$id);

require_once dirname(__FILE__) . '/templates/show.html.php';

?>

