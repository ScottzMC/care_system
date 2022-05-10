<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Staff || Dashboard || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">
<!-- Page Loader -->

<div id="main_content">
    <?php $this->load->view('menu/staff/nav'); ?>
    <!-- Start project content area -->
    <div class="page">
        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Dashboard</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="admin-Dashboard" role="tabpanel">
                        <div class="row clearfix row-deck">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Children</h3>
                                    </div>
                                    <div class="table-responsive" style="height: 310px;">
                                        <table class="table card-table table-vcenter text-nowrap table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Picture</th>
                                                    <th>Full Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Telephone</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php if(!empty($children)){ foreach($children as $child){ ?>
                                                <tr>
                                                    <td class="w40">
                                                        <div class="avatar">
                                                            <img class="avatar" src="<?php echo base_url('uploads/children/'.$child->image); ?>" alt="<?php echo $child->fullname; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('staff/children/profile/detail/'.$child->code); ?>">
                                                            <div><?php echo $child->fullname; ?></div>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $child->gender; ?></td>
                                                    <td><?php echo $child->age; ?></td>
                                                    <td><?php echo $child->telephone; ?></td>
                                                    <td><a href="<?php echo site_url('staff/children/profile/detail/'.$child->code); ?>">View</a></td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Staff</h3>
                                    </div>
                                    <div class="table-responsive" style="height: 310px;">
                                        <table class="table card-table table-vcenter text-nowrap table-striped mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Photo</th>
                                                    <th>Full Name</th>
                                                    <th>Telephone</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php if(!empty($staff)){ foreach($staff as $stf){ ?>
                                                <tr>
                                                    <td class="w40">
                                                        <div class="avatar">
                                                            <img class="avatar" src="<?php echo base_url('uploads/profile/'.$stf->photo); ?>" alt="<?php echo $stf->firstname; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('staff/user/profile/'.$stf->id.'/'.$stf->code); ?>">
                                                            <div><?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?></div>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $stf->telephone; ?></td>
                                                    <td><?php echo $stf->city; ?></td>
                                                    <td><?php echo $stf->state; ?></td>
                                                    <td><a href="<?php echo site_url('staff/user/profile/'.$stf->id.'/'.$stf->code); ?>">View</a></td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
