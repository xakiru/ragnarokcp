<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * SQLite3 Utility Class
 *
 * @category	Database
 * @author	Andrey Andreev
 * @link	http://codeigniter.com/user_guide/database/
 */
class CI_DB_sqlite3_utility extends CI_DB_utility {

	/**
	 * Export
	 *
	 * @param	array	$params	Preferences
	 * @return	mixed
	 */
	protected function _backup($params = array())
	{
		// Not supported
		return $this->db->display_error('db_unsupported_feature');
	}

}

/* End of file sqlite3_utility.php */
/* Location: ./system/database/drivers/sqlite3/sqlite3_utility.php */