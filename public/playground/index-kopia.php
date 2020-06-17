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

$bookmarks = find_all();

?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>Bookmarks</title>
    </head>
    <body>
        <?php if(isset($bookmarks) && count($bookmarks)): ?>
        <table>
            <thead>
            <dl>
                <dt><b>Title</b></dt>
                <dd><b>URL</b></dd>
            </dl>
            </thead>
            <tbody>
            <?php foreach ($bookmarks as $bookmark): ?>
                <dl>
                    <dt><?php echo $bookmark['title'] ?? '';   ?></dt>
                    <dd><?php echo $bookmark['url'] ?? '';   ?></dd>
                </dl>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?php else:   ?>
            <p>No data!</p>
        <?php endif;    ?>
    </body>
</html>
