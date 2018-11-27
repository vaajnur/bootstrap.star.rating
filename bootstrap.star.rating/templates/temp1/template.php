<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


$id = isset($arParams['ELEMENT_ID']) ? $arParams['ELEMENT_ID'] : 1;
?>

        <input 
        id="input-<?=$id;?>" 
        value="<?=(isset($arResult['PROPERTY_STAR_RATE_VALUE'])? $arResult['PROPERTY_STAR_RATE_VALUE'] : 0);?>" 
<?if(!isset($arResult['PROPERTY_STAR_RATE_VALUE'])){ ?>
        type="text" 
        class="rating" 
        data-min=0 
        data-max=5 
        data-step=1
<? } ?>
        data-size="xs"
        title=""
        data-show-caption="false"
        data-show-clear="false"
        data-language='ru'
        >



<script>
    jQuery(document).ready(function () {
        jQuery("#input-<?=$id;?>").rating({
            displayOnly: <?=(isset($arResult['PROPERTY_STAR_RATE_VALUE'])? 'true' : 
                'false');?> , // статичный
        });
        // записываем в инпут
        $inp = jQuery("#input-<?=$id;?>")
            $inp.on('rating:change', function (event, value, caption) {
                $('#477').val(value)
            });
    });
    
</script>
