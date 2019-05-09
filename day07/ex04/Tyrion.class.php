<?php
class Tyrion extends Lannister {
	public function sleepWith($human) {
		if (get_class($human) == 'Jaime')
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (get_class($human) == 'Sansa')
			print("Let's do this." . PHP_EOL);
		else if (get_class($human) == 'Cersei')
			print("Not even if I'm drunk !" . PHP_EOL);
	}
}
?>
