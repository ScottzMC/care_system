<?php 
    
    function convertToTimeFormat($timestamp){
        $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
        $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
        $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
        for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
            @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
            $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);
    
        if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
            $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
            echo "Created " .$output. " ago";
    }

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($house as $hse){} ?>
<title><?php echo $hse->housename; ?> || staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->


<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <?php 
                        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
                        foreach($property as $prop){} ?>
                        <h1 class="page-title"><?php echo $prop->housename; ?></h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">House</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Daily-all">Daily Log</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Keywork-all">Keywork Session</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Risk-all">Risk Assessment</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Reporting-all">Reporting</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Support-all">Support plan</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Support-work-all">Support Work</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Staff-Communication-all">Staff Communication</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Handover-all">Handover</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Guest-all">Guest ban</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Guest-add">Add Guest ban</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Daily-all">
                        <script>
                        function delete_daily_log(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this daily log")){
                          $.post('<?php echo base_url('staff/house/daily_log/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Time</th>
                                        <th>Body</th>
                                        <th>Staff Initial</th>
                                        <th><a href="<?php echo site_url('staff/house/daily_log/add/'.strtolower($code)); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($daily_log){ foreach($daily_log as $daily){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/house/daily_log/detail/$daily->id/$code"); ?>"><span class="font-16"><?php echo $daily->title; ?></span></a></td>
                                        <td><?php echo $daily->time; ?></td>
                                        <td><?php echo wordwrap($daily->summary, 70,"<br>"); ?></td>
                                        <td><?php echo $daily->staff_initial; ?></td>
                                        <td><a href="<?php echo site_url('staff/house/daily_log/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('staff/house/daily_log/edit/'.$daily->id.'/'.strtolower($code)); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_daily_log(<?php echo $daily->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Keywork-all">
                        <script>
                        function delete_keywork_session(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this keywork session")){
                          $.post('<?php echo base_url('staff/house/keywork_session/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#ctk').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='ctk'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Date Title</th>
                                        <th>Title</th>
                                        <th>Summary</th>
                                        <th>Staff Initial</th>
                                        <th><a href="<?php echo site_url("staff/house/keywork_session/add/$code"); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($keywork_session){ foreach($keywork_session as $keywork){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/house/keywork_session/detail/$keywork->id/$code"); ?>"><span class="font-16"><?php echo $keywork->date_title; ?></span></a></td>
                                        <td><a href="<?php echo site_url("staff/house/keywork_session/detail/$keywork->id/$code"); ?>"><span class="font-16"><?php echo $keywork->title; ?></span></a></td>
                                        <td><?php echo wordwrap($keywork->summary, 70,"<br>"); ?></td>
                                        <td><?php echo $keywork->staff_initial; ?></td>
                                        <td><a href="<?php echo site_url("staff/house/keywork_session/add/$code"); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url("staff/house/keywork_session/edit/$keywork->id/$code"); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_keywork_session(<?php echo $keywork->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Risk-all">
                        <script>
                        function delete_risk_assessment(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this risk assessment")){
                          $.post('<?php echo base_url('staff/house/risk_assessment/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#ctr').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='ctr'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Full Name</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th><a href="<?php echo base_url('staff/house/risk_assessment/add/'.$code); ?>">Add</a></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($risk_assessment){ foreach($risk_assessment as $risk){ ?>
                                    <tr>
                                        <td><?php echo $risk->code; ?></td>
                                        <td><a href="<?php echo site_url("staff/children/profile/detail/$risk->code"); ?>"><span class="font-16"><?php echo $risk->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url("staff/house/risk_assessment/detail/$risk->id/$code"); ?>"><span class="font-16"><?php echo $risk->title; ?></span></a></td>
                                        <td><?php echo date('l, dS M Y',strtotime($risk->created_date)); ?></td>
                                        <td>
                                        <a href="<?php echo base_url('staff/house/risk_assessment/add/'.$code); ?>">Add</a>
                                        </td>
                                        <td><button type="button" onclick="delete_risk_assessment(<?php echo $risk->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Reporting-all">
                        <script>
                        function delete_reporting(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this reporting")){
                          $.post('<?php echo base_url('staff/house/reporting/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#ctr').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='ctr'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FullName</th>
                                        <th>Title</th>
                                        <th>Staff</th>
                                        <th>Duration</th>
                                        <th>Date</th>
                                        <th><a href="<?php echo site_url('staff/house/reporting/add/'.$code); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($reporting){ foreach($reporting as $report){ ?>
                                    <tr>
                                        <td><?php echo $report->id; ?></td>
                                        <td><a href="<?php echo site_url("staff/children/profile/detail/$report->code"); ?>"><span class="font-16"><?php echo $report->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url("staff/house/reporting/detail/$report->id/$code"); ?>"><span class="font-16"><?php echo $report->title; ?></span></a></td>
                                        <td><?php echo $report->staff; ?></td>
                                        <td><?php echo $report->duration; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($report->created_date)); ?></td>
                                        <td><a href="<?php echo site_url('staff/house/reporting/add/'.$code); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('staff/house/reporting/edit/'.$report->id.'/'.$code); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_reporting(<?php echo $report->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Support-all">
                        <script>
                        function delete_support_plan(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this support plan")){
                          $.post('<?php echo base_url('staff/house/support_plan/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        function delete_support_area(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this area of support")){
                          $.post('<?php echo base_url('staff/house/support_plan/delete_area'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>FullName</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th><a href="<?php echo site_url('staff/house/support_plan/add/'.$code); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($support_plan){ foreach($support_plan as $support){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/children/profile/detail/$support->code"); ?>"><span class="font-16"><?php echo $support->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url("staff/house/support_plan/detail/$support->id/$code"); ?>"><span class="font-16"><?php echo $support->title; ?></span></a></td>
                                        <td><?php echo date('l, dS M Y',strtotime($support->created_date)); ?></td>
                                        <td><a href="<?php echo site_url('staff/house/support_plan/add/'.$code); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('staff/house/support_plan/edit/'.$support->id.'/'.$support->code.'/'.$code); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_support_plan(<?php echo $support->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Support-work-all">
                        <script>
                        function delete_support_work(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this support plan")){
                          $.post('<?php echo base_url('staff/house/support_work/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>FullName</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th><a href="<?php echo site_url('staff/house/support_work/add/'.$code); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($support_work){ foreach($support_work as $work){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url('staff/children/detail/'.$work->code); ?>"><span class="font-16"><?php echo $work->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url('staff/house/support_work/detail/'.$work->id.'/'.$code); ?>"><span class="font-16"><?php echo $work->title; ?></span></a></td>
                                        <td><?php echo $work->house_name; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($work->created_date)); ?></td>
                                        <td><a href="<?php echo site_url('staff/house/support_work/add/'.$code); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('staff/house/support_work/edit/'.$work->id.'/'.$code); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_support_work(<?php echo $work->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Staff-Communication-all">
                        <script>
                        function delete_staff_communication(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this staff communication")){
                          $.post('<?php echo base_url('staff/house/staff_communication/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Time</th>
                                        <th>Date</th>
                                        <th>Request</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($staff_communication){ foreach($staff_communication as $staff){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/house/staff_communication/detail/$staff->id/$code"); ?>"><span class="font-16"><?php echo $staff->title; ?></span></a></td>
                                        <td><?php echo $staff->time; ?></td>
                                        <td><?php echo wordwrap($staff->request, 70,"<br>"); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($staff->created_date)); ?></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Handover-all">
                        <script>
                        function delete_handover(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this handover")){
                          $.post('<?php echo base_url('staff/house/handover/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Time</th>
                                        <th>Outgoing Staff</th>
                                        <th>Ingoing Staff</th>
                                        <th><a href="<?php echo site_url('staff/house/handover/add/'.strtolower($code)); ?>">Add</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($handover){ foreach($handover as $hand){ 
                                  $query = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$hand->ingoing_staff' AND role = 'Staff' ")->result();
                                    foreach($query as $qry){
                                        $ingoing_firstname = $qry->firstname;
                                        $ingoing_lastname = $qry->lastname;
                                    }
                                    
                                    $sequel = $this->db->query("SELECT firstname, lastname FROM users WHERE email = '$hand->outgoing_staff' ")->result();
                                    foreach($sequel as $sql){
                                        $outgoing_firstname = $sql->firstname;
                                        $outgoing_lastname = $sql->lastname;
                                    }
                                  ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/house/handover/detail/$hand->handover_id/$code"); ?>"><span class="font-16"><?php echo $hand->title; ?></span></a></td>
                                        <td><?php echo $hand->time; ?></td>
                                        <?php if(!empty($sequel)){ ?>
                                        <td><?php echo $outgoing_firstname; ?> <?php echo $outgoing_lastname; ?></td>
                                        <?php }else{ ?>
                                        <td></td>
                                        <?php } ?>
                                        <?php if(!empty($query)){ ?>
                                        <td><?php echo $ingoing_firstname; ?> <?php echo $ingoing_lastname; ?></td>
                                        <?php }else{ ?>
                                        <td></td>
                                        <?php } ?>
                                        <td><a href="<?php echo site_url('staff/house/handover/add/'.strtolower($code)); ?>">Add</a></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Guest-all">
                        <script>
                        function delete_guest_ban(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this guest ban")){
                          $.post('<?php echo base_url('staff/house/guest_ban/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#ctr').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='ctr'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Young Person</th>
                                        <th>Room number</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th><a href="<?php echo site_url('staff/house/guest_ban/add/'.strtolower($code)); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($guest_ban){ foreach($guest_ban as $guest){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/children/profile/detail/$guest->code"); ?>"><span class="font-16"><?php echo $guest->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url("staff/house/guest_ban/detail/$guest->id/$code"); ?>"><span class="font-16"><?php echo $guest->room_number; ?></span></a></td>
                                        <td><?php echo date('l, dS M Y',strtotime($guest->start_date)); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($guest->end_date)); ?></td>
                                        <th><a href="<?php echo site_url('staff/house/guest_ban/add/'.strtolower($code)); ?>">Add</a></th>
                                        <td><a href="<?php echo site_url('staff/house/guest_ban/edit/'.$guest->id.'/'.$code); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_guest_ban(<?php echo $guest->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <!--<div class="tab-pane show" id="Guest-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Guest Ban</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/house/guest_ban/add/'.$code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Full Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_code">
                                                    <option>Select</option>
                                                    <?php foreach($children as $child){ ?>
                                                    <option value="<?php echo $child->code; ?>"><?php echo $child->fullname; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Room number <span class="text-danger">*</span></label>
                                                <input type="text" name="room_number" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Guest name <span class="text-danger">*</span></label>
                                                <input type="text" name="guest_name" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Reason for ban</label>
                                                <textarea id="summernote" name="reason_for_ban" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Additional Info <span class="text-danger">*</span></label>
                                                <textarea name="additional_info" class="form-control" rows="10" cols="10" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <input type="date" name="start_date" class="form-control" value="">
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
                    </div>-->
                    
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
