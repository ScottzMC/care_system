<?php 
    
    function convertToRiskFormat($timestamp){
        $diffBtwCurrentTimeAndTimeStamp = (time() - $timestamp);
        $periodsString = ["sec", "min","hr","day","week","month","year","decade"];
        $periodNumbers = ["60" , "60" , "24" , "7" , "4.35" , "12" , "10"];
        for(@@$iterator = 0; $diffBtwCurrentTimeAndTimeStamp >= $periodNumbers[$iterator]; $iterator++)
            @@$diffBtwCurrentTimeAndTimeStamp /= $periodNumbers[$iterator];
            $diffBtwCurrentTimeAndTimeStamp = round($diffBtwCurrentTimeAndTimeStamp);
    
        if($diffBtwCurrentTimeAndTimeStamp != 1)  $periodsString[$iterator].="s";
            $output = "$diffBtwCurrentTimeAndTimeStamp $periodsString[$iterator]";
            echo "Created " .$output. " ago";
    }

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Support Plan || Admin || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

    <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Support Plan</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item" aria-current="page">House</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('staff/house/support_plan/view/'.strtolower($code)); ?>">Support Plan</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Support-add">Add Support Plan</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Support-areas-add">Add Areas of Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Support-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Support Plan</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/house/support_plan/add/'.$code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Full Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_code">
                                                    <option>Select</option>
                                                    <?php foreach($children as $child){ ?>
                                                    <option value="<?php echo $child->code; ?>"><?php echo $child->fullname; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Unit details <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Areas of Support <span class="text-danger">*</span></label>
                                                <br>
                                                <?php if(!empty($support_area)){ foreach($support_area as $area){ ?>
                                                 <input type="checkbox" name="area_of_support[]" value="<?php echo $area->id; ?>"> <?php echo $area->title; ?>
                                                <br>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea id="summernote" name="plan_of_action" class="form-control" rows="10" cols="20" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Who will support me? <span class="text-danger">*</span></label>
                                                <select class="form-control" name="support_me">
                                                    <option>Select</option>
                                                    <?php if(!empty($staff)){ foreach($staff as $stf){ ?>
                                                    <option value="<?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?>"><?php echo $stf->firstname; ?> <?php echo $stf->lastname; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>How often will I need support? <span class="text-danger">*</span></label>
                                                <select class="form-control" name="often_will_support">
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
                                                <input type="text" name="hours_spent_task" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Additional Information</label>
                                                <textarea name="additional_info" class="form-control" rows="10" cols="20" aria-label="With textarea"></textarea>
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
                                            <button type="submit" name="add" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Support-areas-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Area of Support</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/support_plan/area_of_support'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
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
                                <h3 class="card-title">All Area of Support</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/support_plan/area_of_support'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <?php if($support_area){ foreach($support_area as $area){ ?>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label><b><?php echo $area->title; ?></b></label>
                                            </div>
                                            <a href="<?php echo site_url('staff/house/support_plan/edit_area_of_support/'.$code); ?>" class="btn btn-primary">Edit</a>
                                            <br><br>
                                            <button type="button" onclick="delete_support_area(<?php echo $area->id; ?>)" class="btn btn-danger">Delete</button>
                                            <br><br>
                                        </div>
                                        <?php } } ?>
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
