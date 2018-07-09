$(document).ready(function(){
    imp_media_init('.logo_taller', '.logo_image_taller', '.media-btn-select');
});

var imp_media_init = function(selector, img_selector, button_selector)  {
    var clicked_button = false;
 
    jQuery(selector).each(function (i, input) {
        var button = jQuery(input).next(button_selector);
        button.click(function (event) {
            event.preventDefault();
            var selected_img;
            clicked_button = jQuery(this);
 
            // check for media manager instance
            if(wp.media.frames.imp_frame) {
                wp.media.frames.imp_frame.open();
                return;
            }
            // configuration of the media manager new instance
            wp.media.frames.imp_frame = wp.media({
                title: 'Seleccionar logo',
                multiple: false,
                library: {
                    type: 'image'
                },
                button: {
                    text: 'Usar logo seleccionado'
                }
            });
 
            // Function used for the image selection and media manager closing
            var imp_media_set_image = function() {
                var selection = wp.media.frames.imp_frame.state().get('selection');
 
                // no selection
                if (!selection) {
                    return;
                }
 
                // iterate through selected elements
                selection.each(function(attachment) {
                    var url = attachment.attributes.url;
                    clicked_button.prev(selector).val(url);
                    console.log(url);
                    console.log(img_selector);
                    jQuery(img_selector).attr('src', url);
                });
            };
 
            // closing event for media manger
            wp.media.frames.imp_frame.on('close', imp_media_set_image);
            // image selection event
            wp.media.frames.imp_frame.on('select', imp_media_set_image);
            // showing media manager
            wp.media.frames.imp_frame.open();
        });
   });
};