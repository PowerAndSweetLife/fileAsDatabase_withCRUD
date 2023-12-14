<?php

	class FileGenerator {
		private $file = null ;
		public function goTo($path) {
			header("Location: $path.html") ;
		}

		public function createFile($filename) {
			$this->file = fopen("$filename", "a") ;
		}

		public function addValue($values) {
			$info = "" ;
			for($i = 0; $i < count($values); $i++) {
				$info .= $values[$i]."|" ;
			}
			$info = trim($info,"|") ;
			$info .= "\n" ;
			fwrite($this->file, $info) ;
		}

		public function closeFile() {
			fclose($this->file) ;
		}
	}