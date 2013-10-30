<?php

	class User {
		private $_db;

		public function __construct($user = null) {
			$this->_db = DB::getInstance();
		}

		public function create($fields = array()) {
			if(!$this->_db->insert('users', $fields)) {
				throw new Exception('There was a problem creating your account.');
			}
		}

		public function update($id, $fields = array()) {
			if(!$this->_db->update('users', $id, $fields)) {
				throw new Exception('There was a problem updating your account.');
			}
		}

		public function email($to, $subject, $body) {
			mail($to, $subject, $body, "From: admin@limeade.net");
		}
	}

?>