<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        /** @TODO */
        $length = strlen($s1);
        for ($i = 0; $i < $length; $i++) {
            if (substr($s1, $i) . substr($s1, 0, $i) === $s2) {
                return true;
            }
        }

        return false;
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}
