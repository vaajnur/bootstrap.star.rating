$(document).ready(function () {
    $('.star-rating-inputs').appendTo('.star-rating-container1')
    $('.star-rating-inputs').each(function(){
        let rateValue = parseInt($(this).val()) || 0,
            id = $(this).attr('data-id'),
            iblockId = $(this).attr('data-iblock-id'),
            ajaxURL = $(this).attr('data-template') + "/ajax.php",
            voteVal = BX.getCookie('voted')  === undefined ? [] : JSON.parse(BX.getCookie('voted'))
        $(this).rating({
            displayOnly: voteVal && voteVal.indexOf(id) !== -1 ? true : false // статичный
        });
        // записываем в инпут
        $(this).on('rating:change', function (event, value, caption) {
            let post = {
                newVote   : value,
                elementId : id,
                iblockId  : iblockId,
            }
            BX.ajax.post(
                ajaxURL,
                post,
                function (data) {
                    let d = BX.parseJSON(data);
                    voteVal.push(id)
                    voteVal = JSON.stringify(voteVal)
                    if(d.mess == 'success')
                        BX.setCookie('voted', voteVal, {expires: 24*30*86400, path : "/", secure: false});
                }
            );        
        });
    })
});