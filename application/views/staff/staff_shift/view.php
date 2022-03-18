<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Staff Shift || Staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Staff Shift</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Staff Shift</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Calendar">Calendar Format</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Table">Table Format</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    
                    <script>
                        function delete_staff_shift(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this staff shift")){
                          $.post('<?php echo base_url('staff/staff_shift/delete_event'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                    </script>

                    <p id='cti'></p>
                    
                    <div class="tab-pane active" id="Calendar">
                        <div class="container-fluid">
                            <div id="calendar"> 
                             
                            </div> 
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Table">
                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Staff Name</th>
                                        <th>Email</th>
                                        <th>House Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Shift Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($staff_shift){ foreach($staff_shift as $shift){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/staff_shift/detail/$shift->id"); ?>"><span class="font-16"><?php echo $shift->title; ?></span></a></td>
                                        <td><?php echo $shift->email; ?></td>
                                        <td><?php echo $shift->house_name; ?></td>
                                        <td><?php echo $shift->start_time; ?></td>
                                        <td><?php echo $shift->end_time; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($shift->start_date)); ?></td>
                                        <td><a href="<?php echo site_url("staff/staff_shift/detail/$shift->id"); ?>">View</a></td>
                                    </tr>
                                  <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
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
        events:"<?php echo base_url(); ?>admin/staff_shift/load"
    });
});
         
</script>

</body>
</html>
