<?php defined('kexec') or die('Restricted access');
const tmpl_dir = "tmpl";
const pages_dir = "pages";

// declare page title and description
$page_title_full = null;
$page_desc_full = null;
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

$scripts = '';
$inlineScripts = '
<script>';
$inlineScripts.= '
function selectMenu(){
var menu=document.getElementById("select-menu");
document.location.href = menu.options[menu.selectedIndex].value;
}';
$includeJQuery = '
<!--[if lt IE 9]>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<!--<![endif]-->';
$includeZepto = '
<script src="js/zepto.min.js"></script>
';
$includePopup = '
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/popup.js"></script>';

// TODO: inline critical CSS
$inlineStyle='';

// initialize menu css classes
$nav_agency_class = "";
$nav_references_class = "";
$nav_services_class = "";
$nav_team_class = "";
$nav_philosophy_class = "";

// menus
switch($page) {
  case "agence":
  case "agency":
    $included_page = pages_dir."/agency.php";
    $nav_agency_class = " active";
    $agency_submenu = " opened";
    break;
  case "references":
  case "références":
    $included_page = pages_dir."/references.php";
    $nav_agency_class = " active";
    $nav_references_class = " active";
    break;
  case "prestations":
  case "services":
    $included_page = pages_dir."/services.php";
    $nav_services_class = " active";
    $inlineScripts.= '
document.getElementById("inline-popups").style.display = "none";
';
    $scripts.= $includeJQuery;
    $scripts.= $includePopup;
    break;
  case "equipe":
  case "équipe":
  case "team":
    $included_page = pages_dir."/team.php";
    $nav_team_class = " active";
    break;
  case "philosophie":
  case "philosophy":
    $included_page = pages_dir."/philosophy.php";
    $nav_philosophy_class = " active";
    break;
  case "accueil":
  case "home":
  case null:
  default:
    $included_page = pages_dir."/home.php";
    $page_title_full = "agence de communication à Lausanne - konsept";
    $page_desc_full = "konsept of Charity (kofC) est une association humanitaire à but non lucratif à Lausanne, créée en août 2001 par le kollectif.";
    $inlineScripts = null;
    break;
}

$page_title_separator = " | ";
if (!$page_title_full) {
  $page_title_full = $page.$page_title_separator."konsept - agence de communication à Lausanne";
}

if ($inlineScripts != null) {
    $inlineScripts.= '
</script>';
    $scripts.= $inlineScripts;
}
