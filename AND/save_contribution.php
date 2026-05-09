<?php
include("check_session.php");
if(isset($_POST['inp_contribute'])){ 
   $contribute = htmlentities(mysqli_real_escape_string($conn, $_POST["inp_contribute"]));
   $topic_id = htmlentities(mysqli_real_escape_string($conn, $_POST["topic_id"]));
    $contribute_img = htmlentities(mysqli_real_escape_string($conn, $_FILES['inp_file_contribute']['name']));
    $contribute_img_tmp_name = $_FILES['inp_file_contribute']['tmp_name'];
    $contribute_img_folder = 'contribution_img/'.$contribute_img;

$save_contribution = mysqli_query($conn, "insert into contribute(contribution, topic_id, contribution_img, user_id)
values('$contribute', '$topic_id', '$contribute_img', '$user_id')");

if($save_contribution){
    move_uploaded_file($contribute_img_tmp_name, $contribute_img_folder);
    $select_contribution = mysqli_query($conn, "select * from contribute where topic_id = '$topic_id' order by 1 DESC"); ?>

<div class="div_to_show_contribution">
<?php
    while($featch_contribution = mysqli_fetch_assoc($select_contribution)){
        $contribution = $featch_contribution['contribution'];
        $user_id_contribution = $featch_contribution['user_id'];
        $contribute_id = $featch_contribution['contribute_id'];
        $contribution_img = $featch_contribution['contribution_img'];
        
        $select_user_contribute = mysqli_query($conn, "select * from login where user_id = '$user_id_contribution'");
        $featch_user_contribution = mysqli_fetch_assoc($select_user_contribute);
        $user_contribute = $featch_user_contribution['user_name'];
?>
<form method="post" action="" class="form_contribution">
<input type="hidden" name="contribute_id" class="contribute_id" value="<?= $contribute_id; ?>">
<div class="div_inside_show_contribution">
<h4>
<?= $user_contribute; ?>

<span class="span_contribute_img">

<?php 
if($contribution_img != ""){
?>
<button type="submit" name="btn_contribute_iconimg" class="btn_contribute_iconimg" >
<i class="fa-solid fa-image"></i>
</button>
<?php } ?>


</span>

</h4>
<?= $contribution;  ?>
</div>
</form>
<hr>
<?php
} ?>

</div>
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

<?php
}
}
?>

<script>
 $(document).ready(function(){
            $('.btn_contribute_iconimg').click(function(e){
                e.preventDefault();
				var $form = $(this).closest(".form_contribution");
				var btn_contribute_iconimg = $form.find(".btn_contribute_iconimg").val();
                var contribute_id = $form.find(".contribute_id").val();

            $.ajax({
                url: "show_contribute_img.php",
                method: "post",
                data: {btn_contribute_iconimg:btn_contribute_iconimg,contribute_id:contribute_id},
                success:function(response){
                    $("#show_contribute_img").html(response);
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