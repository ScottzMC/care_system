<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Appointments || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Appointments</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Calendar">Appointment Format</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Calendar-add">Add Appointment Event</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Table">Table Format</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    <div class="tab-pane active" id="Calendar">
                        <div class="container-fluid">
                            <div id="calendar"> 
                            </div> 
                        </div>
                    </div>
                    
                    <script>
                    function delete_appointment(id){
                      var del_id = id;
                      if(confirm("Are you sure you want to delete this appointment")){
                      $.post('<?php echo base_url('admin/appointment/delete_event'); ?>', {"del_id": del_id}, function(data){
                        alert('Deleted Successfully');
                        location.reload();
                        $('#cti').html(data)
                        });
                      }
                    }
                    
                    </script>

                    <p id='cti'></p>
                    
                    <div class="tab-pane show" id="Table">
                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($calendar){ foreach($calendar as $cal){ ?>
                                    <tr>
                                        <td><?php echo $cal->id; ?></td>
                                        <td><a href="<?php echo site_url("admin/appointment/detail/$cal->id"); ?>"><span class="font-16"><?php echo $cal->title; ?></span></a></td>
                                        <td><?php echo date('l, dS M Y',strtotime($cal->date)); ?></td>
                                        <td><a href="<?php echo site_url("admin/appointment/detail/$cal->id"); ?>">View</a></td>
                                        <td><button type="button" onclick="delete_appointment(<?php echo $cal->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End of Calendar Events -->
                    
                    <div class="tab-pane show" id="Calendar-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Appointment </h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/appointment/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="title" name="title" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Young Person <span class="text-danger">*</span></label>
                                                <select class="form-control" name="young_person">
                                                <option>Select</option>
                                                <?php foreach($children as $child){ ?>
                                                    <option value="<?php echo $child->code; ?>"><?php echo $child->fullname; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>House Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="house_name">
                                                <option>Select</option>
                                                <?php if(!empty($house)){ foreach($house as $hse){ ?>
                                                    <option value="<?php echo $hse->housename; ?>"><?php echo $hse->housename; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Type of Appointment <span class="text-danger">*</span></label>
                                                <input type="text" name="type" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Address of Appointment <span class="text-danger">*</span></label>
                                                <textarea col="5" rows="5" name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Support for the Young Person <span class="text-danger">*</span></label>
                                                <textarea col="5" rows="5" name="support" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Time <span class="text-danger">*</span></label>
                                                <input type="text" name="time" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="date" class="form-control" placeholder="yyyy-mm-dd" required>
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
        events:"<?php echo base_url(); ?>admin/appointment/load"
    });
});
         
</script>

</body>
</html>
