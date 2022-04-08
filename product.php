<?php
include('model/categoryModel.php');include('model/typeModel.php');
//Category data
$category = new category();
$categories = $category->categoryFunction();
//type Data
$type = new Type();
$types = $type->typeFunction();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport"  http-equiv="Content-Type" content="width=device-width, initial-scale=1">
  <title>MIS COFFEE</title>

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <h1 class="text text-center text-success">PRODUCT</h1>
        <button class="btn btn-success" onclick="openAddModal()"><i class="bi bi-plus-square-fill"></i>Add Product</button>

        <select id="selectCategory" class="form-inline w-25">
          <option disabled selected="true">Select Category</option>
          <option value="All">All</option>

          <?php foreach($categories as $category){?>
            <option value="<?php echo $category['category_name'];?>"><?php echo $category['category_name'];?></option>
          <?php }?>

        </select>
        <select id="selectType" class="form-inline w-25">
          <option disabled selected="true">Select Type</option>
          <option value="All">All</option>
          <?php foreach($types as $type){?>
            <option value="<?php echo $type['type_name'];?>"><?php echo $type['type_name'];?></option>
          <?php }?>
        </select>

        <!-- DATA TABLE -->
        <div id="productFetch"></div>
        <!-- END DATA TABLE -->

        <?php include('modals/product_modals.php'); ?>
       

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
 jQuery('#productFetch').load('productFetch.php', 'f' + (Math.random()*100000));

</script>

<script>

var addModal = document.getElementById("AddModal");
function openAddModal()
{
  addModal.style.display = "block";
}

$(document).on("click", "#addProduct", function() { 

  $.ajax({
      url: "productCheck.php",
      type: "POST",
      cache: false,
      data:{
          productName: $('#addProductName').val(),
      },
      success: function(productCheckData){
          if(productCheckData == 1)
          {
            warningfunction('Product is already exist!');   
          }
          else{
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success m-1 ',
                cancelButton: 'btn btn-danger '
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "you want to add this data?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel   ',
            reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                // $.ajax({
                //     url: "candidateAdd.php",
                //     type: "POST",
                //     cache: false,
                //     data:{
                //         name: $('#addName').val(),
                //         position : $('#addPosition').val(),
                //         type: $('#addType').val(),
                //     },
                //     success: function(data){
                //         if(data == 1)
                //         {
                //             success('Data Added successfully!');
                //             addModal.style.display = "none";
                //             jQuery('#candidateData').load('candidateData.php', 'f' + (Math.random()*100000));  
                            
                //         }
                //         else{
                //             errorfunction('Data Adding Failed!');
                //         }
                //     }
                // });
            }   
              else if (result.dismiss === Swal.DismissReason.cancel){}
              })        
          }
      }
  });
    

            
       
        	
});


var updateModal = document.getElementById("updateModal");
function openUpdateModal(id,name,price,stocks,category,type)
{
  updateModal.style.display = "block";
  document.getElementById("updateProductId").value=id;
  document.getElementById("updateProductName").value=name;
  document.getElementById("updateProductPrice").value=price;
  document.getElementById("updateProductStocks").value=stocks;
  document.getElementById("updateProductCategory").value=category;
  document.getElementById("updateProductType").value=type;

}


// When the user clicks button close
function closebtn() 
{
    addModal.style.display = "none";
    updateModal.style.display = "none";
    
}  
</script>

</body>
</html>
