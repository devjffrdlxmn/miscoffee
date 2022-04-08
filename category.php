<?php
//model
//include_once("function_include/model.php");
//caller
//$caller=new model()

//if(!isset($_SESSION["set_id"])){ header("location:index.php"); }

;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"  http-equiv="Content-Type" content="width=device-width, initial-scale=1">
  <title>CvSU-CCAT</title>

  <!--tab icon-->
  <link rel="icon" href="dist/img/AdminLTELogo.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  
   <!-- MY CSS -->
   <link rel="stylesheet" href="dist/css/style.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include("include/loader.php"); ?>

  <!-- Navbar -->
  <?php include("include/navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("include/sidebar.php"); ?>

  <?php include("modals/category_modal.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <h1 class="text-success text-center">Category Page</h1>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <button class="btn btn-success mb-2" onclick="openAddModal()" >ADD DATA</button>
        <div id="categoryDiv"></div>

      </div>
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <?php include("include/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/sweetalert/sweetalert_library.js"></script>
<script src="dist/sweetalert/sweet_alert.js"></script>
<link rel="stylesheet" href="dist/sweetalert/sweetalert_css.css">

<script>
  //loading sweetalert
  //loading();
    //fetching DATA
    jQuery('#categoryDiv').load('category_data.php', 'f' + (Math.random()*100000));
    
</script>

<script>
    var addModal = document.getElementById("AddModal");
    var updateModal = document.getElementById("UpdateModal");

    function openAddModal(){
        
        addModal.style.display = "block";
    }
    function openUpdateModal(id,name,price,stock){
      updateModal.style.display = "block";
      _("updateid").value=id;
      _("updatename").value=name;
      _("pricename").value=price;
      _("stockname").value=stock;
    }
    // When the user clicks button close
    function closebtn(){
        addModal.style.display = "none";
        updateModal.style.display = "none";
    }
</script>

<script>
function _(el){
	return document.getElementById(el);
}

//START OF SAVING category// 
var ajaxau = new XMLHttpRequest();
function addcategory(){
	//getting values of inputs
	var name = _("name").value;

  if(name==""){
    //sweetalert function
	  warningfunction("Enter details!");
    return false;
  }

	//send value to server
	var formdata = new FormData();
	formdata.append("name", name);
	
	ajaxau.upload.addEventListener("progress", progressHandlerau, false);
	ajaxau.addEventListener("load", completeHandlerau, false);
	ajaxau.addEventListener("error", errorHandlerau, false);
	ajaxau.addEventListener("abort", abortHandlerau, false);
	ajaxau.open("POST", "category_save.php");
	ajaxau.send(formdata);
}

function progressHandlerau(event){

}
function completeHandlerau(event){
  var status=event.target.responseText;

  if(status==1){
    //loading();
    success("Successfully add data!");
    jQuery('#categoryDiv').load('category_data.php', 'f' + (Math.random()*100000));
    closebtn();
  }
  else if(status==0){
    //sweetalert function
	  errorfunction("Error in saving data!");
    closebtn();
  }
  else if(status==2){
    //sweetalert function
	  warningfunction("Existing product!");
    closebtn();
  }

}
function errorHandlerau(event){
	//sweetalert function
	errorfunction("No Internet Connection!");
}
function abortHandlerau(event){
//alert("Cannot proccess your request!\nPoor Internet Connection!");
}
//END OF SAVING category// 


//START OF UPDATE category// 
var ajaxup = new XMLHttpRequest();
function updatecategory(){

	//getting values of inputs
  var updateid = _("updateid").value;
	var updatename = _("updatename").value;

  if(updatename==""){
    //sweetalert function
	  warningfunction("Enter details!");
    return false;
  }

	//send value to server
	var formdata = new FormData();
  formdata.append("id", updateid);
	formdata.append("name", updatename);
	ajaxup.upload.addEventListener("progress", progressHandlerup, false);
	ajaxup.addEventListener("load", completeHandlerup, false);
	ajaxup.addEventListener("error", errorHandlerup, false);
	ajaxup.addEventListener("abort", abortHandlerup, false);
	ajaxup.open("POST", "category_update.php");
	ajaxup.send(formdata);
}

function progressHandlerup(event){

}
function completeHandlerup(event){
  var status=event.target.responseText;

  if(status==1){
    //loading();
    success("Successfully update data!");
    jQuery('#categoryDiv').load('category_data.php', 'f' + (Math.random()*100000));
    closebtn();
  }
  else if(status==0){
    //sweetalert function
	  errorfunction("Error in saving data!");
    closebtn();
  }
  else if(status==2){
    //sweetalert function
	  warningfunction("Existing product!");
    closebtn();
  }

}
function errorHandlerup(event){
	//sweetalert function
	errorfunction("No Internet Connection!");
}
function abortHandlerup(event){
//alert("Cannot proccess your request!\nPoor Internet Connection!");
}
//END OF UPDATE category// 


//START OF DELETE category// 
var ajax = new XMLHttpRequest();
function deletecategory(del_id){
	//getting values of inputs

	//send value to server
	var formdata = new FormData();
	formdata.append("id", del_id);

	
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "category_delete.php");
	ajax.send(formdata);
}

function progressHandler(event){

}
function completeHandler(event){
  var status=event.target.responseText;

  if(status==1){
    //loading();
    success("Successfully delete data!");
    jQuery('#categoryDiv').load('category_data.php', 'f' + (Math.random()*100000));
    
  }
  else if(status==0){
    //sweetalert function
	  errorfunction("Error in saving data!");
  }

}
function errorHandler(event){
	//sweetalert function
	errorfunction("No Internet Connection!");
}
function abortHandler(event){
//alert("Cannot proccess your request!\nPoor Internet Connection!");
}
//END OF DELETE category// 

</script>

</html>