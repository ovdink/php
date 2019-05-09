<?php

include('/Users/sgendry/42/github/php/day07/ex01/Greyjoy.class.php');

class Euron extends Greyjoy {
	public function announceMotto() {
		print($this->familyMotto . PHP_EOL);
	}
}

?>
