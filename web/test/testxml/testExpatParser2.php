<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/28
 * Time: 10:16
 */
$xml = <<<XML
<infos>
<para><note>note1</note><extra>extra1</extra></para>
<para><note>note2</note></para>
<para><note>note3</note><extra>extra3</extra></para>
</infos>
XML;

$result = array();
$index = -1;
$currData;

function charactor($parser, $data) {
    global $currData;
    $currData = $data;
}

function startElement($parser, $name, $attribs) {
    global $result, $index;
    $name = strtolower($name);
    if($name == 'para') {
        $index++;
        $result[$index] = array();
    }
}

function endElement($parser, $name) {
    global $result, $index, $currData;
    $name = strtolower($name);
    if($name == 'note' || $name == 'extra') {
        $result[$index][$name] = $currData;
    }
}

$xml_parser = xml_parser_create();
xml_set_character_data_handler($xml_parser, "charactor");
xml_set_element_handler($xml_parser, "startElement", "endElement");
if (!xml_parse($xml_parser, $xml)) {
    echo "Error when parse xml: ";
    echo xml_error_string(xml_get_error_code($xml_parser));
}
xml_parser_free($xml_parser);

require_once ("../includefiles/display.php");
export($result);
