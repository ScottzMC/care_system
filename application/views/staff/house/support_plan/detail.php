<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Support Plan || staff || Harold</title>

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
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Support Plan</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">House</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('staff/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/house/support_plan/detail/'.$det->id.'/'.$code); ?>"><?php echo $det->title; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Support">Edit <?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Support">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Child Code </b>
                                                <div class="pull-right"><?php echo $det->code; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>FullName </b>
                                                <div class="pull-right"><?php echo $det->child_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Unit details </b>
                                                <div class="pull-right"><?php echo $det->title; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Plan of action </b>
                                                <div class="pull-right"><?php echo $det->plan_of_action; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Who will support me? </b>
                                                <div class="pull-right"><?php echo $det->support_me; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>How often will I need support? </b>
                                                <div class="pull-right"><?php echo $det->often_will_support; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Hours per week spent on task </b>
                                                <div class="pull-right"><?php echo $det->hours_spent_task; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Additional Information </b>
                                                <div class="pull-right"><?php echo $det->additional_info; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->created_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("staff/support_plan/edit/$det->id/$det->code/$code"); ?>">Edit</a></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Send Mail</b>
                                                <form action="<?php echo base_url('staff/house/support_plan/send_mail/'.$code); ?>" method="POST">
                                                <input class="form-control" type="email" name="email" placeholder="Recepient email">
                                                <input type="hidden" name="code" value="<?php echo $det->code; ?>">
                                                <input type="hidden" name="child_name" value="<?php echo $det->child_name; ?>">
                                                <input type="hidden" name="title" value="<?php echo $det->title; ?>">
                                                <input type="hidden" name="area_of_support" value="<?php echo $det->area_of_support; ?>">
                                                <input type="hidden" name="plan_of_action" value="<?php echo $det->plan_of_action; ?>">
                                                <input type="hidden" name="support_me" value="<?php echo $det->support_me; ?>">
                                                <input type="hidden" name="often_will_support" value="<?php echo $det->often_will_support; ?>">
                                                <input type="hidden" name="hours_spent_task" value="<?php echo $det->hours_spent_task; ?>">
                                                <input type="hidden" name="additional_info" value="<?php echo $det->additional_info; ?>">
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form> 
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                                <?php if(!empty($support_comment)){ foreach($support_comment as $comment){ ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo $comment->title; ?></h3>
                                    </div>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <?php echo $comment->comment; ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("staff/house/support_plan/edit/$det->id/$det->code/$code"); ?>">Edit</a></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } } ?>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->load->view('menu/staff/style'); ?>

</body>
</html>
