<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $view['title'] ?? ''; ?></title>
</head>
<body>
<?php require_once dirname(__FILE__) . '/' . $view['template'] . '.html.php'; ?>
</body>
</html>
