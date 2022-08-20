<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<input 
    class="star-rating-inputs hidden" 
    id="input-<?=$arParams['ELEMENT_ID'];?>" 
    data-id="<?=$arParams['ELEMENT_ID'];?>" 
    data-iblock-id="<?=$arParams['IBLOCK_ID'];?>" 
    data-template="<?=$templateFolder;?>" 
    value="<?=$arResult['RATING'] ? : 0;?>" 
    type="text" 
    data-min=0 
    data-max=5 
    data-step=1
    data-size="<?=$arParams['SIZE'] ? : 'xs';?>"
    title=""
    data-show-caption="false"
    data-show-clear="false"
    data-language='ru'
>
