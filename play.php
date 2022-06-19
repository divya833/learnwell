<?php
include('admin/include/dbConnect.php');
include('admin/include/helper.php');
$token = $_GET['token'];
$qry_curriculum_in = $db->prepare("SELECT * FROM courses_curriculum_in WHERE token = '$token'");
$qry_curriculum_in->execute();
$row_curriculum_in = $qry_curriculum_in->fetch();
?>

<link rel="stylesheet" href="https://cdn.plyr.io/3.6.5/plyr.css" />
<div class="modal-body p-0">
    <video id="player" playsinline controls data-poster="">
        <source src="<?php echo "files/" . $row_curriculum_in['material_file'] ?>" type="video/mp4" />
    </video>
</div>
<div class="modal-footer mt-0">
    <button onclick="stopme()" class="btn btn-danger">STOP & CLOSE</button>
</div>
<script>
    $(document).ready(function() {
        const player = new Plyr('#player');
    });

    function stopme() {
        $("#dynamicPopup-video").modal('hide');
        $('.popupContent-video').html('');
    }
</script>