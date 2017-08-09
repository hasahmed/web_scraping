<!DOCTYPE html>
<style>

#para-wrap{
    background-color: white;    
}
p{
    display: inline-block;
    text-align: center; 
    padding-left: 20%;
    padding-right: 20%;
    
}

</style>

<html>
<head>
<title>DONG Bucket - About</title>
<?php 
    require('viewres'. DIRECTORY_SEPARATOR .'templates.php');
    insertViewRequires();
    insertSubNavBar();
?>
</head>
<body>
    <center>
    <h1>About DONG Bucket</h1>
    <div id="para-wrap">
    <p>What is a DONG? a youtube channel called <a href='https://www.youtube.com/user/Vsauce'>Vsauce</a> created a video series collecting things that you can Do Online Now, Guys, or DONG for short. They are simply links to fun and interesting things to do on the internet. They recently created a channel dedicated specifically to this topic aptly named <a href='https://www.youtube.com/channel/UClq42foiSgl7sSpLupnugGA'>DONG</a>. DONG Bucket is simply a site that serches through the various vsauce and DONG YouTube channels and finds DONG links. It's a project that I decided to work on in order to learn web scraping. The web scraping part of the project is written in Python, while the web pages are written in PHP. If you would like to learn more about the technical side of the project here is a link to its <a href="https://github.com/hasahmed/web_scrapping">Github</a> repo.
    </p>
    <p style="text-align: right;">-Hasan Y Ahmed</p>
</div>
    </center>
</body>
</html>
