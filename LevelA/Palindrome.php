<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        $res = $this->str;
        preg_match_all('/./us', $this->str, $matches);
        $matches = array_reverse($matches[0]);
        foreach ($matches as $match) {
            $res .= $match;
        }

        return $res;
    }

}
