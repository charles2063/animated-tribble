<?php

namespace Hackathon\LevelM;

class Debug
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /** Cette fonction retourne le deuxième élèment de la liste */
    public function myList()
    {
        list($a, $a) = array(1, 2, 3, 4);

        return array(
                'return' => $a,
                'cheat' => $this->token,
            );
    }

    /** Cette fonction retourne vrai si array1 est égale à array2
     mais peu importe l'ordre des tableaux */
    public function myArraysAreEquals()
    {
        $array1 = array(
            'foo' => 'foo',
            'bar' => 'bar',
            'token' => $this->token,
        );

        $array2 = array(
            'token' => $this->token,
            'bar' => 'bar',
            'foo' => 'foo',
        );

        return array(
            'return' => $array1 == $array2,
            'cheat' => $this->token,
        );
    }

    /** Il n'y a rien à faire ici... juste à lire pour le fun
     Ici, nous avons FALSE == TRUE */
    public function trueEqualsFalse()
    {
        return true;
    }

    /** Ici nous avons un element et nous retournons le suivant
     Uniquement des valeurs scalaires */
    public function increment($a)
    {
        if (gettype($a) == 'string') {
            $end = substr($a, -1);
            $new = (int) $end;
            if ($new) {
                $new++;
                $new = (string) $new;
                $a = substr($a, 0, -1).$new;
                return $a;
            }
            else {
                return (++$a);
            }
        }
        return (++$a);
    }
}
