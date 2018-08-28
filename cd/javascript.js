jQuery(document).ready(function(){
    jQuery('.dates').click(function () {
        jQuery(this).children('.event').css('display', 'block');

        jQuery(this).find('.close').on('click', function () {
            console.log('eee-click');
            jQuery(this).find('.event').css('display', 'none');
        })
    })
});