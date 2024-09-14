<?php

//function for car form

function submit_car_form(){

    $car_make = get_terms( array(
        'taxonomy'   => 'cars_make',
        'hide_empty' => false,
    ));

    $car_model = get_terms( array(
        'taxonomy'   => 'cars_model',
        'hide_empty' => false,
    ));

    //print_r($car_model);

    ob_start(); 
    ?>

    <form id="car-form" action="" method="post">

        <p>
            <label for="car_name">Car Name:</label>
            <input type="text" name="car_name" id="car_name" required>
        </p>

        <p>
            <label for="make">Make:</label>
            <select name="make" id="make">
                <option value="">Select Make</option>
                <?php
                foreach ( $car_make as $make ) {
                    echo '<option value="' . esc_attr( $make->term_id ) . '">' . esc_html( $make->name ) . '</option>';
                }
                ?>
            </select>
        </p>

        <p>
            <label for="model">Model:</label>
            <select name="model" id="model">
                <option value="">Select Model</option>
                <?php
                foreach ( $car_model as $model ) {
                    echo '<option value="' . esc_attr( $model->term_id ) . '">' . esc_html( $model->name ) . '</option>';
                }
                ?>
            </select>
        </p>

        <p>
            <label>Fuel Type:</label><br>
            <?php
            $car_fuel_types = get_terms(array(
                'taxonomy' => 'cars_fuel_type',
                'hide_empty' => false,
            ));
            foreach ($car_fuel_types as $fuel_type) {
                echo '<label>';
                echo '<input type="radio" name="fuel_type[]" value="' . esc_attr($fuel_type->term_id) . '">';
                echo esc_html($fuel_type->name);
                echo '</label><br>';
            }
            ?>
        </p>

        <p>
            <label>Image:</label><br>
            <input type="file" id="car_image" name="car_image" accept="image/*">
        </p>
        <p>
            <input type="submit" name="submit_car_form" value="Submit">
        </p>
    </form>
    <?php
        return ob_get_clean();
}

add_shortcode('car_entry', 'submit_car_form');


// shortcode for all cars listed
function all_car_list(){

    $args =  array(
        'post_type'      => 'car',          
        'posts_per_page' => -1, 
        'post_status'    => 'publish'
    );
    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        echo '<div class="custom-post-types-list">';
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $post_thumbnail = get_the_post_thumbnail($post_id, 'medium');
            
            echo '<div class="custom-post-type-item">';
            if ($post_thumbnail) {
                echo '<div class="post-thumbnail">' . $post_thumbnail . '</div>';
            }
            echo '<h2 class="post-title">' . get_the_title() . '</h2>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No posts found.</p>';
    }
    
    // Reset post data
    wp_reset_postdata();
    
    // Return output buffer content
    return ob_get_clean();
}
add_shortcode('car-list', 'all_car_list');
?>