<?php
/*
Silent letters
Silent C
The "c" is silent when preceded by an "s" followed by an 'e' or an 'i' at the beginning of a word: scenic, scenario, science.

Silent K
The "k" is silent when followed by an "n": knife, knot, knee.

Silent P
The "p" is silent when followed by an "s": psychiatrist, psychotic.

Silent H
The "h" is silent when preceded by a "p": shepherd.
The "h" is silent when preceded by a "g": ghost.
The "h" is silent when preceded by the letter 'r': rhythm.
The "h" is silent when preceded by the letters 'ex': exhausted.

Silent W
The "W" is silent followed by the letter "r" at the beginning of a word: write, wrong.
 */

namespace App;

use Nette;

class Translator extends Nette\Object {

    const SUFFIX = 'ay';

    /**
     * @param $word
     * @param $separator
     * @return string
     */
    public function translate($word, $separator) {
        if ($word == '') {
            return '';
        }
        //start with wovels or silent letters
        if (preg_match('/^([aeiouy]|exh|gh|kn|ph|ps|rh|sce|sci|wr)/i' ,$word)) {
            return $word . $separator . 'h' . Translator::SUFFIX;
        }
        else {
            $consonants = '';
            while (!preg_match('/^[aeiouy]/i', $word)) {
                $consonants .= $word[0];
                $word = substr($word, 1, strlen($word) - 1);
            }
            return $word . $separator . $consonants . Translator::SUFFIX;
        }
    }
}