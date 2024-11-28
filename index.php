<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Authentication Demo Application</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link rel="icon" href="./includes/img/psa-logo.png" type="image/x-icon">
        <link href="./includes/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="./includes/css/sb-admin-2.min.css" rel="stylesheet">
        <script src="./includes/jquery/jquery.min.js"></script>
        <script src="./includes/js/index.js"></script>
        <script src="./includes/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body id="page-top">
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                Authentication Demo UI Application (PHP)
                            </div>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Authentication Type</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-type-fp">
                                            <label class="form-check-label" for="auth-type-fp">
                                            Fingerprint
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-type-iris">
                                            <label class="form-check-label" for="auth-type-iris">
                                            Iris
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-type-face">
                                            <label class="form-check-label" for="auth-type-face">
                                            Face
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-type-otp">
                                            <label class="form-check-label" for="auth-type-otp">
                                            OTP
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-type-demo">
                                            <label class="form-check-label" for="auth-type-demo">
                                            Demographic
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-type-ekyc">
                                            <label class="form-check-label" for="auth-type-ekyc">
                                            eKYC
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">PhilSys ID Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="individual-id" class="form-label">Individual ID</label>
                                            <input type="text" class="form-control" id="individual-id" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="individual-id-type" class="form-label">Individual ID Type</label>
                                            <select class="form-control" id="individual-id-type">
                                                <option value="" selected>--- Select One ---</option>
                                                <option value="PCN">PCN</option>
                                                <option value="AlyasPSN">Alyas PSN</option>
                                                <option value="UIN">UIN</option>
                                                <option value="VID">VID</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow mb-4" id="biometric-authentication-form">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Biometric Authentication</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="fingers-count" class="form-label">Fingers Count</label>
                                            <select class="form-control" id="fingers-count">
                                                <option value="" selected>--- Select One ---</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="iris-type" class="form-label">Iris Type</label>
                                            <select class="form-control" id="iris-type">
                                                <option selected>--- Select One ---</option>
                                                <option value="left">Left Iris</option>
                                                <option value="right">Right Iris</option>
                                                <option value="both">Both Iris</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary" id="biometric-capture">Capture</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card shadow mb-4" id="otp-authentication-form">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">OTP Authentication</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <p><button class="btn btn-primary" id="otp-request">Request OTP</button></p>
                                            </div>
                                                <div class="form-check form-check-inline">
                                                    <p>OTP Channel:</p>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value="" id="otp-email">
                                                    <label class="form-check-label" for="otp-email">
                                                        Email
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" value="" id="otp-phone">
                                                    <label class="form-check-label" for="otp-phone">
                                                        Mobile
                                                    </label>
                                                </div>
                                            <div class="form-group">
                                                <label for="otp-value">Enter OTP</label>
                                                <input type="text" class="form-control" id="otp-value" placeholder="OTP Value" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card shadow mb-4" id="demographic-authentication-form">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <span>
                                            <h6 class="m-0 font-weight-bold text-primary">
                                                Demographic authentication
                                                <div class="pull-left">
                                                </div>
                                            </h6>
                                        </span>
                                        <span>
                                            <button type="button" class="btn btn-primary" id="btn-model-demog-inputs">Demographic Inputs</button>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12" id="demog-result-1">
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12" id="demog-result-2">
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12" id="demog-result-3">
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12" id="demog-result-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <button class="btn btn-success" id="send-auth-request">Send Request</button>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-result" tabindex="-1" aria-labelledby="modal-result-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-result-label">API Result</h5>
                                    </div>
                                    <div class="modal-body">
                                        <pre id="modal-result-value">This is the content of the modal.</pre>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="model-demog-inputs" tabindex="-1" aria-labelledby="model-demog-inputs-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="model-demog-inputs-label">Demographic Inputs</h5>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center align-items-center" style="max-height: 400px; overflow-y: auto;">
                                        <div class="col-md-5">
                                            <ul class="list-group">
                                                <li class="list-group-item" id="category_page1">Page 1 (Personnal Details)</li>
                                                <li class="list-group-item" id="category_page2">Page 2 (Secondary Details)</li>
                                                <li class="list-group-item" id="category_page3">Page 3 (Present Address)</li>
                                                <li class="list-group-item" id="category_page4">Page 4 (Permanent Address)</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-7">
                                            <div id="modal-demog-input-category-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_firstName">
                                                    <label class="form-check-label" for="chkbox_demog_firstName">First Name</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_lastName">
                                                    <label class="form-check-label" for="chkbox_demog_lastName">Last name</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_middleName">
                                                    <label class="form-check-label" for="chkbox_demog_middleName">Middle Name</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_name">
                                                    <label class="form-check-label" for="chkbox_demog_name">Full Name</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_gender">
                                                    <label class="form-check-label" for="chkbox_demog_gender">Gender</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_emailId">
                                                    <label class="form-check-label" for="chkbox_demog_emailId">Email Address</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_phoneNumber">
                                                    <label class="form-check-label" for="chkbox_demog_phoneNumber">Mobile Number</label>
                                                </div>
                                            </div>
                                            <div id="modal-demog-input-category-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_age">
                                                    <label class="form-check-label" for="chkbox_demog_age">Age</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_bloodType">
                                                    <label class="form-check-label" for="chkbox_demog_bloodType">Blood Type</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_maritalStatus">
                                                    <label class="form-check-label" for="chkbox_demog_maritalStatus">Martial Status</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_dob">
                                                    <label class="form-check-label" for="chkbox_demog_dob">Date of Birth</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_postalCode">
                                                    <label class="form-check-label" for="chkbox_demog_postalCode">Postal Code</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_pobProvince">
                                                    <label class="form-check-label" for="chkbox_demog_pobProvince">Place of Birth (Province)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_pobCity">
                                                    <label class="form-check-label" for="chkbox_demog_pobCity">Place of Birth (City)</label>
                                                </div>
                                            </div>
                                            <div id="modal-demog-input-category-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_residenceStatus">
                                                    <label class="form-check-label" for="chkbox_demog_residenceStatus">Residence Status</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_presentCity">
                                                    <label class="form-check-label" for="chkbox_demog_presentCity">Present Address (City)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_presentBarangay">
                                                    <label class="form-check-label" for="chkbox_demog_presentBarangay">Present Address (Barangay)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_presentProvince">
                                                    <label class="form-check-label" for="chkbox_demog_presentProvince">Present Address (Province)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_presentAddress">
                                                    <label class="form-check-label" for="chkbox_demog_presentAddress">Present Address (House Number)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_presentAddressLine1">
                                                    <label class="form-check-label" for="chkbox_demog_presentAddressLine1">Present Address (House Number din ata?)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_fullAddress">
                                                    <label class="form-check-label" for="chkbox_demog_fullAddress">Present Address (Full Address)</label>
                                                </div>
                                            </div>
                                            <div id="modal-demog-input-category-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentProvince">
                                                    <label class="form-check-label" for="chkbox_demog_permanentProvince">Permanent Address (Province)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentAddress">
                                                    <label class="form-check-label" for="chkbox_demog_permanentAddress">Permament Address (Home Number)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentFullAddress">
                                                    <label class="form-check-label" for="chkbox_demog_permanentFullAddress">Permament Address (Full Address)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentCity">
                                                    <label class="form-check-label" for="chkbox_demog_permanentCity">Permanent Address (City)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentZipcode">
                                                    <label class="form-check-label" for="chkbox_demog_permanentZipcode">Permanent Address (Zip Code)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentBarangay">
                                                    <label class="form-check-label" for="chkbox_demog_permanentBarangay">Permanent Address (Barangay)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="chkbox_demog_permanentAddressLine1">
                                                    <label class="form-check-label" for="chkbox_demog_permanentAddressLine1">Permament Address (Home Number din ata?)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="model-demog-input-save">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; DCRPID Authentication Demo Application 2024</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="./includes/jquery/jquery.min.js"></script>
        <script src="./includes/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./includes/jquery-easing/jquery.easing.min.js"></script>
        <script src="./includes/js/sb-admin-2.min.js"></script>
    </body>
</html>
