

<?php 

require_once __DIR__.'/header.php';
require_once __DIR__.'/sql_functions.php';

?>


<style type="text/css">


a.btn-success, a.btn-primary, a.btn-warning, a.btn-danger {
  color: #fff!important;
}

</style>


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Import Books</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <!-- <h2>Edit Members</h2> -->
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>

              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br>
            <form id="editBook-form" action="import_action.php" enctype="multipart/form-data" method="POST">


             <input type="hidden" name="book_id" value="<?php echo $_GET['id']?>">

             <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="bookname">Book Title<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="bookname" name="bookname" required="required"  class="form-control ">
              </div>
            </div>
            <div class="item form-group">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="bookauthor">Book Author(s) <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 ">
                <input type="text" id="bookauthor" name="bookauthor"   required="required" class="form-control">
              </div>
            </div>
            <div class="item form-group">
              <label for="isbn" class="col-form-label col-md-3 col-sm-3 label-align">ISBN</label>
              <div class="col-md-6 col-sm-6 ">
                <input id="isbn" name="isbn"   class="form-control" type="text" >
              </div>
            </div>

            <div class="item form-group">
              <label for="bookpublisher" class="col-form-label col-md-3 col-sm-3 label-align">Book publisher</label>
              <div class="col-md-6 col-sm-6 ">
                <input id="bookpublisher"   name="bookpublisher" class="form-control" type="text" >
              </div>
            </div>

            <div class="item form-group">
              <label for="bookpages" class="col-form-label col-md-3 col-sm-3 label-align">Book Pages</label>
              <div class="col-md-6 col-sm-6 ">
                <input id="bookpages"   name="bookpages" class="form-control" type="text" >
              </div>
            </div>


            <div class="ln_solid"></div>
            <div class="item form-group">
              <div class="col-md-6 col-sm-6 offset-md-3">
                <a href="issue_book.php"class="btn btn-primary" type="button">Cancel</a>

                <button type="submit" class="btn btn-success">Import Book</button>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>

  </div>




</div>
</div>





<?php require_once __DIR__.'/footer.php';?>

