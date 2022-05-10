<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($support_work as $support){} ?>
<title>Edit <?php echo $support->title; ?> Support Work || staff || Harold</title>
<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Support Work</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/support_work/view/'.strtolower($code)); ?>">Support Work</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/house/support_work/detail/'.$support->id.'/'.$code); ?>"><?php echo $support->title; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $support->title; ?> </li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Support-edit">Edit <?php echo $support->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Support-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $support->title; ?></h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/house/support_work/edit/'.$support->id.'/'.$code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Target <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="<?php echo $support->title; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Children Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="children">
                                                        <option value="<?php echo $support->child_name; ?>"><?php echo $support->child_name; ?></option>
                                                        <option>Select</option>
                                                    <?php if(!empty($children)){ foreach($children as $child){ ?>
                                                        <option value="<?php echo $child->fullname; ?>"><?php echo $child->fullname; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Unit House <span class="text-danger">*</span></label>
                                                <select class="form-control" name="house_name">
                                                    <option value="<?php echo $support->house_name; ?>"><?php echo $support->house_name; ?></option>
                                                    <option>Select</option>
                                                    <?php if(!empty($house)){ foreach($house as $hse){ ?>
                                                    <option value="<?php echo $hse->housename; ?>"><?php echo $hse->housename; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Summary</label>
                                                <textarea cols="10" rows="10" name="body" class="form-control" aria-label="With textarea"><?php echo $support->body; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Review Period <span class="text-danger">*</span></label>
                                                <input type="text" name="review_period" class="form-control" placeholder="Review period" value="<?php echo $support->review_period; ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <input type="date" name="start_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Target Date <span class="text-danger">*</span></label>
                                                <input type="date" name="target_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Completed Date <span class="text-danger">*</span></label>
                                                <input type="date" name="completed_date" class="form-control" placeholder="yyyy-mm-dd" required>
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
