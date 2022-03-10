<html>
    <header>
        <title>DocTest</title>
        <body>
<?php

require_once 'bootstrap.php'; 
use PhpOffice\PhpWord;

$objreader = PhpOffice\PhpWord\IOFactory::createReader('Word2007');

 $phpword = $objreader->load('student.docx');
 
 $tempfile = tempnam(sys_get_temp_dir(),'tempstudent');

$phpword->save($tempfile, 'HTML');
$dom = new DomDocument('1.0', 'UTF-8');

@$dom->load($tempfile); 
$body = $dom->getElementsByTagName('body')->item(0)->nodeValue;
$txt = str_replace("\n", "\r\n", strip_tags($body));

 file_put_contents('student.txt', $txt);
 ?>
        </body>
    </header>
</html>