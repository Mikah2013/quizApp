<?php

// Complete code for views/page.php 

return "<!DOCTYPE html>
        <html>
        <head>
          <title>$pageData->title</title>
          <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
         $pageData->css
         $pageData->embeddedStyle         
         </head>
         <body>
           <header><h1>Quiz Application</h1></header>           
           $pageData->content           
           $pageData->scriptElements
           <footer>&copy; Quiz Application 2019</footer>           
         </body>                  
         </html>";