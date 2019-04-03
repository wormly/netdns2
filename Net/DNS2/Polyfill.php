<?php

// taken from: https://github.com/symfony/polyfill/blob/master/src/Ctype/Ctype.php

class Net_DNS2_Polyfill
{
	public static function ctype_xdigit($text)
    {
        $text = self::convert_int_to_char_for_ctype($text);
        return \is_string($text) && '' !== $text && !preg_match('/[^A-Fa-f0-9]/', $text);
    }

	private static function convert_int_to_char_for_ctype($int)
    {
        if (!\is_int($int)) {
            return $int;
        }
        if ($int < -128 || $int > 255) {
            return (string) $int;
        }
        if ($int < 0) {
            $int += 256;
        }
        return \chr($int);
	}
}
