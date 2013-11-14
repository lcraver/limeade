<?php

	class Hash {
		public static function make($string, $salt = '') {
			return hash('sha256', $string . $salt);
		}

		public static function salt($length) {
			//return "$2y$10$".bin2hex(openssl_random_pseudo_bytes($length));
			return mcrypt_create_iv($length);
		}

		public static function unique() {
			return self::make(uniqid());
		}

		public static function emailCode($username) {
			return md5($username + microtime());
		}
	}

?>