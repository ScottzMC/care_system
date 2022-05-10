<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Health & Safety || staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <?php 
            $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
            foreach($property as $prop){} ?>
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Health & Safety</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('staff/house/health_safety/view/'.strtolower($code)); ?>">Health & Safety</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Health-all">View All Health & Safety</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    <div class="tab-pane active" id="Health-all">
                        <script>
                        function delete_health_safety(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this health & safety")){
                          $.post('<?php echo base_url('staff/house/health_safety/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        $(function(){
                          $('#downloadable').click(function(){
                             
                             window.location.href = "<?php echo site_url('staff/house/health_safety/download') ?>?file_name="+ $(this).attr('href');
                          });
                        });
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <!--<th>Young Person</th>-->
                                        <th>Additional info</th>
                                        <th>Room Number</th>
                                        <th><a href="<?php echo site_url("staff/house/health_safety/add/$code"); ?>">Add</a></th>
                                        <th>View</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($health_safety){ foreach($health_safety as $health){ ?>
                                    <tr>
                                        <!--<td><a href="<?php echo site_url("staff/house/health_safety/detail/$health->id/$code"); ?>"><span class="font-16"><?php echo $health->child_name; ?></span></a></td>-->
                                        <td><?php echo wordwrap($health->additional_info, 70,"<br>"); ?></td>
                                        <td><?php echo $health->room_number; ?></td>
                                        <td><a href="<?php echo site_url("staff/house/health_safety/add/$code"); ?>">Add</a></td>
                                        <td><a href="<?php echo site_url("staff/house/health_safety/detail/$health->id/$code"); ?>">View</a></td>
                                        <td><a href="<?php echo site_url("staff/house/health_safety/edit/$health->id/$code"); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_health_safety(<?php echo $health->id; ?>)">Delete</button></td>
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
