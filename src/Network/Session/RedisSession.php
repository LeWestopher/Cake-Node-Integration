<?php
/**
 * Created by PhpStorm.
 * User: westopher
 * Date: 7/17/15
 * Time: 10:07 AM
 */

namespace App\Network\Session;

use Cake\Core\Configure;
use Cake\Network\Session\CacheSession;
use Cake\Cache\Cache;

class RedisSession extends CacheSession
{
    public $cacheKey;

    public function __construct()
    {
        $this->cacheKey = Configure::read('Session.handler.cache');
        $arg = [
            'config' => $this->cacheKey
        ];
        parent::__construct($arg);
    }

    public function read($id)
    {
        return parent::read($this->_buildSignedKey($id), $this->cacheKey);
    }

    public function write($id, $data)
    {
        return parent::write($this->_buildSignedKey($id), $data, $this->cacheKey);
    }

    public function destroy($id)
    {
        return parent::destroy($this->_buildSignedKey($id), $this->cacheKey);
    }

    public function gc($expires = null)
    {
        return Cache::gc($this->cacheKey) && parent::gc($expires);
    }

    protected function _buildSignedKey($id)
    {
        $signature = str_replace(
            "=", "", base64_encode(hash_hmac('sha256', $id, \EXPRESS_SECRET, true))
        );

        return $id . '.' . $signature;
    }
}