<?php defined('kexec') or die('Restricted access'); ?>
<div id="header-inner">
  <div id="logo">
    <a href="<?=$baseUrl?>" itemprop="url"><img alt="konsept, agence de communication, Lausanne" src="<?=$baseUrl?>images/logo.png" width="276" height="104" itemprop="logo"></a>
    <p>agence de communication
  </div>
<?php
if ($page==null || $page=="home" || $page=="accueil") {
  include tmpl_dir.'/slogan.php';
} else {
  include tmpl_dir.'/menu.php';
}
?>
</div>
