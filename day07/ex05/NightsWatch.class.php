<?php
class NightsWatch {
	public function recruit ($fighter) {
		if ($fighter instanceof IFighter)
			$fighter->fight();
	}
	public function fight() {
		return;
	}
}
?>
