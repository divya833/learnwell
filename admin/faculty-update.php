<?php
include('include/auth.php');
include('include/dbConnect.php');
include('include/helper.php');
$title = 'UPDATE FACULTY';
$token = $_GET['token'];
$qry = $db->prepare("SELECT * FROM faculties WHERE token = '$token'");
$qry->execute();
$row = $qry->fetch();
$qry2 = $db->prepare("SELECT * FROM users WHERE token = '$token'");
$qry2->execute();
$row2 = $qry2->fetch();
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
                                <form class="new-added-form" action="actions/faculty-update.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="token" value="<?php echo $token ?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Name<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="" name="name" class="form-control" value="<?php echo $row['name'] ?>" required>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Designation<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="" name="designation" class="form-control" value="<?php echo $row['designation'] ?>" required>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Bio<span class="text-danger">*</span></label>
                                            <textarea class="textarea form-control" name="bio" id="form-message" rows="3" required><?php echo $row['bio'] ?></textarea>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Image<button type="button" class="btn btn-lg float-right btn-warning" class="modal-trigger" data-toggle="modal" data-target="#large-modal">View image</button></label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Email (username)<span class="text-danger">*</span></label>
                                            <input type="email" placeholder="" name="email" class="form-control" value="<?php echo $row2['email'] ?>" required>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <input type="text" placeholder="" name="password" value="<?php echo genPassword(); ?>" class="form-control" value="<?php echo $row2['password'] ?>" required>
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
                                    <div class="item-title w-100">
                                        <h3 class="mt-3">Assign course to <?php echo $row['name'] ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <form class="new-added-form" action="actions/faculty-course.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="faculty" value="<?php echo $token ?>">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                            <label>Course<span class="text-danger">*</span></label>
                                            <select class="select2" required name="token" required>
                                                <option value="">Choose</option>
                                                <?php
                                                $qry2 = $db->prepare("SELECT * FROM courses WHERE faculty != '$token' OR faculty  IS NULL");
                                                $qry2->execute();
                                                for ($i2 = 0; $rows2 = $qry2->fetch(); $i2++) {
                                                ?>
                                                    <option value="<?php echo $rows2['token']; ?>"><?php echo ucwords($rows2['category']) ?> - <?php echo ucfirst($rows2['title']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                <option>Assign</option>
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark mt-2" name="submit">ASSIGN</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="heading-layout1">
                                    <div class="item-title w-100">
                                        <h3 class="mt-3">Course Assigned</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Language</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $qry = $db->prepare("SELECT * FROM courses WHERE faculty = '$token'");
                                            $qry->execute();
                                            for ($i = 0; $rows = $qry->fetch(); $i++) {
                                            ?>
                                                <tr>
                                                    <td><?php echo ucwords($rows['category']) ?></td>
                                                    <td><?php echo ucfirst($rows['title']) ?></td>
                                                    <td><?php echo ucfirst($rows['language']) ?></td>
                                                    <td><?php echo "INR " . number_format($rows['price'], 2) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($rows['status'] == 1) {
                                                            echo '<span class="btn btn-success btn-lg">PUBLISHED</span>';
                                                        } else {
                                                            echo '<span class="btn btn-danger btn-lg">NOT PUBLSIHED</span>';
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="course-update.php?token=<?php echo $rows['token']; ?>" class="btn btn-success btn-lg">MANAGE</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Language</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body bg-dark-high">
                                <img src="<?php echo '../files/' . $row['photo'] ?>" class="w-100">
                                <h5 class="modal-title text-center text-white mt-3 mb-0"><?php echo strtoupper($row['name']) ?></h5>
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