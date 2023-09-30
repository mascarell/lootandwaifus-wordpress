<!-- Database advanced filters for different games -->

<?php

$categories = get_the_category();
$category_id = $categories[0]->name;

?>

<div class="character-skills container">
  <!-- filter input -->
  <input type="search" id="filter" name="filter" placeholder="Filter skills: ATK buff, DEF buff, Attack speed, etc." autocomplete="off">
  
  <?php
    // Replace 'your_custom_post_type' with the name of your custom post type.
    $custom_post_type = 'characters';
    $tags_to_exclude = array('Tier 0', 'Tier 0.5', 'Tier 1', 'Tier 1.5', 'Tier 2', 'Tier 3', 'R', 'SR', 'SSR', 'UR', 'Abnormal', 'Pilgrim', 'Elysion', 'Tetra', 'Missilis', 'Fire', 'Wind', 'Water', 'Iron', 'Electric', 'Shotgun', 'SMG', 'Machine gun', 'Assault rifle', 'Rocket Launcher', 'Sniper Rifle', 'Burst 1', 'Burst 2', 'Burst 3', 'Attacker', 'Defender', 'Supporter');

    // Get posts in the specified category within the custom post type.
    $posts = get_posts(array(
        'post_type' => $custom_post_type,
        'category_name' => $category_id,
        'numberposts' => -1, // Retrieve all posts in the specified category.
    ));

    $object_ids = array(); // Initialize an array to store post IDs.

    foreach ($posts as $post) {
        $object_ids[] = $post->ID; // Extract the post ID and add it to the array.
    }

    // Get the tags from the specified category within the custom post type.
    $tags = get_terms(array(
        'taxonomy' => 'post_tag', // Taxonomy for tags.
        'hide_empty' => false,   // Include empty terms (tags without posts).
        'object_ids' => $object_ids, // Pass the array of post IDs.
    ));

    // Check if tags were found.
    if (!empty($tags) && !is_wp_error($tags)) {
        // Loop through the tags and display them.
        foreach ($tags as $tag) {
          // Check if the tag's name is not in the tags to exclude array.
          if (!in_array($tag->name, $tags_to_exclude)) {
            echo '<span class="tag">' . $tag->name . '</span>';
          }
        }
    } else {
        echo 'No tags found.';
    }
  ?>
</div>