<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */

$APPLICATION->SetAdditionalCSS($templateFolder . "/star-rating.min.css", true);
$APPLICATION->AddHeadScript($templateFolder . "/star-rating.min.js", true);
$APPLICATION->AddHeadScript($templateFolder . "/locales/ru.js", true);


?>