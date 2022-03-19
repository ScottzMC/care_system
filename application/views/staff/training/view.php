<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Training Calendar || Staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Training Calendar</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Training Calendar</li>
                        </ol>
                    </div>
                    
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Calendar">View Calendar Format</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Table">Table Format</a></li>
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
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($training){ foreach($training as $train){ ?>
                                    <tr>
                                        <td><?php echo $train->id; ?></td>
                                        <td><a href="<?php echo site_url("staff/training/detail/$train->id"); ?>"><span class="font-16"><?php echo $train->title; ?></span></a></td>
                                        <td><?php echo character_limiter($train->body, 100); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($train->start_date)); ?></td>
                                        <td><a href="<?php echo site_url("staff/training/detail/$train->id"); ?>">View</a></td>
                                    </tr>
                                  <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script>
                        function delete_training(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this staff shift")){
                          $.post('<?php echo base_url('staff/training/delete_event'); ?>', {"del_id": del_id}, function(data){
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

<?php $this->load->view('menu/staff/script'); ?>

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
