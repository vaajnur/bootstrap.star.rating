<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (isset($arParams['ELEMENT_ID'])) {
	$res = CIblockElement::GetList(
		[],
		[ 'ID' => $arParams['ELEMENT_ID'] ],
		false,
		false,
		['PROPERTY_STAR_RATE']
	);
	$res = $res->GetNextElement();
	$arResult = $res->GetFields();
}


$this->IncludeComponentTemplate();