<?php

require 'app/init.php';
$xml_ciktisi = null;

header('Content-type: text/xml');

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-9\" ?>\n";
echo "<urlset xmlns=\"http://www.google.com/schemas/sitemap/0.84\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd\">";

$xml_ciktisi .= "\n<url>\n<loc>".site_url()."</loc>\n<changefreq>daily</changefreq>\n<priority>1.00</priority>\n</url>";

// ürün kategorileri
$kategoriler = DB::get("SELECT * FROM chip_kategoriler order by id DESC");
foreach($kategoriler as $kategori){
	$xml_ciktisi .= "\n<url>\n<loc>" . site_url("kategori/" . permalink($kategori->kategori_adi) . "/" . $kategori->id) . "</loc>\n<changefreq>daily</changefreq>\n<priority>0.95</priority>\n</url>";
}

// ürünler
$urunler = DB::get("SELECT * FROM chip_urunler order by id DESC");
foreach($urunler as $urun){
	$xml_ciktisi .= "\n<url>\n<loc>" . site_url("urun/" . $urun->seourl . "/" . $urun->id) . "</loc>\n<changefreq>daily</changefreq>\n<priority>0.95</priority>\n</url>";
}

// makaleler
$makaleler = DB::get("SELECT * FROM makaleler order by id DESC");
foreach($makaleler as $makale){
	$xml_ciktisi .= "\n<url>\n<loc>" . site_url("makale/" . $makale->seourl) . "</loc>\n<changefreq>daily</changefreq>\n<priority>0.95</priority>\n</url>";
}

$xml_ciktisi .= "\n<url>\n<loc>" . site_url("hakkimizda") . "</loc>\n<changefreq>daily</changefreq>\n<priority>0.75</priority>\n</url>";
$xml_ciktisi .= "\n<url>\n<loc>" . site_url("yardim") . "</loc>\n<changefreq>daily</changefreq>\n<priority>0.75</priority>\n</url>";

echo $xml_ciktisi ."\n</urlset>";

?>
