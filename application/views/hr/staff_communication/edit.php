<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($staff_communication as $staff){} ?>
<title>Edit <?php echo $staff->title; ?> Staff communication || HR || Harold</title>

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
                        <h1 class="page-title">Staff communication</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/staff_communication'); ?>">Staff communication</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('hr/staff_communication/detail/'.$staff->id); ?>"><?php echo $staff->title; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $staff->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Staff-edit">Edit <?php echo $staff->title; ?> Staff communication</a></li>
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
                                <h3 class="card-title">Edit <?php echo $staff->title; ?> Staff communication</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("hr/staff_communication/edit/$staff->id"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="<?php echo $staff->title; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Staff to show <span class="text-danger">*</span></label>
                                                <?php 
                                                $form_staff = $this->db->query("SELECT email, firstname, lastname FROM users WHERE role = 'Staff' ")->result();
                                                ?>
                                                <br>
                                                <?php if(!empty($form_staff)){ foreach($form_staff as $form){ ?>
                                                 <input type="checkbox" name="staff[]" value="<?php echo $form->email; ?>"> <?php echo $form->firstname; ?> <?php echo $form->lastname; ?>
                                                <br>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea name="request" class="form-control" aria-label="With textarea"><?php echo $staff->request; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Time <span class="text-danger">*</span></label>
                                                <select class="form-control" name="time">
                                                    <option value="<?php echo $staff->time; ?>"><?php echo $staff->time; ?></option>
                                                    <option>Select</option>
                                                    <option value="12 am">12 am</option>
                                                    <option value="1 am">1 am</option>
                                                    <option value="2 am">2 am</option>
                                                    <option value="3 am">3 am</option>
                                                    <option value="4 am">4 am</option>
                                                    <option value="5 am">5 am</option>
                                                    <option value="6 am">6 am</option>
                                                    <option value="7 am">7 am</option>
                                                    <option value="8 am">8 am</option>
                                                    <option value="9 am">9 am</option>
                                                    <option value="10 pm">10 am</option>
                                                    <option value="11 pm">11 am</option>
                                                    <option value="12 pm">12 pm</option>
                                                    <option value="1 pm">1 pm</option>
                                                    <option value="2 pm">2 pm</option>
                                                    <option value="3 pm">3 pm</option>
                                                    <option value="4 pm">4 pm</option>
                                                    <option value="5 pm">5 pm</option>
                                                    <option value="6 pm">6 pm</option>
                                                    <option value="7 pm">7 pm</option>
                                                    <option value="8 pm">8 pm</option>
                                                    <option value="9 pm">9 pm</option>
                                                    <option value="10 pm">10 pm</option>
                                                    <option value="11 pm">11 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" placeholder="yyyy-mm-dd" required>
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