<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addCss($templateFolder . "/star-rating.min.css", true);
Asset::getInstance()->addJs($templateFolder . "/star-rating.min.js", true);
Asset::getInstance()->addJs($templateFolder . "/locales/ru.js", true);
