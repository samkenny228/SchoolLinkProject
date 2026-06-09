<?php
include("check_session.php");
if(isset($_POST['btn_contribute_iconimg'])){ 
    $contribute_id =  $_POST['contribute_id'];
    $select_contribute = mysqli_query($conn, "select * from contribute where contribute_id = '$contribute_id'");
    $featch_select_contribute = mysqli_fetch_assoc($select_contribute);
    $contribute_img = $featch_select_contribute['contribution_img'];
?>

<div class="divshow">
<div class="divinnershow">  
<div class="insidediv">
    <form method="post" action="thetopic.php" class="form_topics">
    <button type="submit" name="cancel" class="btncancel cancel">
        <i class="fa-solid fa-xmark"></i>
    </button>
    </form>
    <br><hr>
    
    <div class="divshowimg">
        <?php 
            if($contribute_img == ""){ ?>
           <div class="showimg"> NO IMAGE A</div>
            <?php
            }else{
            ?>
       <img src="contribution_img/<?= $contribute_img; ?>" class="showimg">
      <?php } ?>
    </div>

    <br>
    <form method="post" action="thetopic.php" class="form_topics">
    <button type="submit" name="cancel" class="btncancel_text cancel">
        Cancel
    </button>
    </form>
    <br>

</div>
</div>
</div>

<script>
 $(document).ready(function(){
            $('.cancel').click(function(e){
                e.preventDefault();
				var $form = $(this).closest(".form_topics");
				var cancel = $form.find(".cancel").val();

            $.ajax({
                url: "show_topic.php",
                method: "post",
                data: {cancel:cancel},
                success:function(response){
                    $("#show_contribute_img").html(response);
                }
            });                
            }); 
        });
</script>

<?php
}
?>