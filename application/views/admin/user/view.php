
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>View Users || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">View all Users</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Users</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users-all">View Users</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Users-add">Add Users</a></li>
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
                          $.post('<?php echo base_url('admin/user/delete'); ?>', {"del_id": del_id}, function(data){
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
                                        <th>Action</th>
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
                                            <a href="<?= site_url("admin/user/profile/$usr->id/$usr->code"); ?>">
                                                <span class="font-16">
                                                    <?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?>
                                                </span>
                                            </a>
                                        </td>
                                        <td><?php echo $usr->email; ?></td>
                                        <td><?php echo $usr->role; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($usr->logged_in_date)); ?></td>
                                        <td><a href="<?= site_url("admin/user/profile/$usr->id/$usr->code"); ?>">View</a></td>
                                        <td><a href="<?php echo site_url('admin/user/edit/'.$usr->id.'/'.$usr->code); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_user(<?php echo $usr->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane show" id="Users-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add User</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="firstname" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name <span class="text-danger">*</span></label>
                                                <input type="text" name="lastname" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Role <span class="text-danger">*</span></label>
                                                <select class="form-control" name="role">
                                                    <option>Select</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Telephone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="telephone" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address 1</label>
                                                <textarea name="address1" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <textarea name="address2" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Postcode <span class="text-danger">*</span></label>
                                                <input type="text" name="postcode" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>City <span class="text-danger">*</span></label>
                                                <input type="text" name="city" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>State <span class="text-danger">*</span></label>
                                                <input type="text" name="state" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Picture <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
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

</body>
</html>
