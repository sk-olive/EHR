<?php
session_start();
// Set the timezone to Manila

include("../includes/connect.php");
if (!isset($_SESSION['connected'])) {
  header("location: ../logout.php");
}
date_default_timezone_set('Asia/Manila');


$userID = $_SESSION['userID'];

?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../src/cdn_tailwindcss.js"></script>

  <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

  <link rel="stylesheet" href="../fontawesome-free-6.2.0-web/css/all.min.css">
  <link rel="stylesheet" href="../node_modules/DataTables/datatables.min.css">
  <script src="../node_modules/flowbite/dist/datepicker.js"></script>

  <link rel="stylesheet" type="text/css" href="../node_modules/DataTables/Responsive-2.3.0/css/responsive.dataTables.min.css" />

</head>

<body class="bg-no-repeat bg-cover bg-[url('../src/Background.png')]">
  <?php require_once '../navbar.php'; ?>

  <div style=" background: linear-gradient(-45deg, #a6d0ff, rgba(255, 255, 255, 0.63), rgba(255, 255, 255, 0));" class=" m-auto ml-52 2xl:ml-80 flex  left-10 right-5  flex-col  px-2   pt-2 2xl:pt-6 pb-14 z-50 ">
    <div class="mb-5 grid grid-cols-1 sm:grid-cols-11 gap-4 w-full ">
      <div class="overflow-y-auto h-screen relative  sm:col-span-6 ">
        <?php require_once '../employeesData/employeesPersonalData.php'; ?>
        <?php require_once '../employeesData/pendingConsultation.php'; ?>
      </div>
      <div class="overflow-y-auto h-screen sm:col-span-5">
        <?php require_once '../employeesData/employeesPastMedicalHistory.php'; ?>
        <?php require_once '../employeesData/consultationTable.php'; ?>





      </div>



    </div>

  </div>

  <script src="../node_modules/jquery/dist/jquery.min.js"></script>

  <script type="text/javascript" src="../node_modules/DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="../node_modules/DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>


  <script type="text/javascript" src="index.js"></script>
  <script>
    $("#completedConsultationSide").addClass("text-white bg-gradient-to-r from-[#004AAD] to-[#5DE0E6]");
    $("#sidehistory").removeClass("bg-gray-200");
    $("#sideMyRequest").removeClass("bg-gray-200");
    $("#sidepms").removeClass("bg-gray-200");


    $("#sidehistory1").removeClass("bg-gray-200");
    $("#sideMyRequest1").removeClass("bg-gray-200");
    $("#sidepms1").removeClass("bg-gray-200");
    $(".consultationIcon").attr("fill", "#4d4d4d");
    $(".homeIcon").attr("fill", "#4d4d4d");
    $(".medcertIcon").attr("fill", "#FFFFFF");
    $(".proceedIcon").attr("fill", "#FFFFFF");

    $(document).ready(function() {
      // Attach change event handler to remarksSelect
      $("#remarksSelect2").change(function() {
        // Check if the selected option is the one you want
        if ($(this).val() === "For Medical Laboratory") {
          // Remove the "hidden" class from the input with id "medLab"
          $("#medLab").removeClass("hidden");
          $("#medDis").addClass("hidden");

        } else if ($(this).val() === "For Medication Dispense") {
          // If the option is not the desired one, you can add the "hidden" class
          $("#medDis").removeClass("hidden");
          $("#medLab").addClass("hidden");

        } else {
          $("#medLab").addClass("hidden");
          $("#medDis").addClass("hidden");

        }
      });
    });
  </script>
</body>

</html>