<?php

    add_action( 'servicios_edit_form_fields', 'add_image_service', 1, 2);
    if(!function_exists('add_image_service')) {
        function add_image_service($tag) {
           //check for existing taxonomy meta for term ID
            $t_id = $tag->term_id;
            $term_meta = get_option( "taxonomy_$t_id");
            //$image_id = $term_meta['service_image']['service_image_id'];
            //$image_url = $term_meta['service_image']['service_image'];
            ?>
            <table class="form-table">
                <tbody>
                    <tr class="form-field term-group-wrap">
                     <th scope="row">
                       <label for="service_image_id"><?php _e( 'Seleccion la imagine/icono del servicio', IMPS_NS ); ?></label>
                     </th>
                     <td class="img-service-column">
                        <div id="service-image-wrapper">
                         <?php if ( $term_meta['service_image_id'] ) { ?>
                           <?php echo wp_get_attachment_image ( $term_meta['service_image_id'], 'thumbnail' ); ?>
                         <?php } ?>
                        </div>
                     </td>
                     <td>
                       <input type="hidden" id="service_image_id" name="term_meta[service_image_id]" value="<?php echo $term_meta['service_image_id'] ? $term_meta['service_image_id'] : ''; ?>">
                       <input type="text" id="service_image" name="term_meta[service_image]" placeholder="Puedes poner aquí la URL" value="<?php echo $term_meta['service_image'] ? $term_meta['service_image'] : ''; ?>">
                       <p>
                         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Agregar Imagen', 'hero-theme' ); ?>" />
                         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Borrar Imagen', 'hero-theme' ); ?>" />
                       </p>
                     </td>
                   </tr>
                </tbody>
            </table>
            <?php
        }
    }

    // this saves the fields
add_action('created_servicios','save_image_servicio', 10, 2);
    add_action( 'edited_servicios', 'save_image_servicio', 10, 2);
    // save extra taxonomy fields callback function
    function save_image_servicio( $term_id ) {
        if ( isset( $_POST['term_meta'] ) ) {
            $t_id = $term_id;
            $term_meta = get_option( "taxonomy_$t_id");
            $cat_keys = array_keys($_POST['term_meta']);
                foreach ($cat_keys as $key){
                if (isset($_POST['term_meta'][$key])){
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            //save the option array
            update_option( "taxonomy_$t_id", $term_meta );
        }
    }

    add_action( 'admin_enqueue_scripts', 'load_media' );
    function load_media() {
        wp_enqueue_media();
    }

    add_action( 'admin_footer', 'add_btn_script' );
    function add_btn_script() { ?>
        <script>
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
                                $('#service_image_id').val(attachment.id);
                                $('#service_image').val(attachment.url);
                                $('#service-image-wrapper').html('<img class="custom_media_image" src="" />');
                                $('#service-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
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
                    $('#service_image').val('');
                    $('#service_image_id').val('');
                    $('#service-image-wrapper').html('<img class="custom_media_image" src="" />');
                });
                // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-service-ajax-response
                $(document).ajaxComplete(function(event, xhr, settings) {
                    var queryStringArr = settings.data.split('&');
                    if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                        var xml = xhr.responseXML;
                        $response = $(xml).find('term_id').text();
                        if($response!=""){
                            // Clear the thumb image
                            $('#service-image-wrapper').html('');
                        }
                    }
                });
            });
        </script>
     <?php }

?>