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
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

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
                        <div class="row clearfix">
                            <div class="col-xl-12">
                                <div class="card">
                                    <!--<div class="card-header">
                                        <h3 class="card-title">University Report</h3>
                                        <div class="card-options">
                                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                            <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between">
                                            <div class="font-12 mb-2"><span>Measure How Fast You’re Growing Monthly Recurring Revenue. <a href="#">Learn More</a></span></div>
                                            <div class="selectgroup w250">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="low" class="selectgroup-input" checked="">
                                                    <span class="selectgroup-button">1D</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="medium" class="selectgroup-input">
                                                    <span class="selectgroup-button">1W</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="high" class="selectgroup-input">
                                                    <span class="selectgroup-button">1M</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="intensity" value="veryhigh" class="selectgroup-input">
                                                    <span class="selectgroup-button">1Y</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="apex-chart-line-column"></div>
                                    </div>-->
                                    
                                    <!--<div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Fees</strong></div>
                                                    <div class="float-right"><small class="text-muted">35%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-indigo" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Donation</strong></div>
                                                    <div class="float-right"><small class="text-muted">61%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-yellow" role="progressbar" style="width: 61%" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Income</strong></div>
                                                    <div class="float-right"><small class="text-muted">87%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-green" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-2">
                                                <div class="clearfix">
                                                    <div class="float-left"><strong>Expense</strong></div>
                                                    <div class="float-right"><small class="text-muted">42%</small></div>
                                                </div>
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="text-uppercase font-10">Compared to last year</span>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
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
                                                    <th>Code</th>
                                                    <th>Picture</th>
                                                    <th>Full Name</th>
                                                    <th>Gender</th>
                                                    <th>Age</th>
                                                    <th>Telephone</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php if(!empty($children)){ foreach($children as $child){ ?>
                                                <tr>
                                                    <td><?php echo $child->code; ?></td>
                                                    <td class="w40">
                                                        <div class="avatar">
                                                            <img class="avatar" src="https://scottnnaghor.com/care_system/uploads/children/<?php echo $child->image; ?>" alt="<?php echo $child->fullname; ?>">
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
                                                    <th>ID</th>
                                                    <th>Photo</th>
                                                    <th>Full Name</th>
                                                    <th>Role</th>
                                                    <th>Telephone</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php if(!empty($staff)){ foreach($staff as $stf){ ?>
                                                <tr>
                                                    <td><?php echo $stf->id; ?></td>
                                                    <td class="w40">
                                                        <div class="avatar">
                                                            <img class="avatar" src="https://scottnnaghor.com/care_system/uploads/profile/<?php echo $stf->photo; ?>" alt="<?php echo $stf->firstname; ?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('staff/user/profile/'.$stf->id); ?>">
                                                            <div><?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?></div>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $stf->role; ?></td>
                                                    <td><?php echo $stf->telephone; ?></td>
                                                    <td><?php echo $stf->city; ?></td>
                                                    <td><?php echo $stf->state; ?></td>
                                                    <td><a href="<?php echo site_url('staff/user/profile/'.$stf->id); ?>">View</a></td>
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
