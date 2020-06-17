
<?php if(isset($view['bookmarks']) && count($view['bookmarks'])): ?>
    <table>
        <thead>
        <dl>
            <dt><b>Title</b></dt>
            <dd><b>URL</b></dd>
        </dl>
        </thead>
        <tbody>
        <?php foreach ($view['bookmarks'] as $bookmark): ?>
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

