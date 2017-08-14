<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Toma Modules Helper
 *
 * @package		module_herper
 * @author		Syahril Hermana
 * @copyright	Copyright (c) 2017, TOMA DIGITAL.
 * @version		v1.0.0
*/

/**
 * Get packages name
 *
 * @access  public
 * @return  string
*/
if ( ! function_exists('packages'))
{
    function packages($module, $return)
    {
        $module_name = humanize($module);
        $module_version = "1.0";
        $module_description = "";

        if(file_exists ( APPPATH.'packages/'.$module.'/'.$module.'.xml' )){
            $artefact = simplexml_load_file(APPPATH.'packages/'.$module.'/'.$module.'.xml');
            $module_name = $artefact->module->name;
            $module_version = $artefact->module->version;
            $module_description = $artefact->module->description;
        }

        switch ($return){
            case "name" :
                $return = $module_name;
                break;
            case "version" :
                $return = $module_version;
                break;
            case "description" :
                $return = $module_description;
                break;
        }
        return $return;
    }
}

/**
 * Get selected menu
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('selected'))
{
    /**
     * @param $attribute
     * @return string
     */
    function selected($attribute)
    {
        $CI =& get_instance();
        $selected = "";
        $segment = explode("/", substr($attribute, 1));

        if($segment[0] == "play") {
            if($segment[1] == $CI->uri->segment(2))
                $selected = "active >>".$attribute;
        } else {
            if ($segment[0] == $CI->uri->segment(1))
                $selected = "active";
        }

        return $selected;
    }
}

/**
 * Check is navigation parent
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('is_parent'))
{
    function is_parent($id)
    {
        $CI =& get_instance();
        $CI->load->model("navigation_model", "model");
        $return = $CI->model->is_parent("parent", $id);

        return $return;
    }
}

/**
 * Check is navigation parent
 *
 * @access  public
 * @return  string
 */
if ( ! function_exists('get_child'))
{
    function get_child($parent)
    {
        $CI =& get_instance();
        $CI->load->model("navigation_model", "model");
        $return = $CI->model->get("parent", $parent);

        return $return;
    }
}

/* End of file module_helper.php */