<?php
/** WIDGETS.PHP
 * // ----- Version: 1.0
 * // ----- Released: 4.5.2020
 * // ----- Description: declare theme sidebar and widget areas
 **/


function sbc_widgets_init() {

    register_sidebar( array(
        'name'          => 'Left Column',
        'id'            => 'left-col',
        'before_widget' => '<div class="left-col widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="head widget-head">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Center Column',
        'id'            => 'center-col',
        'before_widget' => '<div class="center-col widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="head widget-head">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Right Column',
        'id'            => 'right-col',
        'before_widget' => '<div class="right-col widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="head widget-head">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Service Sidebar',
        'id'            => 'service-sidebar',
        'before_widget' => '<div class="sidebar service-sidebar">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="head service-widget-head">',
        'after_title'   => '</h4>',
    ) );

}
add_action( 'widgets_init', 'sbc_widgets_init' );

// create custom connect widget that uses ACF fields in theme options
function sbc_connect_widget() {

    class connect_widget extends WP_Widget {

        function __construct() {
            parent::__construct(

                // Base ID of your widget
                'connect_widget',

                // Widget name will appear in UI
                __('Connect', 'connect_widget_domain'),

                // Widget description
                array( 'description' => __( 'Insert your connect links with this widget', 'connect_widget_domain' ), )
            );
        }

        // Creating widget output
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );

            // echo Title if Title
            echo $args['before_widget'];
            echo '<div class="connect-widget">';
            if ( ! empty( $title ) ):
                echo $args['before_title'] . $title . $args['after_title'];
            endif;

            // echo social links if social links available in theme options
            if( have_rows('_about', 'option') ):
                while( have_rows('_about', 'option') ): the_row();
                    if( have_rows('connect_media') ):
//                        echo 'Follow Us: ';
                        while( have_rows('connect_media') ): the_row();
                            $link = get_sub_field('link');
                            $platform = get_sub_field('platform');
                            $icon = '<a href="' . $link . '">' .
                                '<i class="' . $platform . '"></i>' .
                                '</a>';
                            echo $icon;
                        endwhile;
                    endif;
                endwhile;
            endif;

            // This is where you run the code and display the output
//            echo __( 'Hello, World!', 'connect_widget_domain' );
            echo $args['after_widget'];
            echo '</div>';
        }

        // Widget Backend
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'New title', 'connect_widget_domain' );
            }
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php
        }

        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }

    } // close class

    // Register the widget
    register_widget( 'connect_widget' );

}
add_action( 'widgets_init', 'sbc_connect_widget' );






// create custom connect widget that uses ACF fields in theme options
function sbc_sub_service_menu() {

    class sub_service_menu extends WP_Widget {

        function __construct() {
            parent::__construct(

            // Base ID of your widget
                'sub_service_menu',

                // Widget name will appear in UI
                __('Sub Service Menu', 'sub_service_widget_domain'),

                // Widget description
                array( 'description' => __( 'Add menu items for other sub service under the same parent', 'sub_service_widget_domain' ), )
            );
        }

        // Creating widget output
        public function widget( $args, $instance ) {

            echo '<div class="sidebar sub-service-menu">';

            global $post;
            $parent = get_post_ancestors($post->ID);
            $id = ($parent) ? $parent[count($parent)-1]: $post->ID;
            $parent_title = get_the_title($id);
            $child_list = wp_list_pages( array(
                'child_of' => $id,
                'title_li'    => '',
            ));

            echo '</div>';
        }

        // Widget Backend
        public function form( $instance ) {

        }

        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }

    } // close class

    // Register the widget
    register_widget( 'sub_service_menu' );

}
add_action( 'widgets_init', 'sbc_sub_service_menu' );





// create custom connect widget that uses ACF fields in theme options
function sbc_contact_info() {

    class contact_info extends WP_Widget {
        function __construct() {
            parent::__construct(
            // Base ID of your widget
                'contact_info',
                // Widget name will appear in UI
                __('Contact Info', 'contact_widget_domain'),
                // Widget description
                array( 'description' => __( 'Add to show email, phone, location', 'contact_widget_domain' ), )
            );
        }



        // Creating widget output
        public function widget( $args, $instance ) {

            $title = apply_filters( 'widget_title', $instance['title'] );
            $text = apply_filters( 'widget_title', $instance['text'] );

            // echo sidebar section container
            echo '<div class="sidebar about-sidebar">';

            //check for title
            if ( ! empty( $title ) ):
                echo $args['before_title'] . $title . $args['after_title'];
            endif;

            // check for text
            if ( ! empty( $text ) ):
                echo '<p class="about-text">' . $text . '</p>';
            endif;

            echo '<div class="sidebar contact-info">';

            // echo social links if social links available in theme options
            if( have_rows('_about', 'option') ):
                while( have_rows('_about', 'option') ): the_row();
                    $about = get_field('_about', 'option');
                    $phone = $about['phone_num'];
                    $email = $about['email'];
                    $address_1 = $about['address_line_1'];
                    $address_2 = $about['address_line_2'];
                    $city = $about['city'];
                    $state = $about['state'];
                    $zip = $about['zip']; ?>
                    <?php if($phone): ?>
                        <div class="phone-cont">
                            <a class="phone" href="tel:<?php echo $phone; ?>"><i class="fas fa-mobile-alt"></i> <span><?php echo $phone ?></span></a>
                        </div>
                    <?php endif; ?>
                    <div class="email-cont">
                        <a class="email" href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> <span><?php echo $email; ?></span></a>
                    </div>
                    <div class="address-cont">
                        <a class="address" href="https://www.google.com/maps/place/<?php echo $address_1 . '+' . $city . '+' . $state . '+' . $zip;?>">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="address-item-cont">
                                <p class="address-item address1"><?php echo $address_1; ?></p>
                                <?php if($address_2): ?>
                                <p class="address-item address2"><?php echo $address_2; ?></p>
                                <?php endif; ?>
                                <p class="address-item address3"><?php echo $city . ', ' . $state . ' ' .  $zip?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
            endif;

            echo '</div> </div>';
        }

        // Widget Backend
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'New title', 'connect_widget_domain' );
            }

            if ( isset( $instance[ 'text' ] ) ) {
                $text = $instance[ 'text' ];
            }
            else {
                $text = __( 'New text', 'connect_widget_domain' );
            }
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Description:' ); ?></label>
                <input class="widefat" rows="5" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>"/>
            </p>
            <?php
        }

        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
            return $instance;
        }

    } // close class

    // Register the widget
    register_widget( 'contact_info' );

}
add_action( 'widgets_init', 'sbc_contact_info' );
