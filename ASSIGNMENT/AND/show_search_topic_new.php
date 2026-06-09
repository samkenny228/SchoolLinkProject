<?php
include("check_session.php");
if(isset($_POST['btn_searchtopic'])){
   $search_topic_code = htmlentities(mysqli_real_escape_string($conn, $_POST['inp_search_topic']));
   $select_topic = mysqli_query($conn, "select * from creat_topic where topic_search_code = '$search_topic_code'");
   $num_select_topic = mysqli_num_rows($select_topic);
   if($num_select_topic > 0){
   $featch_topic = mysqli_fetch_assoc($select_topic);
   $topic = $featch_topic['topic'];
   $topic_id = $featch_topic['topic_id'];
   $who_mark_view = $featch_topic['user_id'];
?>
<div class="container">
<div class="indexlowerdiv">

<div class="divtopicimg">
<form method="post" action="" class="form_btn_iconimg">
<input type="hidden" name="topic_id" class="topic_id" value="<?= $topic_id; ?>">


<?php if($who_mark_view == $user_id){ ?>
<span class="span_eye_view">
    <button type="submit" name="btn_eye_view" class="btn_eye_view">
    <i class="fa-regular fa-eye"></i>
    </button>

    <button type="submit" name="btn_like_contribution" class="btn_like_contribution">
    <i class="fa-regular fa-thumbs-up"></i>
    </button>

</span>
<?php } ?>


<button type="submit" name="btn_iconimg" class="btn_iconimg" ><i class="fa-solid fa-image"></i></button>
<span class="topic_search_show_here"><?= $topic; ?></span>
</form>
</div>

<div class="div_to_show_contribution">
<div class="featch_contribution">

</div>
</div>

<div id="show_contribution">
<form method="post" action="" id="form_send_contribution" enctype="multipart/form-data">
     <input type="hidden" name="topic_id" class="topic_id" value="<?= $topic_id; ?>">
<div class="div_inp_contribution">

    <input type="text" name="inp_contribute" class="inp_contribute" placeholder="Contribute" required>

     <span class="inp_contribute_icon">

     <input type="file" name="inp_file_contribute" id="inp_file_contribute">
     <label for="inp_file_contribute" class="label_icon_img_contribute"><i class="fa-solid fa-image"></i></label>

     <button type="submit" name="btn_icon_send_contribution" class="btn_icon_send_contribution">
        <i class="fa-regular fa-paper-plane"></i>
     </button>
     </span>
</div>
</form>
</div>

</div>
</div>


<script>
 $(document).ready(function(){
            $('.btn_iconimg').click(function(e){
                e.preventDefault();
				var $form = $(this).closest(".form_btn_iconimg");
				var btn_iconimg = $form.find(".btn_iconimg").val();
        var topic_id = $form.find(".topic_id").val();

            $.ajax({
                url: "displayimg.php",
                method: "post",
                data: {btn_iconimg:btn_iconimg,topic_id:topic_id},
                success:function(response){
                    $("#show_img_message").html(response);
                }
            });                
            }); 
        });
</script>


<script type="text/javascript">
$(document).ready(function(){
  $('#form_send_contribution').submit(function(e){
   e.preventDefault();
            $.ajax({ 
                url: "save_contribution.php",
                method: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                success:function(response){
                  $("#show_contribution").show();
                    $("#show_contribution").html(response);
                }
            });     
  });
});
</script>


<script>
 $(document).ready(function(){
            $('.btn_eye_view').click(function(e){
                e.preventDefault();
				var $form = $(this).closest(".form_btn_iconimg");
				var btn_eye_view = $form.find(".btn_eye_view").val();
                var topic_id = $form.find(".topic_id").val();

            $.ajax({
                url: "mark_view.php",
                method: "post",
                data: {btn_eye_view:btn_eye_view,topic_id:topic_id},
                success:function(response){
                    $("#viewed_contribute").html(response);
                }
            });                
            }); 
        });
</script>


<script>
 $(document).ready(function(){
            $('.btn_like_contribution').click(function(e){
                e.preventDefault();
				var $form = $(this).closest(".form_btn_iconimg");
				var btn_like_contribution = $form.find(".btn_like_contribution").val();
                var topic_id = $form.find(".topic_id").val();

            $.ajax({
                url: "like_contribution.php",
                method: "post",
                data: {btn_like_contribution:btn_like_contribution,topic_id:topic_id},
                success:function(response){
                    $("#liked_contribute").html(response);
                }
            });                
            }); 
        });
</script>

<script src="javascript/show_comtribution.js"></script>
<!--
<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("featch_contribution").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "show_contribution.php", true);
  xhttp.send();
}
setInterval(function(){
    loadXMLDoc();
}, 500);
window.onload = loadXMLDoc;
</script>
-->


<?php

}else{ 
    echo "<script>alert('Enter the correct topic code')</script>";    
?>
<div id="show_search_topic">
<div class="container">
<div class="indexlowerdiv">

<div class="divtopicimg">
<form method="post" action="" class="form_btn_iconimg">
<input type="hidden" name="topic_id" class="topic_id" value="">
<button name="btn_iconimg" class="btn_iconimg" ><i class="fa-solid fa-image"></i></button> 
<span class="topic_search_show_here">Search Topic</span>
</form>
</div>

<div class="thetopicshowshere">
<h4>Search Topic</h4>
</div>
</div>

</div>
</div>
<?php
}
}
?>