<html>
    <header>
        <title>DocTest</title>
        <body>
            <p> my name is doctest. Here's your document</p>
<?php

//creating function to read the docx file. Compatible with php 8 - please note that readDocx is the function name 
function readDocx($filename)
    {

        $zip = new ZipArchive();
        if ($zip->open($filename)) {
            $content = $zip->getFromName("word/document.xml");
            $zip->close();
            $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
            $content = str_replace('</w:r></w:p>', "\r\n", $content);

            return strip_tags($content);
        }
        return false;

    }
//telling php to read the word file with function above 
$filename = "student.docx";

// or /var/www/html/file.docx

 $content = readDocx($filename);

 if($content !== false) {        print_r(nl2br($content));    }    
else {        echo 'Couldn\'t the file. Please check that file.';    }

    ?>
    </body>
</header>
</html>