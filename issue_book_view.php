

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

$member=extractRecord('*','member_id',$_GET['id'],'membership');

// print_r($member);

?>


<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Book issue</h3>
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
            <form id="editBook-form" action="book_issue_action.php" enctype="multipart/form-data" method="POST">

              <input type="hidden" name="member_id" value="<?php echo $_GET['id']?>">

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

            

              <?php 

              $books=extractAll('*','books','WHERE book_stock > 0 ');

             // print_r($books);

              ?>

              <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 label-align">Select Book To issue</label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="selected">
                    <option value="">Choose option</option>
                    <?php  
                    if($books!='NO_DATA')
                    {
                      foreach ($books as $key => $val) {
                            // code...


                        echo '
                        <option value="'.$val['book_id'].'">'.$val['book_name'].'</option>
                        ';

                      }
                    }
                    ?>

                  </select>
                </div>
              </div>


              <div class="item form-group">
                <label for="rent" class="col-form-label col-md-3 col-sm-3 label-align">Rent</label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="rent" name="rent" class="form-control" type="number" >
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <a href="issue_book.php"class="btn btn-primary" type="button">Cancel</a>

                  <button type="submit" class="btn btn-success">Issue Book</button>
                </div>
              </div>

            </form>
          </div>

        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
          <h2>issued Books</h2>
           <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
  
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
        </p>

       <!--  <a class="btn btn-success" data-toggle="modal" data-target="#addBook"  style="margin:15px; float: right;"> Add New Book  </a> -->




        <table id="dt-manage-am1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sl.no</th>
              <th>Book Name</th>
              <th>Author</th>
              <th>ISBN</th>
              <th>Publisher</th>
              <th>Book pages</th>
              <!-- <th>Stock</th> -->
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
          <?php  

          $books=joinTables('*','books','issue_book','RIGHT','books.book_id','issue_book.book_id','AND issue_book.member_id="'.$_GET['id'].'" AND status = 1 ');

           

          // print_r($books[1]);

          

          foreach ($books[1] as $key => $value) {

            if($value['book_name']=='')
              continue;
        echo '
            <tr>
              <td>'.$value['id'].'</td>
              <td>'.$value['book_name'].'</td>
              <td>'.$value['book_author'].'</td>
              <td>'.$value['isbn'].'</td>
              <td>'.$value['book_publisher'].'</td>
              <td>'.$value['book_pages'].'</td>
               <td><a href="return_book_view.php?id='.$value['issue_id'].' ">Return Book</a></td></td>

            </tr>
            
          ';
        }
      

          ?>
          </tbody>
        </table>  
      </div>




    </div>
  </div>
</div>



  </div>
</div>





<?php require_once __DIR__.'/footer.php';?>

