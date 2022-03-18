<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Training Calendar || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Training Calendar</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Training Calendar</li>
                        </ol>
                    </div>
                    
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Calendar">View Calendar Format</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Table">Table Format</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Training-add">Add Training Format</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Calendar">
                        <div class="container-fluid">
                            <div id="calendar"></div> 
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Table">
                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Comments and further actions</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($training){ foreach($training as $train){ ?>
                                    <tr>
                                        <td><?php echo $train->id; ?></td>
                                        <td><a href="<?php echo site_url("admin/training/detail/$train->id"); ?>"><span class="font-16"><?php echo $train->title; ?></span></a></td>
                                        <td><?php echo character_limiter($train->body, 100); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($train->start_date)); ?></td>
                                        <td><a href="<?php echo site_url("admin/training/detail/$train->id"); ?>">View</a></td>
                                        <td><button type="button" onclick="delete_training(<?php echo $train->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Training-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Training Event</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/training/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="title">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea name="body" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <input type="date" name="start_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>End Date <span class="text-danger">*</span></label>
                                                <input type="date" name="end_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="add" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Calendar Events -->
                    
                    <script>
                        function delete_training(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this staff shift")){
                          $.post('<?php echo base_url('admin/training/delete_event'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>
                    
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/admin/script'); ?>

<script>
$(document).ready(function(){
    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:"<?php echo base_url(); ?>admin/training/load"
    });
});
         
</script>

</body>
</html>
