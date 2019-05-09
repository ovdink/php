<?php
class Jaime extends Lannister {
	public function sleepWith($human) {
		if (get_class($human) == 'Tyrion')
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (get_class($human) == 'Sansa')
			print("Let's do this." . PHP_EOL);
		else if (get_class($human) == 'Cersei')
			print("With pleasure, but only in a tower in Winterfell, then.". PHP_EOL);
	}
}
?>
