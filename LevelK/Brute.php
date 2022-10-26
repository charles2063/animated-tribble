<?php

namespace Hackathon\LevelK;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @TODO : 97 -> 122
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        $val = "aaaa";

        while ($val != "aaaaa") {

            if (md5($val) == $this->hash || crc32($val) == $this->hash || base64_encode($val) == $this->hash || sha1($val) == $this->hash) {
                $this->origin = $val;
                return;
            }

            $val++;
        }
    }
}
