<?php defined('kexec') or die('Restricted access'); ?>
<nav role="navigation" id="menu-holder">
    <ul id="nav">
        <li id="nav-agency" class="parent<?=$nav_agency_class;?>">
            <a href="agence">agence</a>
            <ul class="nav-child">
                <li id="nav-references" class="<?=$nav_references_class;?>">
                    <a href="references">références</a>
            </ul>
        <li id="nav-services" class="<?=$nav_services_class;?>"><a href="prestations">prestations</a>
        <li id="nav-team" class="<?=$nav_team_class;?>"><a href="equipe">équipe</a>
        <li id="nav-philosophy" class="<?=$nav_philosophy_class;?>"><a href="philosophie">philosophie</a>
        <li id="nav-shopk2"><a href="k2" target="_blank">shop k²</a>
        <li id="nav-kofc"><a href="kofc" target="_blank">konsept of&nbsp;Charity</a>
    </ul>
</nav>
<div id="select-menu-holder">
    <select id="select-menu" onchange="selectMenu()">
        <option value="" disabled selected>&gt;&gt; menu &lt;&lt;
        <option value="agence">agence
        <option value="references">références
        <option value="prestations">prestations
        <option value="equipe">équipe
        <option value="philosophie">philosophie
        <option value="k2">shop k²
        <option value="kofc">konsept of Charity
        <option value="humankonsept">human konsept
    </select>
</div>
