<?php
/**
 * Created by PhpStorm.
 * User: westopher
 * Date: 7/16/15
 * Time: 3:55 PM
 */

namespace App\Network;

use Cake\Core\Configure;
use Cake\Network\Request;

class NodeRequest extends Request
{
    public static function createFromGlobals()
    {
        list($base, $webroot) = static::_base();

        $sessionConfig = (array)Configure::read('Session') + [
            'defaults'      => 'cache',
            'cookiePath'    => $webroot
        ];

        $config = [
            'query'         => $_GET,
            'post'          => $_POST,
            'files'         => $_FILES,
            'cookies'       => $_COOKIE,
            'environment'   => $_SERVER + $_ENV,
            'base'          => $base,
            'webroot'       => $webroot,
            'session'       => NodeSession::create($sessionConfig)
        ];

        $config['url'] = static::_url($config);

        return new static($config);
    }
}