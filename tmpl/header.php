<?php defined('kexec') or die('Restricted access'); ?>
<div id="header-inner">
  <div id="logo">
    <a href="./"><img src="images/logo.png" alt="logo konsept"></a>
    <p>agence de communication</p>
  </div>
<?php
if ($page==null || $page=="home" || $page=="accueil") {
    include tmpl_dir.'/slogan.php';
} else {
    include tmpl_dir.'/menu.php';
}
?>
</div>
