<?php
const kexec = 1;
require 'helper.php';
?>
<!DOCTYPE html>

<html>

<head>
<?php include tmpl_dir.'/head.php'; ?>
</head>

<body>

<header id="header" role="banner">
<?php include tmpl_dir.'/header.php'; ?>
</header>

<main id="main" role="main">
<?php include $included_page; ?>
</main>

<footer id="footer" role="contentinfo">
<?php include tmpl_dir.'/footer.php'; ?>
</footer>
<?php include tmpl_dir.'/scripts.php'; ?>


</body>

</html>