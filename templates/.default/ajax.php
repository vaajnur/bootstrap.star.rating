<?php
use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Main\Localization\Loc;

define('STOP_STATISTICS', true);
define('BX_SECURITY_SHOW_MESSAGE', true);

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (!Loader::includeModule('iblock'))
{
	return;
}

$request = Context::getCurrent()->getRequest();
$post = $request->getPostList()->toArray();

if($post && $post['newVote'] && $post['elementId'] && $post['iblockId']){
    $APPLICATION->IncludeComponent("bitrix:bootstrap.star.rating", "", array(
        "IBLOCK_ID"  => $post['iblockId'],
        "ELEMENT_ID" => $post['elementId'],
        "NEW_VOTE"   => $post['newVote'],
    ), false);
}
