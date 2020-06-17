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

$id = !empty($_GET['id']) ? $_GET['id'] : '';
$bookmark = get_by_id((int)$id);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Bookmarks</title>
</head>
<body>
<?php if(isset($bookmark) && count($bookmark)): ?>
    <table>

        <tbody>
            <dl>
                <dt>Title</dt>
                <dd><?php echo $bookmark['title'] ?? '';   ?></dd>
                <dt> URL </dt>
                <dd><?php echo $bookmark['url'] ?? '';   ?></dd>
            </dl>

        </tbody>
    </table>
<?php else:   ?>
    <p>No data!</p>
<?php endif;    ?>
</body>
</html>