<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($profile as $prof){} ?>
<title><?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?> || User || Admin || Harold</title>

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
                        <h1 class="page-title">User</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/user'); ?>">User </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#User-profile">Edit <?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('admin/user/download') ?>?file_name="+ $(this).attr('href');
          });
        });
        </script>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="User-profile">
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="card">
                                    <div class="card-body w_user">
                                        <div class="user_avtar">
                                            <img class="rounded-circle" height="90" width="120" src="<?php echo base_url('uploads/profile/'.$prof->photo); ?>" 
                                            alt="<?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?>">
                                        </div>
                                        <div class="wid-u-info">
                                            <h5><?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?></h5>
                                            <p class="text-muted m-b-0"><?php echo $prof->address1; ?></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Info</h3>
                                    </div>
                                    <?php if(!empty($profile)){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>FullName </b>
                                                <div class="pull-right"><?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Email Address </b>
                                                <div class="pull-right"><?php echo $prof->email; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Mobile Number </b>
                                                <div class="pull-right"><?php echo $prof->telephone; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Role </b>
                                                <div class="pull-right"><?php echo $prof->role; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address 1</b>
                                                <div class="pull-right"><?php echo $prof->address1; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address 2</b>
                                                <div class="pull-right"><?php echo $prof->address2; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("admin/user/edit/$prof->id/$prof->code"); ?>">Edit</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Qualification</h3>
                                    </div>
                                    <?php if(!empty($file)){ foreach($file as $fil){} ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Passport </b>
                                                <?php if(!empty($fil->passport)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/user/form_download_passport/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Driving License </b>
                                                <?php if(!empty($fil->driving_license)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/user/form_download_driving/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Proof of Address 1 </b>
                                                <?php if(!empty($fil->address1)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/user/form_download_address1/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Proof of Address 2 </b>
                                                <?php if(!empty($fil->address2)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/user/form_download_address2/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>DBS Certificate</b>
                                                <?php if(!empty($fil->dbs_certificate)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/user/form_download_dbs/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Proof of Qualification</b>
                                                <?php if(!empty($fil->qualification)){ ?>
                                                <div class="pull-right"><a href="<?php echo base_url('admin/user/form_download_proof/'.$fil->code); ?>" target="_blank">Download</a></div>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>National Insurance Number</b>
                                                <div class="pull-right"><?php echo $fil->nin; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Reference 1</b>
                                                <div class="pull-right"><?php echo $fil->reference1; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Reference 2</b>
                                                <div class="pull-right"><?php echo $fil->reference2; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("admin/user/edit/$prof->id/$prof->code"); ?>">Edit</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                
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
