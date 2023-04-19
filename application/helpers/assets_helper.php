<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('assets_url()')) {
    function assets_url()
    {
        return base_url() . 'assets/';
    }
}

if (!function_exists('css_url')) {
    function css_url($name)
    {
        return base_url() . 'assets/css/' . $name . '.css';
    }
}

if (!function_exists('img_url')) {
    function img_url()
    {
        return base_url() . 'assets/img/';
    }
}

if (!function_exists('js_url')) {
    function js_url($name)
    {
        return base_url() . 'assets/js/vendors/' . $name . '.js';
    }
}

if (!function_exists('vendor_url')) {
    function vendor_url()
    {
        return base_url() . 'vendor/';
    }
}