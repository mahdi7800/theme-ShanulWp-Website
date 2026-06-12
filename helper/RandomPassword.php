<?php
class RandomPassword
{
    protected static int $length = 9;
    protected static string $character = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    protected static string $character_s = '@#$%&*!?';
    public static function generateRandomString() : string {
        $charactersNumber = strlen(self::$character);
        $charactersLength = strlen(self::$character_s);
        $number_random = rand(1,999);
        $result = "";
        for ($i = 0; $i < self::$length; $i++) {
            $result = $result . self::$character[rand(0, $charactersNumber - 1)];
        }
        $result = $result . $number_random . self::$character_s[rand(0, $charactersLength - 1)];
        return $result;
    }
}
