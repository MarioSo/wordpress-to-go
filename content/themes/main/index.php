<?php

// load all data here and put into $data global container

// $data->add('solutions', $knapp->get_solutions());

// // load parts afterwards (header also uses $data etc.)

include(locate_template('header.php'));

// include(locate_template('parts/menu.part.php')); // you don't have to use global $var; inside to get global variables :)


?>
<h2 class="h2">hello world</h2>
<?php

//$adm = WPAD_Manager::get_instance();
//
// THIS GUY WORKS!!!

// $page = new WPAD_Item('page', '' , array(

// 	"var0" => new WPAD_Molecule(
// 		'Molecule 4',
// 		'molecules/teaser',
// 		array(
// 			"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 			"text" => "atomic design for the win!"
// 		)
// 	),
// 	'var1' => new WPAD_Organism("Organism 1", 'organisms/three-columns', array(
// 		"text1" => new WPAD_Molecule(
// 			'Molecule 1',
// 			'molecules/teaser',
// 			array(
// 				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 				"text" => "11111111"
// 			)
// 		),
// 		"text2" => new WPAD_Molecule(
// 			'Molecule 2',
// 			'molecules/teaser',
// 			array(
// 				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 				"text" => "222222222"
// 			)
// 		),
// 		"text3" => new WPAD_Molecule(
// 			'Molecule 3',
// 			'molecules/teaser',
// 			array(
// 				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 				"text" => "333333333"
// 			)
// 		)
// 	)),
// 	"var2" => new WPAD_Molecule(
// 		'Molecule 4',
// 		'molecules/teaser',
// 		array(
// 			"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 			"text" => "atomic design for the win!"
// 		)
// 	),
// 	"var3" => new WPAD_Molecule(
// 		'Molecule 4',
// 		'molecules/teaser',
// 		array(
// 			"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 			"text" => "atomic design for the win win win!"
// 		)
// 	)
// ));

// echo $adm->render($page);





include(locate_template('footer.php'));
