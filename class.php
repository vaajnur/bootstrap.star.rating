<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
	die();

use Bitrix\Main\Localization\Loc;
use Bitrix\B24Connector\Button;
use Bitrix\Main\Type\DateTime;
use Bitrix\Main\Type\Date;
use Bitrix\Main\Loader;
use Bitrix\Main\Context;
use Bitrix\Main\Web\Json;

Loc::loadMessages(__FILE__);

class BootstrapStarRating extends \CBitrixComponent
{
	public function executeComponent()
    {
    	if (!Loader::includeModule('iblock'))
		{
			return;
		}
		$PARAMS = $this->arParams;
		$ELEMENT_ID = $PARAMS["ELEMENT_ID"];
		if($ELEMENT_ID>0)
		{
			$obProperty = new CIBlockProperty;
			$voteСount = $currentRating = $voteSum = 0; 
			$rsProperties = CIBlockElement::GetList([], ["IBLOCK_ID" => $PARAMS["IBLOCK_ID"], "ID" => $ELEMENT_ID], false, ['nTopCount' => 1], ['ID', "IBLOCK_ID", "PROPERTY_vote_count", "PROPERTY_rating", "PROPERTY_vote_sum"]);
			if($arProperty = $rsProperties->Fetch())
			{
				if($arProperty['PROPERTY_VOTE_COUNT_VALUE'] === null){
					$res = $obProperty->Add(array(
						"IBLOCK_ID" => $PARAMS["IBLOCK_ID"],
						"ACTIVE" => "Y",
						"PROPERTY_TYPE" => "N",
						"MULTIPLE" => "N",
						"NAME" => GetMessage("CC_BIV_VOTE_COUNT"),
						"CODE" => "vote_count",
					));

				}
				$voteСount = (int)$arProperty['PROPERTY_VOTE_COUNT_VALUE'];

				if($arProperty['PROPERTY_RATING_VALUE'] === null){
					$res = $obProperty->Add(array(
						"IBLOCK_ID" => $PARAMS["IBLOCK_ID"],
						"ACTIVE" => "Y",
						"PROPERTY_TYPE" => "N",
						"MULTIPLE" => "N",
						"NAME" => GetMessage("CC_BIV_VOTE_COUNT"),
						"CODE" => "rating",
					));
				}
				$currentRating = (float)$arProperty['PROPERTY_RATING_VALUE'];

				if($arProperty['PROPERTY_VOTE_SUM_VALUE'] === null){
					$res = $obProperty->Add(array(
						"IBLOCK_ID" => $PARAMS["IBLOCK_ID"],
						"ACTIVE" => "Y",
						"PROPERTY_TYPE" => "N",
						"MULTIPLE" => "N",
						"NAME" => GetMessage("CC_BIV_VOTE_COUNT"),
						"CODE" => "vote_sum",
					));
				}
				$voteSum = (int)$arProperty['PROPERTY_VOTE_SUM_VALUE'];
			}
		}

		$newRating = false;
		if($PARAMS["NEW_VOTE"] && $PARAMS["ELEMENT_ID"] && $PARAMS["IBLOCK_ID"]){
			$voteСount += 1;
			$voteSum += $PARAMS["NEW_VOTE"];
			$newRating = $voteSum / $voteСount;
			CIBlockElement::SetPropertyValuesEx($PARAMS["ELEMENT_ID"], $PARAMS["IBLOCK_ID"], ['rating' => $newRating]);
			CIBlockElement::SetPropertyValuesEx($PARAMS["ELEMENT_ID"], $PARAMS["IBLOCK_ID"], ['vote_count' => $voteСount]);
			CIBlockElement::SetPropertyValuesEx($PARAMS["ELEMENT_ID"], $PARAMS["IBLOCK_ID"], ['vote_sum' => $voteSum]);
			echo Json::encode(['mess' => 'success']);
			return true;
		}

        $this->arResult['RATING'] = $currentRating;
        $this->includeComponentTemplate();
        return $this->arResult;
    }
}