<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ODBC Utility Class
 *
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/database/
 */
class CI_DB_odbc_utility extends CI_DB_utility {

	/**
	 * Export
	 *
	 * @param	array	$params	Preferences
	 * @return	mixed
	 */
	protected function _backup($params = array())
	{
		// Currently unsupported
		return $this->db->display_error('db_unsupported_feature');
	}

}

/* End of file odbc_utility.php */
/* Location: ./system/database/drivers/odbc/odbc_utility.php */