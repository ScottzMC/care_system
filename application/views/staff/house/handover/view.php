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
<title>Handover || staff || Harold</title>

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
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/house/all/unit/'.$code); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('staff/house/handover/view/'.strtolower($code)); ?>">Handover</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Handover-all">Handover</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Guest-add">Add Guest ban</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Handover-all">
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
                                        <th>Action</th>
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
                                        <td><button type="button" onclick="delete_handover(<?php echo $hand->id; ?>)">Delete</button></td>
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
