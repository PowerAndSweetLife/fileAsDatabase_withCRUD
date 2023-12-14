<?php

	class Auth {
		private $path = "" ;
		private $file = null ;
		private $content = [] ;
		public function setPath($p) {
			$this->path = $p ;
		}
		public function verifyIfFileExists($email) {
			if(file_exists($this->path.$email)) {
				return true ;
			}
			else {
				return false ;
			}
		}
		public function openFile($email) {
			$this->file = fopen($this->path.$email, "r") ;
		}
		public function getFileContent() {
			$content = fgets($this->file) ;
			$this->content = explode("|", trim($content)) ;
		}

		public function getNom() {
			return trim($this->content[0]) ;
		}
		public function getEmail() {
			return trim($this->content[1]) ;
		}
		public function getPassword() {
			return trim($this->content[2]) ;
		}
		public function closeFile() {
			fclose($this->file) ;
		}
	}