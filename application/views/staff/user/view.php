
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>View Users || Staff || Harold</title>

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
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">View all Users</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Users</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users-all">View Users</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Role Model -->
                    <div class="tab-pane active" id="Users-all">
                        <script>
                        function delete_user(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this user")){
                          $.post('<?php echo base_url('staff/user/delete'); ?>', {"del_id": del_id}, function(data){
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
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Role</th>
                                        <th>Last Logged In Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($users){ foreach($users as $usr){ ?>
                                    <tr>
                                        <td><?php echo $usr->id; ?></td>
                                        <td class="w60">
                                            <img class="avatar" src="https://scottnnaghor.com/care_system/uploads/profile/<?php echo $usr->photo; ?>" alt="<?php echo $usr->firstname; ?>">
                                        </td>
                                        <td>
                                            <a href="<?= site_url("staff/user/profile/$usr->id/$usr->code"); ?>">
                                                <span class="font-16">
                                                    <?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?>
                                                </span>
                                            </a>
                                        </td>
                                        <td><?php echo $usr->email; ?></td>
                                        <td><?php echo $usr->role; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($usr->logged_in_date)); ?></td>
                                        <td><a href="<?= site_url("staff/user/profile/$usr->id/$usr->code"); ?>">View</a></td>
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
