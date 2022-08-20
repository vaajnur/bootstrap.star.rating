<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); 

$arComponentDescription = array(
	"NAME" => GetMessage("NAME"),
	"DESCRIPTION" => GetMessage("DESCRIPTION"),
	"ICON" => "/images/rating.gif",
	"CATEGORY" => array(
		"ID" => "content",
	),
	'PATH' => array(
		'ID' => 'comments',
		'NAME' => getMessage('NAME')
	)
);
?>