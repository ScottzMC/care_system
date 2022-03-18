<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($staff_shift as $staff){} ?>
<title>Edit <?php echo $staff->title; ?> Staff Shift || HR || Harold</title>

<?php $this->load->view('menu/hr/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/hr/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Staff Shift</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/staff_shift'); ?>">Staff Shift</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/staff_shift/detail/'.$staff->id); ?>"><?php echo $staff->title; ?> Info</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $staff->title; ?> </li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Staff-edit">Edit <?php echo $staff->title; ?> Staff Shift</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Staff-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $staff->title; ?> Staff Shift</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("hr/staff_shift/edit/$staff->id"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                    
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Unit House <span class="text-danger">*</span></label>
                                                <select class="form-control" name="house_name">
                                                    <option value="<?php echo $staff->house_name; ?>"><?php echo $staff->house_name; ?></option>
                                                    <option>Select</option>
                                                    <?php if(!empty($house)){ foreach($house as $hse){ ?>
                                                    <option value="<?php echo $hse->housename; ?>"><?php echo $hse->housename; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Shift Start <span class="text-danger">*</span></label>
                                                <select class="form-control" name="start_time">
                                                    <option value="<?php echo $staff->start_time; ?>"><?php echo $staff->start_time; ?></option>
                                                    <option>Select</option>
                                                    <option value="12am">12am</option>
                                                <option value="12:15am">12:15am</option>
                                                <option value="12:30am">12:30am</option>
                                                <option value="12:45am">12:45am</option>
                                                <option value="1am">1am</option>
                                                <option value="1:15am">1:15am</option>
                                                <option value="1:30am">1:30am</option>
                                                <option value="1:45am">1:45am</option>
                                                <option value="2am">2am</option>
                                                <option value="2:15am">2:15am</option>
                                                <option value="2:30am">2:30am</option>
                                                <option value="2:45am">2:45am</option>
                                                <option value="3:am">3am</option>
                                                <option value="3:15am">3:15am</option>
                                                <option value="3:30am">3:30am</option>
                                                <option value="3:45am">3:45am</option>
                                                <option value="4:am">4:am</option>
                                                <option value="4:15am">4:15am</option>
                                                <option value="4:30am">4:30am</option>
                                                <option value="4:45am">4:45am</option>
                                                <option value="5am">5am</option>
                                                <option value="5:15am">5:15am</option>
                                                <option value="5:30am">5:30am</option>
                                                <option value="5:45am">5:45am</option>
                                                <option value="6am">6am</option>
                                                <option value="6:15am">6:15am</option>
                                                <option value="6:30am">6:30am</option>
                                                <option value="6:45am">6:45am</option>
                                                <option value="7am">7am</option>
                                                <option value="7:15am">7:15am</option>
                                                <option value="7:30am">7:30am</option>
                                                <option value="7:45am">7:45am</option>
                                                <option value="8am">8am</option>
                                                <option value="8:15am">8:15am</option>
                                                <option value="8:30am">8:30am</option>
                                                <option value="8:45am">8:45am</option>
                                                <option value="9am">9am</option>
                                                <option value="9:15am">9:15am</option>
                                                <option value="9:30am">9:30am</option>
                                                <option value="9:45am">9:45am</option>
                                                <option value="10am">10am</option>
                                                <option value="10:15am">10:15am</option>
                                                <option value="10:30am">10:30am</option>
                                                <option value="10:45am">10:45am</option>
                                                <option value="11am">11am</option>
                                                <option value="11:15am">11:15am</option>
                                                <option value="11:30am">11:30am</option>
                                                <option value="11:45am">11:45am</option>
                                                <option value="12pm">12pm</option>
                                                <option value="12:15pm">12:15pm</option>
                                                <option value="12:30pm">12:30pm</option>
                                                <option value="12:45pm">12:45pm</option>
                                                <option value="1pm">1pm</option>
                                                <option value="1:15pm">1:15pm</option>
                                                <option value="1:30pm">1:30pm</option>
                                                <option value="1:45pm">1:45pm</option>
                                                <option value="2pm">2pm</option>
                                                <option value="2:15pm">2:15pm</option>
                                                <option value="2:30pm">2:30pm</option>
                                                <option value="2:45pm">2:45pm</option>
                                                <option value="3pm">3pm</option>
                                                <option value="3:15pm">3:15pm</option>
                                                <option value="3:30pm">3:30pm</option>
                                                <option value="3:45pm">3:45pm</option>
                                                <option value="4pm">4pm</option>
                                                <option value="4:15pm">4:15pm</option>
                                                <option value="4:30pm">4:30pm</option>
                                                <option value="4:45pm">4:45pm</option>
                                                <option value="5pm">5pm</option>
                                                <option value="5:15pm">5:15pm</option>
                                                <option value="5:30pm">5:30pm</option>
                                                <option value="5:45pm">5:45pm</option>
                                                <option value="6pm">6pm</option>
                                                <option value="6:15pm">6:15pm</option>
                                                <option value="6:30pm">6:30pm</option>
                                                <option value="6:45pm">6:45pm</option>
                                                <option value="7pm">7pm</option>
                                                <option value="7:15pm">7:15pm</option>
                                                <option value="7:30pm">7:30pm</option>
                                                <option value="7:45pm">7:45pm</option>
                                                <option value="8pm">8pm</option>
                                                <option value="8:15pm">8:15pm</option>
                                                <option value="8:30pm">8:30pm</option>
                                                <option value="8:45pm">8:45pm</option>
                                                <option value="9pm">9pm</option>
                                                <option value="9:15pm">9:15pm</option>
                                                <option value="9:30pm">9:30pm</option>
                                                <option value="9:45pm">9:45pm</option>
                                                <option value="10pm">10pm</option>
                                                <option value="10:15pm">10:15pm</option>
                                                <option value="10:30pm">10:30pm</option>
                                                <option value="10:45pm">10:45pm</option>
                                                <option value="11pm">11pm</option>
                                                <option value="11:15pm">11:15pm</option>
                                                <option value="11:30pm">11:30pm</option>
                                                <option value="11:45pm">11:45pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Shift End <span class="text-danger">*</span></label>
                                                <select class="form-control" name="end_time">
                                                    <option value="<?php echo $staff->end_time; ?>"><?php echo $staff->end_time; ?></option>
                                                    <option>Select</option>
                                                    <option value="12am">12am</option>
                                                <option value="12:15am">12:15am</option>
                                                <option value="12:30am">12:30am</option>
                                                <option value="12:45am">12:45am</option>
                                                <option value="1am">1am</option>
                                                <option value="1:15am">1:15am</option>
                                                <option value="1:30am">1:30am</option>
                                                <option value="1:45am">1:45am</option>
                                                <option value="2am">2am</option>
                                                <option value="2:15am">2:15am</option>
                                                <option value="2:30am">2:30am</option>
                                                <option value="2:45am">2:45am</option>
                                                <option value="3:am">3am</option>
                                                <option value="3:15am">3:15am</option>
                                                <option value="3:30am">3:30am</option>
                                                <option value="3:45am">3:45am</option>
                                                <option value="4:am">4:am</option>
                                                <option value="4:15am">4:15am</option>
                                                <option value="4:30am">4:30am</option>
                                                <option value="4:45am">4:45am</option>
                                                <option value="5am">5am</option>
                                                <option value="5:15am">5:15am</option>
                                                <option value="5:30am">5:30am</option>
                                                <option value="5:45am">5:45am</option>
                                                <option value="6am">6am</option>
                                                <option value="6:15am">6:15am</option>
                                                <option value="6:30am">6:30am</option>
                                                <option value="6:45am">6:45am</option>
                                                <option value="7am">7am</option>
                                                <option value="7:15am">7:15am</option>
                                                <option value="7:30am">7:30am</option>
                                                <option value="7:45am">7:45am</option>
                                                <option value="8am">8am</option>
                                                <option value="8:15am">8:15am</option>
                                                <option value="8:30am">8:30am</option>
                                                <option value="8:45am">8:45am</option>
                                                <option value="9am">9am</option>
                                                <option value="9:15am">9:15am</option>
                                                <option value="9:30am">9:30am</option>
                                                <option value="9:45am">9:45am</option>
                                                <option value="10am">10am</option>
                                                <option value="10:15am">10:15am</option>
                                                <option value="10:30am">10:30am</option>
                                                <option value="10:45am">10:45am</option>
                                                <option value="11am">11am</option>
                                                <option value="11:15am">11:15am</option>
                                                <option value="11:30am">11:30am</option>
                                                <option value="11:45am">11:45am</option>
                                                <option value="12pm">12pm</option>
                                                <option value="12:15pm">12:15pm</option>
                                                <option value="12:30pm">12:30pm</option>
                                                <option value="12:45pm">12:45pm</option>
                                                <option value="1pm">1pm</option>
                                                <option value="1:15pm">1:15pm</option>
                                                <option value="1:30pm">1:30pm</option>
                                                <option value="1:45pm">1:45pm</option>
                                                <option value="2pm">2pm</option>
                                                <option value="2:15pm">2:15pm</option>
                                                <option value="2:30pm">2:30pm</option>
                                                <option value="2:45pm">2:45pm</option>
                                                <option value="3pm">3pm</option>
                                                <option value="3:15pm">3:15pm</option>
                                                <option value="3:30pm">3:30pm</option>
                                                <option value="3:45pm">3:45pm</option>
                                                <option value="4pm">4pm</option>
                                                <option value="4:15pm">4:15pm</option>
                                                <option value="4:30pm">4:30pm</option>
                                                <option value="4:45pm">4:45pm</option>
                                                <option value="5pm">5pm</option>
                                                <option value="5:15pm">5:15pm</option>
                                                <option value="5:30pm">5:30pm</option>
                                                <option value="5:45pm">5:45pm</option>
                                                <option value="6pm">6pm</option>
                                                <option value="6:15pm">6:15pm</option>
                                                <option value="6:30pm">6:30pm</option>
                                                <option value="6:45pm">6:45pm</option>
                                                <option value="7pm">7pm</option>
                                                <option value="7:15pm">7:15pm</option>
                                                <option value="7:30pm">7:30pm</option>
                                                <option value="7:45pm">7:45pm</option>
                                                <option value="8pm">8pm</option>
                                                <option value="8:15pm">8:15pm</option>
                                                <option value="8:30pm">8:30pm</option>
                                                <option value="8:45pm">8:45pm</option>
                                                <option value="9pm">9pm</option>
                                                <option value="9:15pm">9:15pm</option>
                                                <option value="9:30pm">9:30pm</option>
                                                <option value="9:45pm">9:45pm</option>
                                                <option value="10pm">10pm</option>
                                                <option value="10:15pm">10:15pm</option>
                                                <option value="10:30pm">10:30pm</option>
                                                <option value="10:45pm">10:45pm</option>
                                                <option value="11pm">11pm</option>
                                                <option value="11:15pm">11:15pm</option>
                                                <option value="11:30pm">11:30pm</option>
                                                <option value="11:45pm">11:45pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Shift Date <span class="text-danger">*</span></label>
                                                <input type="date" name="date" class="form-control" placeholder="yyyy-mm-dd" required>
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
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/hr/script'); ?>

</body>
</html>
