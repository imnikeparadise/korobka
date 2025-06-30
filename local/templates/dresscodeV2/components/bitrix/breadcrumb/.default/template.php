<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult)) {
	return "";
}

$strReturn = '<div id="breadcrumbs"><ul>';

$strReturn .= '<nav class="breadcrumb px-0" aria-label="breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

$items = count($arResult);
$proto = $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$site = $proto . $host;
for ($index = 0; $index < $items; $index++) {
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if ($arResult[$index]["LINK"] <> "" && $index != $items - 1) {
		$strReturn .= '
			<li class="breadcrumb-item" id="breadcrumb_' . $index . '" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="' . $site . $arResult[$index]["LINK"] . '" content="' . $site . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="item">
					<span itemprop="name">' . $title . '</span>
				</a>
				<meta itemprop="position" content="' . ($index + 1) . '" />
			</li><li><span class="arrow"> &bull; </span></li>';
	} else {
		$strReturn .= '
			<li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<span title="' . $title . '" itemprop="item" content="' . $site . $APPLICATION->GetCurUri() . '">
					<span itemprop="name">' . $title . '</span>
				</span>
				<meta itemprop="position" content="' . ($index + 1) . '" />
			</li>';
	}
}

$strReturn .= '</div>';

return $strReturn;

/**
<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(empty($arResult))
	return "";
	
$strReturn = '<div id="breadcrumbs"><ul>';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		$strReturn .= '<li itemscope itemtype="http://schema.org/BreadcrumbList"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url"><span itemprop="title">'.$title.'</span></a></li><li><span class="arrow"> &bull; </span></li>';
	else
		$strReturn .= '<li><span class="changeName">'.$title.'</span></li>';
}

$strReturn .= '</ul></div>';

return $strReturn;
?>

*/