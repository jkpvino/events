
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('ishome'))
{
    function ishome()
    {
    	$is_home = ($this->router->fetch_class() === 'index' && $this->router->fetch_method() === 'index') ? true : false;
        return $is_home;
    }   
}

if(!function_exists('getSymposium')) 
{
    function getSymposium()
    {
        $CI =& get_instance();
        $CI->load->model('event_model');
        $getSymposium = $CI->event_model->get_symposium();
        return $getSymposium;
    }
}

if(!function_exists('getEventTypes')) 
{
    function getEventTypes()
    {
        $CI =& get_instance();
        $CI->load->model('event_model');
        $getEventTypes = $CI->event_model->getEventTypes();
        return $getEventTypes;
    }
}

if(!function_exists('getAllEventCategory')) 
{
    function getAllEventCategory()
    {
        $CI =& get_instance();
        $CI->load->model('event_model');
        $getAllEventCategory = $CI->event_model->getAllEventCategory();
        return $getAllEventCategory;
    }
}
