<?php

function json_reader($json = '', $indentStr = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $newLine = "<br/>") {

        $result    = "";          // Resulting string
        $indention = "";          // Current indention after newline
        $pos       = 0;           // Indention width
        $escaped   = false;       // FALSE or escape character
        $strLen    = strlen($json);

       
        for ($i = 0; $i < $strLen; $i++) {
            // Grab the next character in the string
            $char = $json[$i];

            if ($escaped) {
                if ($escaped == $char) {
                    // End of escaped sequence
                    $escaped = false;
                }

                $result .= $char;
                if ($char == "\\" && $i + 1 < $strLen) {
                    // Next character will NOT end this sequence
                    $result .= $json[++$i];
                }

                continue;
            }

            if ($char == '"' || $char == "'") {
                // Escape this string
                $escaped = $char;
                $result .= $char;
                continue;
            }

            // If this character is the end of an element,
            // output a new line and indent the next line
            if ($char == '}' || $char == ']') {
                $indention = str_repeat($indentStr, --$pos);
                $result .= $newLine . $indention;
            }

            // Add the character to the result string
            $result .= $char;

            // If the last character was the beginning of an element,
            // output a new line and indent the next line
            if ($char == ',' || $char == '{' || $char == '[') {
                if ($char == '{' || $char == '[') {
                    $indention = str_repeat($indentStr, ++$pos);
                }
                $result .= $newLine . $indention;
            }
        }

        return  $result;
}

?>