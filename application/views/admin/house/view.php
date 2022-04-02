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
<title><?php echo $hse->housename; ?> || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->


<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
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
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">House</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#All">All</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="All">

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="<?php echo site_url("admin/house/daily_log/view/$code"); ?>"><span class="font-16">Daily Log</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/daily_log/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/daily_log/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><a href="<?php echo site_url("admin/house/guest_ban/view/$code"); ?>"><span class="font-16">Guest Ban</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/guest_ban/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/guest_ban/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><a href="<?php echo site_url("admin/house/handover/view/$code"); ?>"><span class="font-16">Handover</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/handover/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/handover/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><a href="<?php echo site_url("admin/house/health_safety/view/$code"); ?>"><span class="font-16">Health & Safety</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/health_safety/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/health_safety/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><a href="<?php echo site_url("admin/house/keywork_session/view/$code"); ?>"><span class="font-16">Keywork & Session</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/keywork_session/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/keywork_session/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><a href="<?php echo site_url("admin/house/reporting/view/$code"); ?>"><span class="font-16">Reporting</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/reporting/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/reporting/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><a href="<?php echo site_url("admin/house/risk_assessment/view/$code"); ?>"><span class="font-16">Risk Assessment</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/risk_assessment/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/risk_assessment/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><a href="<?php echo site_url("admin/house/staff_communication/view/$code"); ?>"><span class="font-16">Staff Communication</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/staff_communication/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/staff_communication/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><a href="<?php echo site_url("admin/house/support_plan/view/$code"); ?>"><span class="font-16">Support Plan</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/support_plan/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/support_plan/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><a href="<?php echo site_url("admin/house/support_work/view/$code"); ?>"><span class="font-16">Support Work</span></a></td>
                                        <td><a href="<?php echo site_url('admin/house/support_work/add/'.strtolower($code)); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url('admin/house/support_work/view/'.strtolower($code)); ?>">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
