<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($profile as $prof){} ?>
<title><?php echo $prof->firstname; ?> <?php echo $prof->lastname; ?> || User || Staff || Harold</title>

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
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">User</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/user'); ?>">User </a></li>
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
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="User-profile">
                        <div class="row">
                            <div class="col-xl-4 col-md-12">
                                <div class="card">
                                    <div class="card-body w_user">
                                        <div class="user_avtar">
                                            <img class="rounded-circle" height="90" width="120" src="https://scottnnaghor.com/care_system/uploads/profile/<?php echo $prof->photo; ?>" 
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
                                            <!--<li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("staff/user/edit/$prof->id"); ?>">Edit</a></div>
                                            </li>-->
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
