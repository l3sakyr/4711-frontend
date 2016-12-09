<?php
if (!defined('APPPATH'))
	exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        {caboose_styles}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
       
    </head>
    <body>
        <div class="container">
                   
            </div>           
            <center>
                <div id="content" style=" min-height:500px">
                    {navbar}
                    {content}
                </div>
                <div id="footer">
                    <p>Copyright &copy; 2016, <a href="mailto:someone@somewhere.com">Me</a>.</p>
                </div>
            </center>
        </div>
        {caboose_scripts}
        {caboose_trailings}
    </body>
</html>
