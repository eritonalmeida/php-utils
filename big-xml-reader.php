<?php
$item = "item";

$map = array(
    "id" => "item_id",
    "title" => "item_name",
    "description" => "item_description",
    "link" => "item_link",
    "image_link" => "item_image",
);

$xml = new XMLReader();
$xml->open('file.xml', NULL, LIBXML_PARSEHUGE);

while ($xml->read()) {

    if ($xml->nodeType == XMLReader::ELEMENT && $xml->localName == $item) {

        $xml->read();

        $data = array();

        while ($xml->localName != $item) {

            $field = $xml->localName;

            if ($xml->nodeType == XMLReader::ELEMENT && isset($map[$field])) {

                $data[$map[$field]] = $xml->readString();

                $xml->read();
            }

            $xml->read();
        }

        print_r($data);
    }
}

$xml->close();
