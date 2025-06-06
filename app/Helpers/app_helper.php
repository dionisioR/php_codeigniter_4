<?php
function check_status($item, $status)
{
    if (key_exists($status, STATUS_LIST)) {
        if ($item === $status) {
            return 'selected';
        } else {
            return '';
        }
    } else {
        return '';
    }
}

function encrypt($value)
{
    try {
        $enc = \Config\Services::encrypter();
        return bin2hex($enc->encrypt($value));
    } catch (\Exception $e) {
        return false;
    }
}

function decrypt($value)
{
    try {
        $enc = \Config\Services::encrypter();
        return $enc->decrypt(hex2bin($value));
    } catch (\Exception $e) {
        return false;
    }
}
