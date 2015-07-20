<?php
/**
 * Created by PhpStorm.
 * Userwestopher
 * Date: 7/16/15
 * Time: 3:22 PM
 */

namespace App\Network;

use Cake\Network\Session;


class NodeSession extends Session
{
    public function start()
    {
        parent::start();
        $this->_buildSessionId();
    }

    public function renew()
    {
        $this->_buildSessionId();
        parent::renew();
    }

    protected function _buildSessionId()
    {
        $session_id = $this->id();

        $session_arr = explode('.', $session_id);

        if ($session_id && substr($session_id, 0, 2) !== 's:') {
            $signature = str_replace(
                "=", "", base64_encode(hash_hmac('sha256', $session_id, \EXPRESS_SECRET, true))
            );
            $this->id('s:' . $session_id . '.' . $signature);
        }
    }
}