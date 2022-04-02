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
<title>Guest Ban || Admin || Harold</title>

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
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/house/all/unit/'.$code); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('admin/house/guest_ban/view/'.strtolower($code)); ?>">Guest Ban</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Guest-all">Guest ban</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Guest-all">
                        <script>
                        function delete_guest_ban(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this guest ban")){
                          $.post('<?php echo base_url('admin/house/guest_ban/delete'); ?>', {"del_id": del_id}, function(data){
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
                                        <th><a href="<?php echo site_url('admin/house/guest_ban/add/'.strtolower($code)); ?>">Add</a></th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($guest_ban){ foreach($guest_ban as $guest){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url("admin/children/profile/detail/$guest->code"); ?>"><span class="font-16"><?php echo $guest->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url("admin/house/guest_ban/detail/$guest->id/$code"); ?>"><span class="font-16"><?php echo $guest->room_number; ?></span></a></td>
                                        <td><?php echo date('l, dS M Y',strtotime($guest->start_date)); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($guest->end_date)); ?></td>
                                        <th><a href="<?php echo site_url('admin/house/guest_ban/add/'.strtolower($code)); ?>">Add</a></th>
                                        <td><a href="<?php echo site_url('admin/house/guest_ban/edit/'.$guest->id.'/'.$code); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_guest_ban(<?php echo $guest->id; ?>)">Delete</button></td>
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

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
