jQuery(document).ready( function($) {
    function ct_media_upload(button_class) {
        var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
        $('body').on('click', button_class, function(e) {
            var button_id = '#'+$(this).attr('id');
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = $(button_id);
            _custom_media = true;
            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media ) {
                    $('#logo_taller_id').val(attachment.id);
                    $('#logo_taller').val(attachment.url);
                    $('#logo-taller-wrapper').html('<img class="taller_logo_img" src="" />');
                    $('#logo-taller-wrapper .taller_logo_img').attr('src',attachment.url).css('display','block');
                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }
            }
            wp.media.editor.open(button);
            return false;
        });
    }

    ct_media_upload('.ct_tax_media_button.button'); 

    $('body').on('click','.ct_tax_media_remove',function(){
        $('#logo_taller').val('');
        $('#logo_taller_id').val('');
        $('#logo-taller-wrapper').html('<img class="taller_logo_img" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
    });

    // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-service-ajax-response
    $(document).ajaxComplete(function(event, xhr, settings) {
        var queryStringArr = settings.data.split('&');
        if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
            var xml = xhr.responseXML;
            $response = $(xml).find('term_id').text();
            if($response!=""){
                // Clear the thumb image
                $('#logo-taller-wrapper').html('');
            }
        }
    });
});