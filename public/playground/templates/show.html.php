
<?php if(isset($view['bookmark']) && count($view['bookmark'])): ?>
    <table>

        <tbody>
        <?php $bookmark = $view['bookmark']; ?>
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