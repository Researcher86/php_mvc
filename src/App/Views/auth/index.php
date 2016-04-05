<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link href="/styles/global.css" rel="stylesheet" type="text/css"/>
    <link href="/styles/login.css" rel="stylesheet" type="text/css"/>
    <script src="/js/validate.js" type="text/javascript"></script>
    <script src="/js/functions.js" type="text/javascript"></script>
    <script src="/js/login.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="/images/<?= $icon; ?>" type="image/png">
</head>
<body>
<div id="toolBar">
    <select id="lang" name="lang" onchange="langCanche(this)">
        <option value="ru" <?= $lang->getLang() == 'ru' ? "selected " : '' ?>>Русский</option>
        <option value="en" <?= $lang->getLang() == 'en' ? "selected " : '' ?>>English</option>
    </select>
    <a id="aReg" href="/auth/registration"><?= $lang->findByKey('loginRegTitle'); ?></a>
    <span>/</span>
    <a id="aAuth" href="/auth"><?= $lang->findByKey('login'); ?></a>
</div>
<?= $content ?>
</body>
</html>
