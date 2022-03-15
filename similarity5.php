<html>
    <header>
        <title>DocTest</title>
        <body>
            <p> This is doctest. Its working!</p>
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

//put text from first document into array 
$arraytext = explode(" ", $content);

echo $arraytext[0]; //this should display the first string of text from the document 
echo $arraytext[1]; //this should display the second string of text from the document 



//loading document 2 

$filename = "student2.docx";

$content = readDocx($filename);

if($content !== false) {        print_r(nl2br($content));    }    
else {        echo 'Couldn\'t the file. Please check that file.';    }
//put text from second document into array 
$arraytext2 = explode(" ", $content);

echo $arraytext2[0]; //this should display the first string of text from the second document 
echo $arraytext2[1]; //this should display the second string of text from the second document 

//compare arrays 
similar_text("$arraytext","$arraytext2", $percent); 
echo "$percent"; 

    ?>
    </body>
</header>
</html>