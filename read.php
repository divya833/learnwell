<?php
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$token = $_GET['token'];
$qry_curriculum_in = $db->prepare("SELECT * FROM courses_curriculum_in WHERE token = '$token'");
$qry_curriculum_in->execute();
$row_curriculum_in = $qry_curriculum_in->fetch();
?>
<div class="modal-body p-0" style="height: 83vh; overflow:auto;">
    <?php
    if ($server == 0) {
    ?>
        <object style="min-height: 80vh;" data="<?php echo "files/" . $row_curriculum_in['material_file']; ?>" type="application/pdf" width="100%" height="100%">

        </object>
        <?php
    } else {
        $filename = $row_curriculum_in['material_file'];
        $Image = new Imagick("files/" . $row_curriculum_in['material_file']);
        $num_page = $Image->getnumberimages();

        for ($i = 0; $i < $num_page; $i++) {
            $im = new imagick('files/' . $filename . '[' . $i . ']');
            $im->setImageFormat('png');
            $im->writeImage("temps/" . $row_curriculum_in['material_file'] . $i . ".png");
        }

        for ($i = 0; $i < $num_page; $i++) {
            $iimg = "temps/" . $row_curriculum_in['material_file'] . $i . '.png';
        ?>
            <img src="<?php echo $iimg ?>" class="w-100">
        <?php
        }
        ?>
        <div class="col-12" style="position: absolute;background-color:rgba(0,0,0,0);top:0;left:0;right:0;bottom:0;">

        </div>
        <script>
            $(document).ready(function() {
                $(document).bind("contextmenu", function(e) {
                    return false;
                });
            });
        </script>
    <?php
    }
    ?>
</div>
<div class="modal-footer mt-0">
    <button onclick="stopme()" class="btn btn-danger">STOP READING & CLOSE</button>
</div>
<script>
    $(document).ready(function() {});

    function stopme() {
        $("#dynamicPopup-lg").modal('hide');
        $('.popupContent-lg').html('');
    }
</script>