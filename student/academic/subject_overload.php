<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Office - Subject Overload</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <!-- Loading page -->
    <!-- The container is placed here in order to display the loading indicator first while the page is loading. -->
    <div id="loader" class="center">
        <div class="loading-spinner"></div>
        <p class="loading-text display-3 pt-3">Getting things ready...</p>
    </div>
    <link rel="stylesheet" href="academic.css">
    <script src="https://kit.fontawesome.com/fe96d845ef.js" crossorigin="anonymous"></script>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body onload="openModal()">
<div class="wrapper">
    <?php
        $office_name = "Academic Office";
        include('../navbar.php');
        include('uploadmodal.php');
        include('editmodal-so.php');
        include '../../breadcrumb.php';
        //include('generate_pdf.php')
    ?>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div id="modalContent" class="modal-content">
            <img src="/assets/exclamation.png" class="exclamationpic">
            <br/><h2>Are you a student in good standing?</h2>
            <p>(no failing grade in previous semester)</p>
            <div class="modal-radio-group">
                <input type="radio" name="option" value="option1" class="radio-option1">
                <label for="option1">Yes</label>
                <input type="radio" name="option" value="option2" class="radio-option2">
                <label for="option2">No</label>
            </div>
            <br/><button type="button" class="btn btn-primary" id="nextButton" onclick="questionModal()" disabled>Next</button>
            <!-- <span id="countdownText" class="countdown"></span> -->
        </div>
    </div>

    <!-- When answered No Modal-->
    <div id="redirectModal" class="modal">
        <div id="modalContent" class="modal-content">
            <a href="../academic.php" class="btn-close" aria-label="Close"></a>
            <img src="../../assets/exclamation.png" class="exclamationpic">
            <br/><h1>Subject overload is only allowed for academically outstanding students.</h1>
            <a href="../academic.php" class="btn btn-primary" id="nextButton">Home</a>
        </div>
    </div>

    <div class="container-fluid academicbanner header" style="height:250px">
        <?php
        $breadcrumbItems = [
            ['text' => 'Academic Office', 'url' => '/student/academic.php', 'active' => false],
            ['text' => 'Subject Overload', 'active' => true],
        ];

        echo generateBreadcrumb($breadcrumbItems, false);
        ?>
        <h1 class="display-1 header-text text-center text-light">Subject Overload</h1>
        <p class="header-text text-center text-light">Add additional subject/s more than the prescribed number of units</p>
    </div>

    <br/>

    <div class="container-fluid">
        <div class="row g-1">
            <div class="card col-md-3 p-0 m-1">
                <div class="card-header">
                    <h6>PUP Data Privacy Notice</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <p><small>PUP respects and values your rights as a data subject under the Data Privacy Act (DPA). PUP is committed to protecting the personal data you provide in accordance with the requirements under the DPA and its IRR. In this regard, PUP implements reasonable and appropriate security measures to maintain the confidentiality, integrity and availability of your personal data. For more detailed Privacy Statement, you may visit <a href="https://www.pup.edu.ph/privacy/" target="_blank">https://www.pup.edu.ph/privacy/</a></small></p>
                    <div class="d-flex flex-column">
                        <button class="btn btn-outline-primary mb-2" onclick="location.reload()">
                            <i class="fa-solid fa-arrows-rotate"></i> Reset Form 
                        </button>
                        <button class="btn btn-outline-primary mb-2">
                            <i class="fa-solid fa-circle-question"></i> Help
                        </button>
                    </div>
                </div>
            </div>

            <div class="card col-md p-0 m-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            Requirements
                        </div>
                        <div class="col-sm-2">
                            Status
                        </div>
                        <div class="col-sm-2">
                            Attachment
                        </div>
                        <div class="col-sm-2">
                            Action
                        </div>
                    </div>
                </div>
                <div class="card-body">
				
                    <div class="row">
                        <div class="col-sm-6">
							<div class="request-letter">Request Letter for Overload</div>
							<div class="subtext">(<span class="justification">Letter that contains justification of the need for overload</span>)</div>
						</div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary"><i class="fa-solid fa-circle-question"></i> Missing</button>
                        </div>
                        <div class="col-sm-2">
                            <form action="generatepdf_so.php" method="post" target="_blank">
                                <input type="submit" class="btn btn-primary" value="View Attachment">
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal"><i class="fa-solid fa-paperclip"></i> Upload</button> 
                        </div>
                    </div>
					
                    <div class="row">
                        <div class="col-sm-6">
						<div class="request-letter">ACE FORM</div>
						<div class="subtext">(<span class="justification">Adding of Subject/s</span>)</div>
                            
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i> Under Verification</button>
                        </div>
                        <div class="col-sm-2">
                            <form action="generatepdf_so.php" method="post" target="_blank">
                                <input type="submit" class="btn btn-primary" value="View Attachment">
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="fa-solid fa-pen-to-square"></i> Edit</button> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
						<div class="request-letter">Certificate of Registration</div>
						<div class="subtext">(<span class="justification">Current semester</span>)</div>
                       
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-success"><i class="fa-solid fa-circle-check"></i> Verified</button>
                        </div>
                        <div class="col-sm-2">
                            <form action="generatepdf_so.php" method="post" target="_blank">
                                <input type="submit" class="btn btn-primary" value="View Attachment">
                            </form>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal"><i class="fa-solid fa-paperclip"></i> Upload</button> 
                        </div>
                    </div>
                </div>

                <div class="d-flex w-100 justify-content-between p-1">
                    <button class="btn btn-primary px-4" onclick="window.history.go(-1); return false;">
                        <i class="fa-solid fa-arrow-left"></i> Back
                    </button>
                    <input id="submitBtn" value="Submit "type="button" class="btn btn-primary w-25" data-bs-toggle="modal" data-bs-target="#confirmModal" />
                </div>

                <!-- confirmModal -->
                <div class="modal fade modal-dark" id="confirmModal" tabindex="-1" aria-labelledby="confirmSubmitModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmSubmitModalLabel">Confirm Form Submission</h5>
                                <button type="button" class="btn-close upload" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5><center>Are you sure you want to submit these requirements?</center></h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                <div class="modal-body">
                    Application successfully submitted!
                </div>
                <div class="modal-footer">
                <a href="../survey.php" class="btn btn-primary">Okay</a>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="push"></div>
    </div>
    <?php include '../../footer.php'; ?>
    <script src="../../loading.js"></script>
    <script src="modal.js"></script>
    <script src="upload.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
    <script>
        // Disable submit button initially
        document.getElementById("submitBtn").disabled = true;

        // Function to enable submit button if upload and edit buttons are clicked
        function enableSubmitButton() {
            var uploadButtonClicked = document.getElementById("uploadModal").getAttribute("data-clicked");
            var editButtonClicked = document.getElementById("editModal").getAttribute("data-clicked");

            if (uploadButtonClicked === "true" && editButtonClicked === "true") {
                document.getElementById("submitBtn").disabled = false;
            } else {
                document.getElementById("submitBtn").disabled = true;
            }
        }

        // Event listener for upload button click
        document.getElementById("uploadModal").addEventListener("click", function() {
            this.setAttribute("data-clicked", "true");
            enableSubmitButton();
        });

        // Event listener for edit button click
        document.getElementById("editModal").addEventListener("click", function() {
            this.setAttribute("data-clicked", "true");
            enableSubmitButton();
        });
    </script>
    <script src="../../saved_settings.js"></script>
</body>
</html>