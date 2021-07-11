

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
        <h3>Manage Books</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <!-- <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div> -->
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
          <h2>Add Books</h2>
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

        <a class="btn btn-success" data-toggle="modal" data-target="#addBook"  style="margin:15px; float: right;"> Add New Book  </a>




        <table id="dt-manage-am1" class="table table-responsive table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sl.no</th>
              <th>Book Name</th>
              <th>Author</th>
              <th>ISBN</th>
              <th>Publisher</th>
              <th>Book pages</th>
              <th>Stock</th>
              <th>View/Edit</th>
            </tr>
          </thead>
          <tbody>
          <?php  
          $books=extractAll('*','books');
          foreach ($books as $key => $value) {
      echo '
            <tr>
              <td>'.$value['id'].'</td>
              <td>'.$value['book_name'].'</td>
              <td>'.$value['book_author'].'</td>
              <td>'.$value['isbn'].'</td>
              <td>'.$value['book_publisher'].'</td>
              <td>'.$value['book_pages'].'</td>
              <td>'.$value['book_stock'].'</td>
              <td><a href="edit_book.php?id='.$value['book_id'].'">View/Edit</a></td></td>

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


<!-- Add Book modal -->


<div class="modal fade bs-example-modal-md" id="addBook" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form action="add_book.php" id="addBook-form" enctype="multipart/form-data" method="POST">
      <div class="modal-header">

        <h4 class="modal-title" id="myModalLabel">Add Book</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
         
       <div class="form-group">
        <label for="name">Book Title</label>
        <input type="text" class="form-control" name="bookname" id="bookname" placeholder="Enter Book Name"  title="Please enter  Book Name  "/>
      </div>

      <div class="form-group">
        <label for="name">Book Authors</label>
        <input type="text" class="form-control" name="bookauthor" id="bookauthor" placeholder="Enter Book Author"  title="Please enter  Book Author  "/>
      </div>

       

      <div class="form-group">
        <label for="name">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter isbn"  title="Please enter isbn"/>
      </div>


      <div class="form-group">
        <label for="name">Book Publisher</label>
        <input type="text" class="form-control" name="bookpublisher" id="bookpublisher" placeholder="Enter Book Publisher"  title="Please enter  Book Publisher "/>
      </div>

      <div class="form-group">
        <label for="name">Book Pages</label>
        <input type="text" class="form-control" name="bookpages" id="bookpages" placeholder="Enter Book Pages"  title="Please enter  Book Pages "/>
      </div>

      <div class="form-group">
        <label for="name">Book Stock</label>
        <input type="number" class="form-control" name="bookstock" id="bookstock" placeholder="Enter Book Stock"  title="Please enter  Book Stock "/>
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addBook-btn" class="btn btn-primary submit">Save changes</button>

      </div>

      </form>
    </div>
  </div>
</div>



<!-- Add Book modal End -->







<?php require_once __DIR__.'/footer.php';?>

