<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */

$APPLICATION->SetAdditionalCSS($templateFolder . "/star-rating.css");
$APPLICATION->SetAdditionalCSS("//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css");
$APPLICATION->SetAdditionalCSS("//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
$APPLICATION->AddHeadScript($templateFolder . "/star-rating.js");
$APPLICATION->AddHeadScript($templateFolder . "/locales/ru.js");


?>