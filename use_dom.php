<?php

$dom = new DOMDocument();
$dom->load('source/profiles-export.xml');
$root = $dom->documentElement; // This can differ (I am not sure, it can be only documentElement or documentElement->firstChild or only firstChild)
// var_dump($dom);
// $ns = $dom->getNamespaces(true);

// Get namespaces as an array
$sxe = simplexml_import_dom($dom);
$ns = $sxe->getNamespaces(true);

$nodesToDelete = array();

$items = $root->getElementsByTagName('item');

// Loop trough childNodes
foreach ($items as $item) {
    $postmetas = $item->getElementsByTagNameNS($ns["wp"], "postmeta");//->item(0)->textContent;
    // $title = $item->getElementsByTagName('title')->item(0)->textContent;
    // $address = $item->getElementsByTagName('address')->item(0)->textContent;
    // $latitude = $item->getElementsByTagName('latitude')->item(0)->textContent;
    // $longitude = $item->getElementsByTagName('longitude')->item(0)->textContent;
    // var_dump($type);
    // die();
    // Your filters here
    foreach ($postmetas as $postmeta) {
        $key_value = $postmeta->getElementsByTagName('meta_key')->item(0)->textContent;
        if (str_contains($key_value, "profile_cct")) {
            echo trim($key_value) . "\n";
            // remove all profile_cct nodes
        }
    }
    // filter and update the rest of the file.
/*
// Change post type.
// Change the post_type to
	< wp:post_type > < ![CDATA[profile_cct]] > <  / wp:post_type >

	< wp:post_type > < ![CDATA[post]] > <  / wp:post_type >
*/
/*
// Change the category to a tag
'profile_cct_position' to a tag
<category domain="profile_cct_position" nicename="emeriti">
    <![CDATA[Emeriti]]>
</category>
*/
    // To remove the item you just add it to a list of nodes to delete
    $nodesToDelete[] = $item;
}

// You delete the nodes
foreach ($nodesToDelete as $node) {
    $node->parentNode->removeChild($node);
}

// echo $dom->saveXML();