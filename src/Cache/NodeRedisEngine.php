<?php

/**
 * Created by PhpStorm.
 * User: westopher
 * Date: 7/16/15
 * Time: 4:34 PM
 */

namespace App\Cache;

use Cake\Cache\Engine\RedisEngine;

class NodeRedisEngine extends RedisEngine
{
    public function key($key)
    {
        if (empty($key)) {
            return false;
        }

        $prefix = '';
        if (!empty($this->_groupPrefix)) {
            $prefix = vsprintf($this->_groupPrefix, $this->groups());
        }

        //$key = preg_replace('/[\s]+/', '_', trim(str_replace([DS, '/'], '_', strval($key))));
        return $prefix . $key;
    }
}