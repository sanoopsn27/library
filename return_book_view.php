

<?php 

require_once __DIR__.'/header.php';
require_once __DIR__.'/sql_functions.php';

?>


<style type="text/css">


a.btn-success, a.btn-primary, a.btn-warning, a.btn-danger {
  color: #fff!important;
}

</style>
 

<?php



$mem_id= extract_cell('member_id','issue_id',$_GET['id'],'issue_book');
$bk_id= extract_cell('book_id','issue_id',$_GET['id'],'issue_book');

$rent=extract_cell('book_rent','issue_id',$_GET['id'],'issue_book');

$member=extractRecord('*','member_id',$mem_id,'membership');

// print_r($member);

?>

<?php 

  $books=extractAll('*','books','WHERE book_id = "'.$bk_id.'"');

  // print_r($books);

?>


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Book Returns</h3>
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
            <form id="editBook-form" action="book_return_action.php" enctype="multipart/form-data" method="POST">

              <input type="hidden" name="issue_id" value="<?php echo $_GET['id']?>">

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="membername">Member name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" id="membername" name="membername" required="required" value="<?php echo $member[0]['member_name']?>" class="form-control ">
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email id<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="email" id="email" name="email" value="<?php echo $member[0]['email']?>" required="required" class="form-control">
                </div>
              </div>
              <div class="item form-group">
                <label for="phone" class="col-form-label col-md-3 col-sm-3 label-align">phone</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="phone" name="phone" value="<?php echo $member[0]['phone_number']?>" class="form-control" type="text" >
                </div>
              </div>

               <div class="item form-group">
                <label for="rent" class="col-form-label col-md-3 col-sm-3 label-align">Rent</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="rent" name="rent" value="<?php echo $rent;?>" class="form-control" type="number" >
                </div>
              </div>

            

              

              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <a href="issue_book_view.php?id=<?php echo $member[0]['member_id']?>"class="btn btn-primary" type="button">Cancel</a>

                  <button type="submit" class="btn btn-success">Return Book</button>
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

