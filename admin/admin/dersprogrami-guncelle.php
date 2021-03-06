<?php
// bağlan phpde session dursun headerin içinde bişe olmasın her yere bağlan phpyi eklersin

include '../../baglan.php';


if (isset($_SESSION['k_ad']))
{    
  $kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE k_ad=:email");
  $kullanicisor->execute(array('email'=>$_SESSION['k_ad']));
  $say=$kullanicisor->rowCount();
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
  $kul_id = $kullanicicek['k_id'];
  $dersprogramisor=$db->prepare("SELECT * FROM ders where k_id=:kul_id ");
  $dersprogramisor->execute(array('kul_id'=>$kul_id ));
  $dersprogramicek=$dersprogramisor->fetchAll(PDO::FETCH_OBJ);
}


if (isset($_GET['ders_id']) and ($_GET['dersguncelle']=="ok") )
{
                
                  
$derssor=$db->prepare("SELECT * FROM ders WHERE ders_id=:d_id ");
$derssor->execute(array(
'd_id'=>($_GET['ders_id'])
));

$dersprogramicek=$derssor->fetch(PDO::FETCH_ASSOC);
}


include 'header.php';

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <form action="../../islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
            <div class="form-group">

              <div style="display: none;" class="col-md-6 col-sm-6 col-xs-12">
                <input   type="text" id="first-name" name="ders_id" 
                value="<?php echo $dersprogramicek['ders_id'] ?> " required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ders Programı <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="img"
                value="<?php echo $dersprogramicek['img'] ?> " required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="center" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

               <button type="submit"  name="dersprogrami-guncelle" class="btn btn-success">Güncelle </button>
             </div>
           </div>

         </form>

      </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>


</html>