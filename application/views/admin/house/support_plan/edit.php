<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($support_plan as $support){} ?>
<title>Edit <?php echo $support->title; ?> Support Plan || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

        <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Support Plan</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">House</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/house/support_plan/detail/'.$support->id.'/'.$code); ?>"><?php echo $support->title; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $support->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Support-edit">Edit <?php echo $support->title; ?> Support Plan</a></li>
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
                                <h3 class="card-title">Edit <?php echo $support->title; ?> Support Plan</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/house/support_plan/edit/$support->id/$support->code/$code"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Unit details <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="<?php echo $support->title; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Areas of Support <span class="text-danger">*</span></label>
                                                <br>
                                                <?php if(!empty($support_area)){ foreach($support_area as $area){ ?>
                                                 <input type="checkbox" name="area_of_support[]" value="<?php echo $area->title; ?>"> <?php echo $area->title; ?>
                                                <br>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea id="summernote" name="plan_of_action" class="form-control" rows="20" cols="10" aria-label="With textarea"><?php echo $support->plan_of_action; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Who will support me? <span class="text-danger">*</span></label>
                                                <select class="form-control" name="support_me">
                                                    <option value="<?php echo $support->support_me; ?>"><?php echo $support->support_me; ?></option>
                                                    <option>Select</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>How often will I need support? <span class="text-danger">*</span></label>
                                                <select class="form-control" name="often_will_support">
                                                    <option value="<?php echo $support->often_will_support; ?>"><?php echo $support->often_will_support; ?></option>
                                                    <option>Select</option>
                                                    <option value="Everyday">Everyday</option>
                                                    <option value="Weekly">Weekly</option>
                                                    <option value="Once a week and when needed">Once a week and when needed</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Hours per week spent on task <span class="text-danger">*</span></label>
                                                <input type="text" name="hours_spent_task" class="form-control" value="<?php echo $support->hours_spent_task; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Additional Information</label>
                                                <textarea name="additional_info" class="form-control" rows="10" cols="10" aria-label="With textarea"><?php echo $support->additional_info; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date completed <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" placeholder="yyyy-mm-dd" class="form-control" required>
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
                                <h3 class="card-title">Edit Area of support</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/house/support_plan/edit_comment/$support->id/$support->code/$code"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Area of support</label>
                                                <br>
                                                <select class="form-control" name="area_id">
                                                    <?php if(!empty($support_comment)){ foreach($support_comment as $comment){ ?>
                                                    <option value="<?php echo $comment->area_support_id; ?>"><?php echo $comment->title; ?></option>
                                                    <?php } } ?>
                                                </select>
                                                <br>
                                                <label>Comment</label>
                                                <textarea name="comment" class="form-control" rows="10" cols="20" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="edit_comment" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form
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
