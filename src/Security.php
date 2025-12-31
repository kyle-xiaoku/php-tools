<?php

namespace Kyledong\PhpTools;

class Security
{
    /**
     * open ssl 的加密
     *
     * @param string $plainText
     * @param string $encryptKey
     * @param string $cipher_algo
     * @return string
     */
    public static function encryptOpenssl(string $plainText, string $encryptKey, string $cipher_algo = 'aes-128-cbc')
    {
        $screct_key = base64_decode($encryptKey);
        $str = trim($plainText);
        $str = self::addPKCS7Padding($str);
        $iv = str_repeat("\0", 16);
        $encrypt_str = openssl_encrypt($str, $cipher_algo, $screct_key, OPENSSL_NO_PADDING, $iv);

        return base64_encode($encrypt_str);
    }

    /**
     * AES解密
     *
     * @param string $cipherText
     * @param string $encryptKey
     * @param string $cipher_algo
     * @return false|string
     */
    public static function decryptOpenssl(string $cipherText, string $encryptKey, string $cipher_algo = 'aes-128-cbc')
    {
        $str = base64_decode($cipherText);
        $screct_key = base64_decode($encryptKey);
        $iv = str_repeat("\0", 16);
        $decrypt_str = openssl_decrypt($str, $cipher_algo, $screct_key, OPENSSL_NO_PADDING, $iv);
        $decrypt_str = self::stripPKSC7Padding($decrypt_str);
        return $decrypt_str;
    }

    /**
     * 填充算法
     * @param string $source
     * @return string
     */
    private static function addPKCS7Padding($source)
    {
        $source = trim($source);
        $block = 16;

        $pad = $block - (strlen($source) % $block);
        if ($pad <= $block) {
            $char = chr($pad);
            $source .= str_repeat($char, $pad);
        }
        return $source;
    }

    /**
     * 移去填充算法
     * @param string $source
     * @return string
     */
    private static function stripPKSC7Padding($source)
    {
        $char = substr($source, -1);
        $num = ord($char);
        if ($num == 62) return $source;
        $source = substr($source, 0, -$num);
        return $source;
    }
}