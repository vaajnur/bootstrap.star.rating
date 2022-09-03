<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)
	die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

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
			$rsProperties = CIBlockElement::GetProperty($PARAMS["IBLOCK_ID"], $ELEMENT_ID, "value_id", "asc", array("ACTIVE"=>"Y"));
			$arProperties = array();
			while($arProperty = $rsProperties->Fetch())
			{
				if($arProperty["CODE"]=="vote_count")
					$arProperties["vote_count"] = $arProperty;
				elseif($arProperty["CODE"]=="vote_sum")
					$arProperties["vote_sum"] = $arProperty;
				elseif($arProperty["CODE"]=="rating")
					$arProperties["rating"] = $arProperty;
			}

			$obProperty = new CIBlockProperty;
			$res = true;
			if(!array_key_exists("vote_count", $arProperties))
			{
				$res = $obProperty->Add(array(
					"IBLOCK_ID" => $PARAMS["IBLOCK_ID"],
					"ACTIVE" => "Y",
					"PROPERTY_TYPE" => "N",
					"MULTIPLE" => "N",
					"NAME" => GetMessage("CC_BIV_VOTE_COUNT"),
					"CODE" => "vote_count",
				));
				if($res)
					$arProperties["vote_count"] = array("VALUE"=>0);
			}
			if($res && !array_key_exists("vote_sum", $arProperties))
			{
				$res = $obProperty->Add(array(
					"IBLOCK_ID" => $PARAMS["IBLOCK_ID"],
					"ACTIVE" => "Y",
					"PROPERTY_TYPE" => "N",
					"MULTIPLE" => "N",
					"NAME" => GetMessage("CC_BIV_VOTE_SUM"),
					"CODE" => "vote_sum",
				));
				if($res)
					$arProperties["vote_sum"] = array("VALUE"=>0);
			}
			if($res && !array_key_exists("rating", $arProperties))
			{
				$res = $obProperty->Add(array(
					"IBLOCK_ID" => $PARAMS["IBLOCK_ID"],
					"ACTIVE" => "Y",
					"PROPERTY_TYPE" => "N",
					"MULTIPLE" => "N",
					"NAME" => GetMessage("CC_BIV_VOTE_RATING"),
					"CODE" => "rating",
				));
				if($res)
					$arProperties["rating"] = array("VALUE"=>0);
			}


			$voteСount = $currentRating = $voteSum = 0; 
			$rsProperties2 = CIBlockElement::GetList([], ["IBLOCK_ID" => $PARAMS["IBLOCK_ID"], "ID" => $ELEMENT_ID], false, ['nTopCount' => 1], ['ID', "IBLOCK_ID", "PROPERTY_vote_count", "PROPERTY_rating", "PROPERTY_vote_sum"]);
			if($arProperty = $rsProperties2->Fetch())
			{
				$voteСount = (int)$arProperty['PROPERTY_VOTE_COUNT_VALUE'];
				$currentRating = (float)$arProperty['PROPERTY_RATING_VALUE'];
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