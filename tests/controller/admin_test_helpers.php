<?php

namespace phpbb\boardrules\controller;

class admin_test_state
{
	public static $valid_form = true;
	public static $confirm = true;
	public static $valid_link_hash = true;
	public static $form_keys = array();
	public static $form_key_suffixes = array();
	public static $confirmations = array();
	public static $redirects = array();
	public static $custom_bbcodes_displayed = 0;

	public static function reset(): void
	{
		self::$valid_form = true;
		self::$confirm = true;
		self::$valid_link_hash = true;
		self::$form_keys = array();
		self::$form_key_suffixes = array();
		self::$confirmations = array();
		self::$redirects = array();
		self::$custom_bbcodes_displayed = 0;
	}
}

function add_form_key($name, $template_variable_suffix = '')
{
	admin_test_state::$form_keys[] = $name;
	admin_test_state::$form_key_suffixes[$name] = $template_variable_suffix;
}

function check_form_key($name)
{
	return admin_test_state::$valid_form;
}

function check_link_hash($hash, $link_name)
{
	return admin_test_state::$valid_link_hash;
}

function generate_link_hash($link_name)
{
	return 'hash:' . $link_name;
}

function confirm_box($check, $title = '', $hidden = '', $html_body = 'confirm_body.html', $u_action = '')
{
	if ($check)
	{
		return admin_test_state::$confirm;
	}

	admin_test_state::$confirmations[] = array(
		'title' => $title,
		'hidden' => $hidden,
	);
	return false;
}

function build_hidden_fields(array $fields)
{
	return http_build_query($fields, '', '&');
}

function redirect($url)
{
	admin_test_state::$redirects[] = $url;
}

function append_sid($url)
{
	return $url;
}

function adm_back_link($url)
{
	return '|back:' . $url;
}

function build_select(array $options, $selected)
{
	return json_encode(array('options' => $options, 'selected' => $selected));
}

function display_custom_bbcodes()
{
	admin_test_state::$custom_bbcodes_displayed++;
}

namespace phpbb;

if (!class_exists(json_response::class, false))
{
	class json_response
	{
		public static $data;

		public function send($data, $exit = true)
		{
			self::$data = $data;
		}
	}
}
