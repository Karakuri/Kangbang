<?php
class BasicAuthDao extends Dao {
	public function registerPassword($userId, $password) {
		$this->insert(array('user_id' => $userId, 'password' => $password));
	}

	public function isValid($userId, $password) {
		$cnt = $this->joinUserOnKey(user_id)->equalToUserName($userId)->equalToPassword($password)->select('COUNT(*) cnt');
		return $cnt[0]['cnt'] > 0;
	}

	public function getPasswordQuery($val) {
		return hash('sha256',SITE_SALT . $val);
	}

	public function validatePassword($val) {
		if (!preg_match('/[!-~]{6,}/', $val)) {
			return $this->_('error.password_format');
		}
		return;
	}
}