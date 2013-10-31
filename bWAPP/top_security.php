<?php

/*

bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.
It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!
It is for educational purposes only.

Enjoy!

Malik Mesellem
Twitter: @MME_IT

© 2013 MME BVBA. All rights reserved.

*/

session_start();

$message = "";
$strong = false;

$secret = "PGk+PHA+U2VjdXJlIHRoZSB3b3JsZC4gRmlnaHQgY3JpbWUgYW5kIHNlbnNlbGVzcyB2aW9sZW5j";
$secret.= "ZS48YnIgLz5Eb24ndCBsZXQgVEhFTSB0YWtlIHlvdXIgbWluZCBhbmQgc291bC48YnIgLz5Mb3Zl";
$secret.= "IGVhY2ggb3RoZXIuPGJyIC8+WW91IGhhdmUgYSBtaXNzaW9uISBTcHJlYWQgdGhlc2Ugd29yZHMu";
$secret.= "Li48L3A+PHA+T2ggeWVhaC4uLiBJIHJlYWxseSBsb3ZlIHRob3NlIGhlcm8gbW92aWVzIDopPC9w";
$secret.= "PjxwPlJlZ2FyZHM8L3A+PHA+TWFsaWs8L3A+PC9pPg==";

/* Debugging
echo $_SESSION["top_security_nossl"];
echo "<br />";
echo $_COOKIE["top_security_nossl"];
*/

if(isset($_SESSION["login"]) && $_SESSION["login"])
{ 
   
    if(isset($_SESSION["top_security_nossl"]) && isset($_COOKIE["top_security_nossl"]) && $_SESSION["top_security_nossl"] == $_COOKIE["top_security_nossl"])
    {
        
        $message = "<p>Welcome " . ucwords($_SESSION["login"]) . ",</p><p>You have a valid session and a strong session!</p>";
        $message.= "<p>However, the <i>top security</i> cookie is not protected over a non-SSL channel!<br>";
        $message.= "You should try security level <i>high</i> in combination with a SSL channel...</p>";  
        
        $strong = true;  
        
    }    
    
    if(isset($_SESSION["top_security_ssl"]) && isset($_COOKIE["top_security_ssl"]) && $_SESSION["top_security_ssl"] == $_COOKIE["top_security_ssl"])
    {
        
        $message = "<p>Welcome " . ucwords($_SESSION["login"]) . ",</p><p>You have a valid session and a strong session.";                
        $message.= "<br />The <i>top security</i> cookie is protected over a non-SSL channel. This is maximum security!</p>";
        $message.= base64_decode($secret);
        
        $strong = true;
        
    }
        
    if($strong != true)
    {
        
        $message = "<p>Welcome " . ucwords($_SESSION["login"]) . ",</p><p>You have a valid session but not a strong session!</p>";
            
    }
    
}

else
{
    
    $message = "<p>You are not welcome here.</p><p>You don't have a valid session!</p>";    
    
}

?>
<!DOCTYPE html>
<html>
    
<head>
        
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<!--<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
<script src="js/html5.js"></script>

<title>bWAPP - Session Management</title>

</head>

<body>
    
<header>

<h1>bWAPP</h1>

<h2>an extremely buggy web app !</h2>

</header>    

<div id="menu">
      
    <table>
        
        <tr>
            
            <td><font color="#ffb717">Top Security</font></td>
            <td><a href="http://itsecgames.blogspot.com" target="_blank">Blog</a></td>
            
        </tr>
        
    </table>   
   
</div> 

<div id="main">
    
    <h1>Session Mgmt. - Strong Sessions</h1>

    <?php echo $message;?>


</div>
    
<div id="side">    
    
    <a href="http://itsecgames.blogspot.com" target="blank_" class="button"><img src="./images/blogger.png"></a>
    <a href="http://be.linkedin.com/in/malikmesellem" target="blank_" class="button"><img src="./images/linkedin.png"></a>
    <a href="http://twitter.com/MME_IT" target="blank_" class="button"><img src="./images/twitter.png"></a>
    <a href="http://www.facebook.com/pages/MME-IT-Audits-Security/104153019664877" target="blank_" class="button"><img src="./images/facebook.png"></a>

</div>     
    
<div id="disclaimer">
          
    <p>bWAPP or a buggy web application is for educational purposes only / © 2013 <b>MME BVBA</b>. All rights reserved.</p>
   
</div>
    
<div id="bee">
    
    <img src="./images/bee_1.png">
    
</div>    
      
</body>
    
</html>