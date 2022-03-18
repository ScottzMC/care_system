<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($users as $usr){} ?>
<title>Edit <?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?> || User || Admin || Harold</title>

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
                        <h1 class="page-title">View all Users</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/user'); ?>">Users</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/user/profile/'.$usr->id.'/'.$usr->code); ?>"><?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?> Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users-edit">Edit <?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Users-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $usr->firstname; ?> <?php echo $usr->lastname; ?></h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/user/edit/$usr->id/$usr->code"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="firstname" class="form-control" value="<?php echo $usr->firstname; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Last Name <span class="text-danger">*</span></label>
                                                <input type="text" name="lastname" class="form-control" value="<?php echo $usr->lastname; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Role <span class="text-danger">*</span></label>
                                                <select class="form-control" name="role">
                                                    <option value="<?php echo $usr->role; ?>"><?php echo $usr->role; ?></option>
                                                    <option>Select</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="HR">HR</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Telephone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="telephone" class="form-control" value="<?php echo $usr->telephone; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address 1</label>
                                                <textarea name="address1" class="form-control" aria-label="With textarea"><?php echo $usr->address1; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <textarea name="address2" class="form-control" aria-label="With textarea"><?php echo $usr->address2; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Postcode <span class="text-danger">*</span></label>
                                                <input type="text" name="postcode" class="form-control" value="<?php echo $usr->postcode; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>City <span class="text-danger">*</span></label>
                                                <input type="text" name="city" class="form-control" value="<?php echo $usr->city; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>State <span class="text-danger">*</span></label>
                                                <input type="text" name="state" class="form-control" value="<?php echo $usr->state; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="edit" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Image</h3>
                            </div>
                            
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/user/edit_image/$usr->id/$usr->code"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label> Picture <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="edit_image" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Forms of ID</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/form_id/'.$usr->id.'/'.$usr->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Passport ID <span class="text-danger">*</span></label>
                                                <input type="file" name="userPassport[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Driving License <span class="text-danger">*</span></label>
                                                <input type="file" name="userDriving[]" class="form-control">
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
                        
                        <?php foreach($file as $fil){}?>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">National Insurance Number</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/form_nin/'.$usr->id.'/'.$usr->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>National Insurance Number <span class="text-danger">*</span></label>
                                                <input type="text" name="nin" class="form-control" value="<?php if(!empty($fil->nin)){ echo $fil->nin; }else{ echo ''; } ?>" placeholder="Enter NIN Address">
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
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">References</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/form_reference/'.$usr->id.'/'.$usr->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Reference 1 <span class="text-danger">*</span></label>
                                                <input type="text" name="reference1" class="form-control" value="<?php if(!empty($fil->reference1)){ echo $fil->reference1; }else{ echo ''; } ?>" placeholder="Enter Reference 1">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Reference 2 <span class="text-danger">*</span></label>
                                                <input type="text" name="reference2" class="form-control" value="<?php if(!empty($fil->reference2)){ echo $fil->reference2; }else{ echo ''; } ?>" placeholder="Enter Reference 2">
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
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Proof of Address</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/form_address/'.$usr->id.'/'.$usr->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Proof of Address 1 <span class="text-danger">*</span></label>
                                                <input type="file" name="userAddress1[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Proof of Address 2 <span class="text-danger">*</span></label>
                                                <input type="file" name="userAddress2[]" class="form-control">
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
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DBS Certificate</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/form_dbs/'.$usr->id.'/'.$usr->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>DBS Certificate <span class="text-danger">*</span></label>
                                                <input type="file" name="userDbs[]" class="form-control">
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
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Proof of Qualification</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/user/form_proof/'.$usr->id.'/'.$usr->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Proof of Qualification <span class="text-danger">*</span></label>
                                                <input type="file" name="userProof[]" class="form-control">
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
