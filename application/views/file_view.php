<?php 
//echo $error;

/*
foreach ($hasil as $has) {
	echo "<pre>";
	echo $has['no_dok'];
	echo $has['nm_dok'];
	echo $has['asal'];
	echo "</pre>";
}
*/
/*
foreach ($hasil as $has) {
	echo "<pre>";
	echo $has['no_dok'];
	echo "</pre>";
}
*/
/*
$fi = new FilesystemIterator('assets/dokumen', FilesystemIterator::SKIP_DOTS);
$fa = iterator_count($fi);
echo 'jumlah file: '.$fa.'<br>';
*/

$path = "assets/dokumen";
echo "Folder $path = ".filesize_r($path)." bytes";
 
function filesize_r($path){
  if(!file_exists($path)) return 0;
  if(is_file($path)) return filesize($path);
  $ret = 0;
  foreach(glob($path."/*") as $fn)
    $ret += filesize_r($fn);
  return $ret;
}

echo "<h1>INI HALAMAN TESTING DATABASE</h1>";
?>