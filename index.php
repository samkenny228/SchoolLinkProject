<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mainstyle.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/f1e65f5572.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="jquery-3.7.1.js"></script>

<script>
 $(document).ready(function(){
            $('.login').click(function(e){
                e.preventDefault();
				var $form = $(this).closest(".formlogin");
				var login = $form.find(".login").val();
				var username = $form.find(".username").val();
        var password = $form.find(".password").val();
            $.ajax({
                url: "insert_login.php",
                method: "post",
                data: {password:password,username:username,login:login},
                success:function(response){
                    $(".showmessage").html(response);
                }
            });                
            }); 
        });
</script>

</head>
<body class="mainbody">



<div class="container">
<div class="lowerdiv">

<div class="div_all_pages">

<h4 class="the_pags">The Topic</h4>
<div class="the_pags_link_div">
<span class="the_pags_link_span">
<a href="TOPIC/index.php" class="link_contribute_to">Click here</a>
</span>
</div>

<h4 class="the_pags">The Assignment</h4>
<div class="the_pags_link_div">
<span class="the_pags_link_span">
<a href="ASSIGNMENT/index.php" class="link_contribute_to"> Click here </a>
</span>
</div>

<h4 class="the_pags">The Gist</h4>
<div class="the_pags_link_div">
<span class="the_pags_link_span">
<a href="GIST/index.php" class="link_contribute_to"> Click here </a>
</span>
</div>

</div>


<div class="p_select_page">
<p>- Login with your username and password write it down in a save place so you won't forget it</p>
<p>- 
  On this page you create a topic adding image is optional, very topic has it own unique code that can be use to search for the topic created,
  any user with the topic code has the ability to view your discurtion and participate on the topic created, with the participation of any user on the topic.
</p>
<p>
- <i class="fa-regular fa-eye"></i> with a click on this, all user who participate on the topic will be mark view, all user mark viewed can be seen 
on the thetopic page.
</p>
<p>
- <i class="fa-regular fa-thumbs-up"></i> 
with a click on this all user who participate will be liked.
</p>
<p>
- <i class="fa-regular fa-thumbs-up"></i> 
This show your total like to very participation you make to any topic
</p>
<p>
- <i class="fa-regular fa-message"></i> View your previous topic here
</p>
<p>
- <i class="fa-solid fa-right-from-bracket"></i>
Logout
</p>
<div>

</div>
</div>

<div class="container">
<div class="indexlowerdiv">
<div class="indexdiveinp">
<h1 class="advertbox">Advert Box</h1>
</div>
</div>
</div>

<div style="height: 100px;"> 
</div>

<footer class="footer">Enjoy</footer>
</body>
</html>