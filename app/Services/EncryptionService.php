<?php
    namespace App\Services;

    class EncryptionService{

        private function evpKDF($password, $salt, $keySize = 8, $ivSize = 4, $iterations = 1, $hashAlgorithm = "md5") {
            $targetKeySize = $keySize + $ivSize;
            $derivedBytes = "";
            $numberOfDerivedWords = 0;
            $block = NULL;
            $hasher = hash_init($hashAlgorithm);
            while ($numberOfDerivedWords < $targetKeySize) {
                if ($block != NULL) {
                    hash_update($hasher, $block);
                }
                hash_update($hasher, $password);
                hash_update($hasher, $salt);
                $block = hash_final($hasher, TRUE);
                $hasher = hash_init($hashAlgorithm);
                // Iterations
                for ($i = 1; $i < $iterations; $i++) {
                    hash_update($hasher, $block);
                    $block = hash_final($hasher, TRUE);
                    $hasher = hash_init($hashAlgorithm);
                }
                $derivedBytes .= substr($block, 0, min(strlen($block), ($targetKeySize - $numberOfDerivedWords) * 4));
                $numberOfDerivedWords += strlen($block)/4;
            }
            return array(
                "key" => substr($derivedBytes, 0, $keySize * 4),
                "iv"  => substr($derivedBytes, $keySize * 4, $ivSize * 4)
            );
        }
        public function encrypt_decrypt($action, $string) 
        {
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $secret_key = 'arsavivaE123ncRyPTiOn';
            $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
            //$secretkey="0123456789abcdef0123456789abcdef";
            //$secretiv="abcdef9876543210abcdef9876543210";
            // hash
            $key = hash('sha256', $secret_key);    
            // iv - encrypt method AES-256-CBC expects 16 bytes 
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            if ( $action == 'encrypt' ) {
                $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
                $output = base64_encode($output);
            }
            else if( $action == 'decrypt' ) {
                $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
            }
            else if( $action == 'cryptodecrypt' ) {
                $ciphertext = base64_decode($string);
                if (substr($ciphertext, 0, 8) != "Salted__") {
                    return false;
                }
                $salt = substr($ciphertext, 8, 8);
                $keyAndIV = $this->evpKDF($secret_key, $salt);
                $output = openssl_decrypt(
                    substr($ciphertext, 16),
                    "aes-256-cbc",
                    $keyAndIV["key"],
                    OPENSSL_RAW_DATA, // base64 was already decoded
                    $keyAndIV["iv"]);
            }
            return $output;
        }
    }



?>