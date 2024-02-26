<?php
include 'config.php';
// error_reporting(0);

if(isset($_POST['register'])){
    $nama    = $_POST['nama'];
    $hp = $_POST['hp'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    print_r($_POST);

    try{
        $sql = $conn->prepare("INSERT INTO m_user (nama, email, hp, password, status_aktif, level_id) VALUES (:nama, :email, :hp, :password, 1, 1)");
        $result = $sql->execute([":nama" => $nama, ":email" => $email, ":password" => password_hash($password, PASSWORD_BCRYPT), ":hp" => $hp]);
        if($result){
            header("Location: index.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>

<?php
include 'head.php';
?>

<body class="bg-register">
<!-- wrapper -->
<div class="wrapper">
    <div class="section-authentication-register d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card radius-15 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-xl-6">
                            <div class="card-body p-md-5">
                                <div class="text-center">
                                    <img src="assets/images/logo-icon.png" width="80" alt="">
                                    <h3 class="mt-4 font-weight-bold">Create an Account</h3>
                                </div>
                                <div class="">
                                    <div class="form-body mt-xl-5">
                                        <form class="row g-3" method="POST">
                                            <div class="col-12">
                                                <label for="inputFirstName" class="form-label">Full Name</label>
                                                <input type="text" class="form-control" id="inputFirstName" name="nama" placeholder="Nama">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputNomorHP" class="form-label">Nomor HP</label>
                                                <input type="text" class="form-control" id="inputNomorHP" name="hp" placeholder="08xxxxxxxxx">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="inputEmailAddress" name="email" placeholder="example@user.com">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms &amp; Conditions</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary" name="register"><i class="bx bx-user me-1"></i>Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                            <img src="assets/images/login-images/register-frent-img.jpg" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end wrapper -->
<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
</body>

</html>