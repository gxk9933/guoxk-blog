<?php 
$entries = array(
  'EAVESDROP' => array(
    'part' => 'v.i.',
    'definition' => 'Secretly to overhear a catalogue of the crimes
      and vices of another or yourself.',
    'quote' => array(
      'A lady with one of her ears applied',
      'To an open keyhole heard, inside,',
      'Two female gossips in converse free $mdash;',
      'The subject engaging them was she.',
      '"I think, " said one, "and my husband thinks"',
      'That she\'s a prying, inquisitive minx!',
    ),
    'author' => 'Gopete Sherany',
  ),
  'EDIBLE' => array(
    'part' => 'adj.',
    'definition' => 'Good to eat, and wholesome to digest, as worm
      to a toad, a toad to a snake, a snake to a pig. a pig to a man, and a man to a worm.',
  ),
  'EDUCATION' => array(
    'part' => 'n.',
    'definition' => 'That which discloses to the wise and disguises from
      the foolish their lack of understanding.',
  ),
);
 $term = strtoupper($_REQUEST['term']);
 $entry = $entries[$term];
if (isset($entry)) {//strtoupper  将字符串转为大写
	$html = '<div class="entry">';
  	$html .= '<h3 class="term">';
  	  $html .= $term;
  	$html .= '</h3>';
  	$html .= '<div class="part">';
  	  $html .= $entry['part'];
  	$html .= '</div>';
  	$html .= '<div class="definition">';
    	$html .= $entry['definition'];
    	if (isset($entry['quote'])) {
    		$html .= '<div class="quote">';
    		foreach ($entry['quote'] as $quote){
    		  $html .= '<div class="quote-line">'.$quote.'</div>';
    		}
    		$html .= '</div>';
    	}
  	$html .= '</div>';
	$html .= '</div>';
	print $html;
	
}
?>