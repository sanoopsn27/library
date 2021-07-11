

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
        <h3>Manage Book Issues</h3>
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

       <!--  <a class="btn btn-success" data-toggle="modal" data-target="#addMember"  style="margin:15px; float: right;"> Add New Member  </a> -->




        <table id="dt-manage-am1" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Sl.no</th>
              <th>Member Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Debt</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
          <?php  
          $members=extractAll('*','membership');
          if($members!='NO-DATA')
          {
          foreach ($members as $key => $value) {
      echo '
            <tr>
              <td>'.$value['id'].'</td>
              <td>'.$value['member_name'].'</td>
              <td>'.$value['email'].'</td>
              <td>'.$value['phone_number'].'</td>
              <td>'.$value['debt'].'</td>
              <td><a href="issue_book_view.php?id='.$value['member_id'].'">Issue a Book</a></td></td>

            </tr>
            
          ';
        }
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


<!-- Add Member modal -->


<div class="modal fade bs-example-modal-md" id="addMember" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <form action="add_member.php" id="addMember-form" enctype="multipart/form-data" method="POST">
      <div class="modal-header">

        <h4 class="modal-title" id="myModalLabel">Add Members</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
         
       <div class="form-group">
        <label for="name">Member Name</label>
        <input type="text" class="form-control" name="membername" id="membername" placeholder="Enter Member Name"  title="Please enter  Member Name  "/>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"  title="Please enter Email Id  "/>
      </div>

       

      <div class="form-group">
        <label for="name">Phone number</label>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone Number"  title="Phone Number"/>
      </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addMember-btn" class="btn btn-primary submit">Save changes</button>

      </div>

      </form>
    </div>
  </div>
</div>



<!-- Add Member modal End -->







<?php require_once __DIR__.'/footer.php';?>

<script type="text/javascript">
  
$(document).ready(function() {
 $('#dt-manage-am1').DataTable();
});

</script>