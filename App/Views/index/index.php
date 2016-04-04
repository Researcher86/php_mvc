<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="/styles/global.css" rel="stylesheet" type="text/css"/>
    <link href="/styles/main.css" rel="stylesheet" type="text/css"/>
    <script src="/js/validate.js" type="text/javascript"></script>
    <script src="/js/functions.js" type="text/javascript"></script>
    <script src="/js/main.js" type="text/javascript"></script>
    <!--    <link rel="shortcut icon" href="/images/--><? //= $this->getPageData('icon'); ?><!--" type="image/png">-->
</head>
<body>
<div id="toolBar">
    <select id="lang" name="lang" onchange="langCanche(this)">
        <option value="ru" <?= $lang->getLang() == 'ru' ? "selected " : '' ?>>Русский</option>
        <option value="en" <?= $lang->getLang() == 'en' ? "selected " : '' ?>>English</option>
    </select>
    <a id="aAuth" href="/auth/logout"><?= $lang->findByKey('exit'); ?></a>
</div>
<?= $content; ?>
</body>
</html>
