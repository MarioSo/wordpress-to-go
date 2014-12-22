<?php

// load all data here and put into $data global container

// $data->add('solutions', $knapp->get_solutions());

// // load parts afterwards (header also uses $data etc.)

include(locate_template('header.php'));

// include(locate_template('parts/menu.part.php')); // you don't have to use global $var; inside to get global variables :)


?>
<h2 class="h2">hello world</h2>
<?php

$adm = WPAD_Manager::get_instance();

//twig fake db object
// $renderPage = array(
// 	"atoms/image" => array(
// 		"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png"
// 	),
// 	"molecules/three-columns" => array(
// 		"text1" => "1st column",
// 		"text2" => "2nd cloumn",
// 		"text3" => "3rd column"
// 	),
// 	"molecules/two-columns" => array(
// 		"text1" => "1st column 2",
// 		"text2" => "2nd cloumn 2"
// 	),
// 	"molecules/three-columns" => array(
// 		"text1" => "another 1st column",
// 		"text2" => "another 2nd cloumn",
// 		"text3" => "another 3rd column"
// 	)
// );

// foreach($renderPage as $key => &$val) {


// 	// echo "key: " . $key; // . " val: " . $val . "<br />";
// 	// echo "<pre>";
// 	// var_dump($val);
// 	// echo "</pre>";
// 	echo $adm->render($val, $key);
// }






// $renderPage = array(
// 	"molecules/image" => array(
// 		"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png"
// 	),
// 	"organisms/three-columns" => array(
// 		"text1" => "1st column",
// 		"text2" => "2nd cloumn",
// 		"text3" => "3rd column"
// 	),
// 	"organisms/two-columns" => array(
// 		"text1" => "1st column 2",
// 		"text2" => "2nd cloumn 2"
// 	),
// 	"organisms/three-columns" => array(
// 		"text1" => "another 1st column",
// 		"text2" => "another 2nd cloumn",
// 		"text3" => "another 3rd column"
// 	)
// );

// $renderTree = new WPAD_RenderTree();
// $renderTree->add(new WPAD_Organism("Molecule 1", 'organisms/three-columns', array(
// 		"text1" => "1st column",
// 		"text2" => "2nd cloumn",
// 		"text3" => "3rd column"
// )));

// $renderTree->add(new WPAD_Organism("Molecule 2", 'organisms/two-columns', array(
// 		"text1" => new WPAD_Molecule(
// 			'teaser',
// 			'molecules/teaser',
// 			array(
// 				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
// 				"text" => "atomic design for the win!"
// 			)
// 		),
// 		"text2" => "2nd cloumn 2"
// )));

// $renderTree->add(new WPAD_Organism("Molecule 3", 'organisms/three-columns', array(
// 		"text1" => "1st column second time!",
// 		"text2" => "2nd cloumn second time!",
// 		"text3" => "3rd column second time!"
// )));

$page = new WPAD_Item('page', '' , array(

	"var0" => new WPAD_Molecule(
		'Molecule 4',
		'molecules/teaser',
		array(
			"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
			"text" => "atomic design for the win!"
		)
	),
	'var1' => new WPAD_Organism("Organism 1", 'organisms/three-columns', array(
		"text1" => new WPAD_Molecule(
			'Molecule 1',
			'molecules/teaser',
			array(
				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
				"text" => "11111111"
			)
		),
		"text2" => new WPAD_Molecule(
			'Molecule 2',
			'molecules/teaser',
			array(
				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
				"text" => "222222222"
			)
		),
		"text3" => new WPAD_Molecule(
			'Molecule 3',
			'molecules/teaser',
			array(
				"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
				"text" => "333333333"
			)
		)
	)),
	"var2" => new WPAD_Molecule(
		'Molecule 4',
		'molecules/teaser',
		array(
			"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
			"text" => "atomic design for the win!"
		)
	),
	"var3" => new WPAD_Molecule(
		'Molecule 4',
		'molecules/teaser',
		array(
			"image" => "http://bradfrostweb.com/wp-content/uploads/2013/06/atomic-design.png",
			"text" => "atomic design for the win win win!"
		)
	)
));



	//$adm->getRenderer()->render_that_thing($renderTree);

	echo $adm->render($page);

//  foreach($renderTree as $key => $item) {

// // 	// echo $item->template;
// // 	// var_dump($item->data);

//  	echo $adm->renderTWIG($item->template, $item->data);

// // 	// echo "key: " . $key; // . " val: " . $val . "<br />";
// // 	// echo "<pre>";
// // 	// var_dump($val);
// // 	// echo "</pre>";
// // 	//echo $adm->render($key, $val);
//  }

// echo $adm->render(array('text' => 'variables', 'go' => 'here'), 'molecules/three-columns');

// echo $adm->render('molecules/three-columns', array(
//     'text1'=>'John',
//     'text2'=>'is',
//     'text3'=>'cool'
// ));


// echo $adm->render('molecules/two-columns', array(
//     'text1'=>'Howdy',
//     'text2'=>'Cowboy'
// ));

// echo $adm->render('molecules/three-columns', array(
//     'text1'=>'But',
//     'text2'=>'Marry',
//     'text3'=>'too'
// ));




//Image::renderImg();

//echo $twig->render('hello.html', array('the' => 'variables', 'go' => 'here'));


include(locate_template('footer.php'));
