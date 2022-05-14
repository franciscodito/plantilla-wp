<h5>Comentarios... <?php comments_number( 'no existen comentarios.', '1 comentario', '% comentarios' ); ?>.</h5>
<hr>

<?php comment_form(); ?>

<?php
    wp_list_comments( array(
        'callback' => function( $comment, $args, $depth ){ ?>
        <div class="d-flex">
            <div class="flex-shrink-0">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                ?>
            </div>
            <div class="flex-grow-1 ms-3 mb-3">
                <h5 class="mt-0">
                    <?php printf( __( '<cite>%s</cite> dice:' ), get_comment_author_link() ); ?>
                </h5>
                <?php
                    if ( $comment->comment_approved == '0' ){ ?>
                        <em><?php _e( 'Comentario en espera de aprobación' ); ?></em><br/><?php
                    } else {
                        comment_text();
                    }?>  

                    <small>
                    <?php     
                        comment_reply_link( 
                            array_merge(
                                $args,
                                array(
                                   'reply-text' => ' Responder ',
                                   'depth' => $depth,
                                   'max_depth' => $args['max_depth']
                                )
                            )
                        ); 
                    ?>
                    </small>

                    <small>
                    <?php
                        edit_comment_link( __( ' Editar ' ), ' ', '');
                    ?>
                    </small>
            </div>
        </div>
    <?php   }
        ));
?>

