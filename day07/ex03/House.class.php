<?php
	class House {
			public function getHouseName(){}
			public function getHouseMotto(){}
			public function getHouseSeat(){}

			public function introduce() {
				print("House ".$this->getHouseName() .
						" of ".$this->getHouseSeat() .
					" : \""	.$this->getHouseMotto() ."\"" .PHP_EOL );
	}
}
?>
