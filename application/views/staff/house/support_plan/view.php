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
<title>Support Plan || staff || Harold</title>

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
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('staff/house/support_plan/view/'.strtolower($code)); ?>">Support Plan</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Support-all">Support plan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Support-all">
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
                                        <th>Date</th>
                                        <th>Plan of action</th>
                                        <th><a href="<?php echo site_url('staff/house/support_plan/add/'.$code); ?>">Add</a></th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($support_plan){ foreach($support_plan as $support){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("staff/children/profile/detail/$support->code"); ?>"><span class="font-16"><?php echo $support->child_name; ?></span></a></td>
                                        <td><?php echo date('l, dS M Y',strtotime($support->created_date)); ?></td>
                                        <td><?php echo wordwrap($support->plan_of_action, 70,"<br>"); ?></td>
                                        <td><a href="<?php echo site_url('staff/house/support_plan/add/'.$code); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url("staff/house/support_plan/detail/$support->id/$support->code/$code"); ?>">View</a></td>
                                        <td><button type="button" onclick="delete_support_plan(<?php echo $support->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
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

</body>
</html>
