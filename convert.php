<?php

/**
 * Register source data
 */

$xml = simplexml_load_file('source/profiles-export.xml');
$xml = register_name_spaces($xml);
$output_file = "output.xml";
// remove all profile_cct meta fields
// unset($xml->xpath('seg[@id="A12"]')[0]->{0});
/**
 * Identify and parse needed changes
 */
$items = $xml->xpath("//item");
$parsed_items = parse_items($items);

/**
 * Create a new xml file for WordPress to import
 */
create_new_xml($xml, $parsed_items);

/**
 * Register specified xmlns
 *
 * @param Simplexml $xml
 * @return Simplexml
 */
function register_name_spaces($xml)
{
    $xml->registerXPathNamespace('excerpt', 'xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"');
    $xml->registerXPathNamespace('content', 'xmlns:content="http://purl.org/rss/1.0/modules/content/"');
    $xml->registerXPathNamespace('wfw', 'xmlns:wfw="http://wellformedweb.org/CommentAPI/"');
    $xml->registerXPathNamespace('dc', 'xmlns:dc="http://purl.org/dc/elements/1.1/"');
    $xml->registerXPathNamespace('wp', 'xmlns:wp="http://wordpress.org/export/1.2/"');
    return $xml;
}

/**
 * Format xml 'items' to remove profiles specific features
 *
 * @param array->Simplexml $items
 * @return Simplexml
 */
function parse_items($items)
{
    $new_items = [];
    foreach ($items as $item) {
        $new_item = parse_item($item);
        array_push($new_items, $new_item);
    }
    return $items;
}

/**
 * Format a specific item
 *
 * @param Simplexml $item
 * @return Simplexml
 */
function parse_item($item)
{
    $ns = $item->getNamespaces(true);
    $wp_elements = $item->children($ns['wp']);
    $postmetas = $wp_elements->postmeta;
    $old = "";
    $new = "";
    foreach ($postmetas as $meta) {
        $old .= $meta->asXml();
        $key_val = $meta->meta_key;
        if (str_contains($key_val, "profile_cct")) {
            unset($meta[0]->{0});
        } else {
            $new .= $meta->asXml();
        }
    }
    file_put_contents('shouldbeclean.xml', $postmetas->asXml());
    file_put_contents('old_output_file.xml', $old);
    file_put_contents('output_file.xml', $new);
    $new_wp_elements = $item->children($ns['wp']);
    $new_item = $item;
    return $new_item;
}

/**
 * Create a new XML file from parsed data
 *
 * @param Simplexml $old_xml
 * @param Simplexml $new_items
 * @return void
 */
function create_new_xml($old_xml, $new_items)
{
    // replace items with new items
    $new_xml = 'xml';
    write_xml_file($new_xml);
}

/**
 * Write xml to a file
 *
 * @param Simplexml $xml
 * @return void
 */
function write_xml_file($xml)
{
    // write the xml to a file
}