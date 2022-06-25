<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'MANAGE COURSE';
$token = $_GET['token'];
$qry = $db->prepare("SELECT * FROM courses WHERE token = '$token'");
$qry->execute();
$row = $qry->fetch();

if ($row['status'] == 1) {
    $status =  '<span class="btn btn-success btn-lg">PUBLISHED</span>';
    $statusAction = '<a href="actions/course-status.php?token=' . $row['token'] . '&status=0" class="btn-fill-md text-light bg-orange-red float-right">UN PUBLISH</a>';
} else {
    $status =  '<span class="btn btn-danger btn-lg">NOT PUBLSIHED</span>';
    $statusAction = '<a href="actions/course-status.php?token=' . $row['token'] . '&status=1" class="btn-fill-md text-light bg-dodger-blue float-right">PUBLISH</a>';
}
?>
<!doctype html>
<html class="no-js" lang="">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title ?> | LEARN WELL ADMIN PANEL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/datepicker.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="datatable/DataTables-1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="js/modernizr-3.6.0.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <?php include("include/header.php"); ?>
        <div class="dashboard-page-one">
            <?php include("include/sidebar.php"); ?>
            <div class="dashboard-content-one">
                <div class="breadcrumbs-area">
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title w-100">
                                        <h3 class="mt-3">Course Details <?php echo " - ".$status.$statusAction ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <form class="new-added-form" action="actions/course-update.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Category<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="web design/photography/app development etc" name="category" value="<?php echo $row['category'] ?>" class="form-control" required>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Title<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="Basic Web Design by Photoshop and Figma" name="title" value="<?php echo $row['title'] ?>" class="form-control" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Description<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" name="description" id="form-message" rows="5" required><?php echo $row['description'] ?></textarea>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <label>Course Level<span class="text-danger">*</span></label>
                                            <select class="select2" required name="course_level">
                                                <option><?php echo $row['course_level'] ?></option>
                                                <option>Beginner</option>
                                                <option>Intermediate</option>
                                                <option>Advanced</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <label>Duration<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="25.5 Hrs" name="duration" value="<?php echo $row['duration'] ?>" class="form-control" required>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                                            <label>Language<span class="text-danger">*</span></label>
                                            <select class="select2" required name="language">
                                                <option><?php echo $row['language'] ?></option>
                                                <option>English</option>
                                                <option>Malayalam</option>
                                                <option>Hindi</option>
                                                <option>Tamil</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Target Audience<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" placeholder="Any Job Holders, Students etc" name="target" id="form-message" rows="5" required><?php echo $row['target'] ?></textarea>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Requirements<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" placeholder="DevTools Debugging Tips And Shortcuts (Chrome, Firefox, Edge)" name="requirement" id="form-message" rows="5" required><?php echo $row['requirement'] ?></textarea>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Course Price in INR<span class="text-danger">*</span></label>
                                            <input type="number" name="price" value="<?php echo $row['price'] ?>" class="form-control" required>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>
                                                Image<button type="button" class="btn btn-lg float-right btn-warning" class="modal-trigger" data-toggle="modal" data-target="#large-modal">View image</button>
                                            </label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-12 mg-t-8">
                                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark float-right ml-3" name="submit">UPDATE</button>
                                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow float-right">RESET</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3 class="mt-3">Course Curriculum</h3>
                                    </div>
                                </div>
                                <?php
                                $qry_curriculum = $db->prepare("SELECT * FROM courses_curriculum WHERE course = '$token' ORDER BY id DESC");
                                $qry_curriculum->execute();
                                for ($i2 = 0; $row_curriculum = $qry_curriculum->fetch(); $i2++) {
                                ?>
                                    <hr class="mt-5">
                                    <div class="row">
                                        <div class="col-8">
                                            <form class="new-added-form mt-5 mb-5" action="actions/curriculum-update.php" method="post" autocomplete="off">
                                                <input type="hidden" name="token" value="<?php echo $row_curriculum['token'] ?>">
                                                <input type="hidden" name="course" value="<?php echo $token ?>">
                                                <div class="form-group">
                                                    <label>Update Curriculum Title<span class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Introduction" name="title" value="<?php echo $row_curriculum['title'] ?>" class="form-control" required>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-12 px-4 pt-4 rounded" style="background-color: rgba(0,0,0,.1);">
                                            <h4>MATERIALS IN <?php echo strtoupper($row_curriculum['title']) ?></h4>
                                            <form class="new-added-form mt-5 mb-5" action="actions/curriculum-in-create.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                                <input type="hidden" name="curriculum" value="<?php echo $row_curriculum['token'] ?>">
                                                <input type="hidden" name="course" value="<?php echo $token ?>">
                                                <div class="row">
                                                    <div class="col-md-4 form-group">
                                                        <label>Material Title<span class="text-danger">*</span></label>
                                                        <input type="text" placeholder="What is Web Design?" name="material" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>Type<span class="text-danger">*</span></label>
                                                        <select class="select2" required name="material_type">
                                                            <option value="">Please Select*</option>
                                                            <option>Video</option>
                                                            <option>PDF</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>Duration<span class="text-danger">*</span></label>
                                                        <input type="text" placeholder="18:23" name="duration" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>File<span class="text-danger">*</span></label>
                                                        <input type="file" name="material_file" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>&nbsp;<span class="text-danger"></span></label>
                                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark ml-3" name="submit">ADD</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            $qry_curriculum_in = $db->prepare("SELECT * FROM courses_curriculum_in WHERE course = '$token' AND curriculum = '" . $row_curriculum['token'] . "'");
                                            $qry_curriculum_in->execute();
                                            if ($qry_curriculum_in->rowcount() > 0) {
                                            ?>
                                                <div class="table-responsive">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Material</th>
                                                                <th>Type</th>
                                                                <th>Duration</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php for ($i3 = 0; $row_curriculum_in = $qry_curriculum_in->fetch(); $i3++) {
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $row_curriculum_in['material'] ?></td>
                                                                    <td><?php echo $row_curriculum_in['material_type'] ?></td>
                                                                    <td><?php echo $row_curriculum_in['duration'] ?></td>
                                                                    <td>
                                                                        <a href="<?php echo "../files/" . $row_curriculum_in['material_file'] ?>" target="_blank" class="btn btn-info btn-lg">VIEW</a>
                                                                        <a href="actions/curriculum-in-delete.php?token=<?php echo $row_curriculum_in['token'] ?>&course=<?php echo $token ?>" class="btn btn-danger btn-lg">DELETE</a>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Material</th>
                                                                <th>Type</th>
                                                                <th>Duration</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <hr class="mt-5">
                                <div class="row">
                                    <div class="col-8">
                                        <form class="new-added-form mt-5 mb-5" action="actions/curriculum-create.php" method="post" autocomplete="off">
                                            <input type="hidden" name="course" value="<?php echo $token ?>">
                                            <div class="form-group">
                                                <label>Add new Curriculum Title<span class="text-danger">*</span></label>
                                                <input type="text" placeholder="Introduction" name="title" class="form-control" required>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-modal-box">
            <div class="modal-box">
                <div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">COURSE IMAGE</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo '../files/' . $row['image'] ?>" class="w-100">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="footer-btn bg-dark-low" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="datatable/DataTables-1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/datepicker.min.js"></script>
        <script src="js/fullcalendar.min.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/main.js"></script>

</body>

</html>