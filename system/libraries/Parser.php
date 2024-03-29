<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Parser Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Parser
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/parser.html
 */
class CI_Parser {

	/**
	 * Left delimiter character for pseudo vars
	 *
	 * @var string
	 */
	public $l_delim = '{';

	/**
	 * Right delimiter character for pseudo vars
	 *
	 * @var string
	 */
	public $r_delim = '}';

	/**
	 * Reference to CodeIgniter instance
	 *
	 * @var object
	 */
	protected $CI;

	// --------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		$this->CI =& get_instance();
	}

	// --------------------------------------------------------------------

	/**
	 * Parse a template
	 *
	 * Parses pseudo-variables contained in the specified template view,
	 * replacing them with the data in the second param
	 *
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	public function parse($template, $data, $return = FALSE)
	{
		$template = $this->CI->load->view($template, $data, TRUE);

		return $this->_parse($template, $data, $return);
	}

	// --------------------------------------------------------------------

	/**
	 * Parse a String
	 *
	 * Parses pseudo-variables contained in the specified string,
	 * replacing them with the data in the second param
	 *
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	public function parse_string($template, $data, $return = FALSE)
	{
		return $this->_parse($template, $data, $return);
	}

	// --------------------------------------------------------------------

	/**
	 * Parse a template
	 *
	 * Parses pseudo-variables contained in the specified template,
	 * replacing them with the data in the second param
	 *
	 * @param	string
	 * @param	array
	 * @param	bool
	 * @return	string
	 */
	protected function _parse($template, $data, $return = FALSE)
	{
		if ($template === '')
		{
			return FALSE;
		}

		foreach ($data as $key => $val)
		{
			$template = is_array($val)
					? $this->_parse_pair($key, $val, $template)
					: $template = $this->_parse_single($key, (string) $val, $template);
		}

		if ($return === FALSE)
		{
			$this->CI->output->append_output($template);
		}

		return $template;
	}

	// --------------------------------------------------------------------

	/**
	 * Set the left/right variable delimiters
	 *
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	public function set_delimiters($l = '{', $r = '}')
	{
		$this->l_delim = $l;
		$this->r_delim = $r;
	}

	// --------------------------------------------------------------------

	/**
	 * Parse a single key/value
	 *
	 * @param	string
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	protected function _parse_single($key, $val, $string)
	{
		return str_replace($this->l_delim.$key.$this->r_delim, (string) $val, $string);
	}

	// --------------------------------------------------------------------

	/**
	 * Parse a tag pair
	 *
	 * Parses tag pairs: {some_tag} string... {/some_tag}
	 *
	 * @param	string
	 * @param	array
	 * @param	string
	 * @return	string
	 */
	protected function _parse_pair($variable, $data, $string)
	{
		if (FALSE === ($matches = $this->_match_pair($string, $variable)))
		{
			return $string;
		}

		$str = '';
		$search = $replace = array();
		foreach ($matches as $match)
		{
			$str = '';
			foreach ($data as $row)
			{
				$temp = $match[1];
				foreach ($row as $key => $val)
				{
					$temp = is_array($val)
						? $this->_parse_pair($key, $val, $temp)
						: $this->_parse_single($key, $val, $temp);
				}

				$str .= $temp;
			}

			$search[] = $match[0];
			$replace[] = $str;
		}

		return str_replace($search, $replace, $string);
	}

	// --------------------------------------------------------------------

	/**
	 * Matches a variable pair
	 *
	 * @param	string	$string
	 * @param	string	$variable
	 * @return	mixed
	 */
	protected function _match_pair($string, $variable)
	{
		return preg_match_all('|'.preg_quote($this->l_delim).$variable.preg_quote($this->r_delim).'(.+?)'.preg_quote($this->l_delim).'/'.$variable.preg_quote($this->r_delim).'|s',
					$string, $match, PREG_SET_ORDER)
			? $match : FALSE;
	}

}

/* End of file Parser.php */
/* Location: ./system/libraries/Parser.php */