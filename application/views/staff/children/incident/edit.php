<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($children as $child){} ?>
<?php foreach($incident as $inc){} ?>
<title>Edit <?php echo $inc->child_name; ?> Young People || Staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <?php foreach($incident as $inc){} ?>
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$inc->code); ?>"><?php echo $inc->child_name; ?> Profile </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/incident/view/'.$inc->code); ?>">Incident </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $inc->child_name; ?> Incident</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Printout-edit">Edit <?php echo $child->fullname; ?> Children</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Printout-edit">
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $child->fullname; ?> Incidents</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/children/incident/edit/'.$inc->id.'/'.$inc->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="<?php echo $inc->title; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea id="summernote" name="body" class="form-control" aria-label="With textarea"><?php echo $inc->body; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date (set the date upon update) <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" required>
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
