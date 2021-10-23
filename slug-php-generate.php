<?php
declare(strict_types=1);

namespace Ddi;

class slugPhpGenerate
{

   public function generate(string $string, string $separator = "-"): string
   {
      $separators = ["-", "_", "*", "~"];

      if (!in_array($separator, $separators, true)) {
         $separator = "-";
      }

      $specialsCharacters = [':', '!', '?', '/', '\\', ';', ',', '.', '§', '*', '%', '$', ')', '(', ']', '[', '&', '=', '#', '"', '|', '{', '}'];
      $specialsA = ['à', 'á', 'â', 'ã', 'ä', 'å'];
      $specialsC = ['ç'];
      $specialsO = ['ð', 'ò', 'ó', 'ô', 'õ', 'ö'];
      $specialsU = ['ù', 'ú', 'û', 'ü'];
      $specialsI = ['ì', 'í', 'î', 'ï'];
      $specialsY = ['ý', 'ÿ'];
      $specialsE = ['è', 'é', 'ê', 'ë', 'É'];

      $slug = str_replace($specialsCharacters, '', $string);
      $slug = str_replace($specialsA, 'a', $slug);
      $slug = str_replace($specialsC, 'c', $slug);
      $slug = str_replace($specialsO, 'o', $slug);
      $slug = str_replace($specialsU, 'u', $slug);
      $slug = str_replace($specialsI, 'i', $slug);
      $slug = str_replace($specialsY, 'y', $slug);
      $slug = str_replace($specialsE, 'e', $slug);
      $slug = str_replace('-', ' ', $slug);

      $slug = str_replace('\'', '-', $slug);

      $arr = explode(' ', $slug);
      $arr = array_map('trim', $arr);
      $arr = array_filter($arr);
      $slug = implode($separator, $arr);

      return strtolower($slug);
   }
}
