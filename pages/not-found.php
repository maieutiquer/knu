<?php defined('kexec') or die('Restricted access'); ?>
<div class="not-found">
  <p>Oops ! La page /<?=$page?> n'existe pas.
  <p><a href="./" rel="nofollow" class="goto-home-404">Retour vers la page d'accueil.</a>
</div>

<footer id="footer" role="contentinfo">
<?php include tmpl_dir.'/footer.php'; ?>
</footer>

<?php die(); ?>
