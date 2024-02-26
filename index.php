<?php
error_reporting(0);
include 'config.php';

$status = 0;

if(isset($_POST['login'])){
    $email    = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM m_user WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch();
        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['level_id'] = $row['level_id'];
            $_SESSION['status_aktif'] = $row['status_aktif'];
            header("Location: view/admin/");
            exit;
        } else {
            $status = 1;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

<?php
include 'head.php';
?>

<body class="bg-login">
<!-- wrapper -->
<div class="wrapper">
    <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card radius-15 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-xl-6">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <img src="assets/images/logo-icon.png" width="80" alt="">
                                    <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                </div>
                                <div class="mt-xl-5">
                                    <?php if($status == 1){ ?>
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">Incorrect username or password!</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php } ?>
                                    <div class="form-body mt-xl-5">
                                        <form class="row g-3" action="" method="POST">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="Email Address">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary" name="login"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <p>Don't have an account yet? <a href="register.php">Sign up here</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                            <img src="assets/images/login-images/login-frent-img.jpg" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
</body>

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>

</html>