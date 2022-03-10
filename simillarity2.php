<html>
    <head>
        <title>DocTest</title>
</head>
<body>    

<?php
require_once 'bootstrap.php'; 
use PhpOffice\PhpWord;
$content = '';

require_once dirname(__FILE__) . '/includes/phpoffice/vendor/autoload.php';
$phpWord = \PhpOffice\PhpWord\IOFactory::load('helloworld.docx');

foreach($phpWord->getSections() as $section) {
    foreach($section->getElements() as $element) {
        if (method_exists($element, 'getElements')) {
            foreach($element->getElements() as $childElement) {
                if (method_exists($childElement, 'getText')) {
                    $content .= $childElement->getText() . ' ';
                }
                else if (method_exists($childElement, 'getContent')) {
                    $content .= $childElement->getContent() . ' ';
                }
            }
        }
        else if (method_exists($element, 'getText')) {
            $content .= $element->getText() . ' ';
        }
    }
}

echo $content;
?>
</body>
</html>