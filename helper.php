<?php defined('kexec') or die('Restricted access');
const tmpl_dir = 'tmpl';
const pages_dir = 'pages';

// TODO: separate css per page

// declare page title and description
$site_title = 'konsept';
$page_title = null;
$page_title_full = null;
$page_desc = null;
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$page_url = ' /'.$page;

$scripts = '';
$inlineScripts = '
<script>';
$includeJQuery = '
<!--[if lt IE 9]>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<!--<![endif]-->';
$includePopup = '
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/popup.js"></script>';

// initialize menu css classes
$nav_agency_class = '';
$nav_references_class = '';
$nav_services_class = '';
$nav_team_class = '';
$nav_philosophy_class = '';

// menus
switch($page) {
  case 'agence':
  case 'agency':
    $included_page = pages_dir.'/agency.php';
    $nav_agency_class = ' active';
    $agency_submenu = ' opened';
    $page_title = 'presentation';
    break;
  case 'references':
  case 'références':
    $included_page = pages_dir.'/references.php';
    $nav_agency_class = ' active';
    $nav_references_class = 'active';
    $page_title = 'références';
    break;
  case 'prestations':
  case 'services':
    $included_page = pages_dir.'/services.php';
    $nav_services_class = 'active';
    $inlineScripts.= '
document.getElementById("inline-popups").style.display = "none";';
    $scripts.= $includeJQuery;
    $scripts.= $includePopup;
    break;
  case 'equipe':
  case 'équipe':
  case 'team':
    $included_page = pages_dir.'/team.php';
    $nav_team_class = 'active';
    $page_title = 'équipe';
    break;
  case 'philosophie':
  case 'philosophy':
    $included_page = pages_dir.'/philosophy.php';
    $nav_philosophy_class = 'active';
    break;
  case 'accueil':
  case 'home':
  case null:
    $included_page = pages_dir.'/home.php';
    $page_title_full = 'agence de communication à Lausanne - konsept';
    $page_desc = 'Différence, proximité et engagement sont les valeurs fondamentales de l’agence de communication konsept.';
    break;
  case '404':
  case 'not-found':
    $included_page = pages_dir.'/not-found.php';
    header('HTTP/1.0 404 Not Found');
    $page_url='';
  default:
    $included_page = pages_dir.'/not-found.php';
    header('HTTP/1.0 404 Not Found');
    break;
}

$page_title_separator = ' | ';
if (!$page_title) {
  $page_title = $page;
}
if (!$page_title_full) {
  $page_title_full = $page_title.$page_title_separator.$site_title;
}

// check for inline scripts and add them to scripts declaration
if ($inlineScripts != '
<script>') {
  $inlineScripts.= '
</script>';
  $scripts.= $inlineScripts;
}
