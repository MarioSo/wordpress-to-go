<?php

// load all data here and put into $data global container

// $data->add('solutions', $knapp->get_solutions());

// // load parts afterwards (header also uses $data etc.)

include(locate_template('header.php'));

// include(locate_template('parts/menu.part.php')); // you don't have to use global $var; inside to get global variables :)


?>
<h2 class="h2">hello world</h2>
<?php

// echo "<pre>";
// echo get_the_post_thumbnail();
// echo "</pre>";

// echo "<pre>";
// var_dump( get_field('rwd-img'));
// echo "</pre>";
// echo "huhu";

echo "<pre>";
var_dump(get_field('rwd-img'));
echo "</pre>";



Image::render(get_field('rwd-img'));



include(locate_template('footer.php'));
