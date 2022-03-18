<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Support Work || Staff || Harold</title>
<?php $this->load->view('menu/staff/style'); ?>
</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Support Work</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/support_work'); ?>">Support Work </a></li>
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
                                    <?php if(!empty($detail)){ foreach($detail as $det){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Child name </b>
                                                <div class="pull-right"><?php echo $det->child_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Target</b>
                                                <div class="pull-right"><?php echo $det->title; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Comments and further actions </b>
                                                <div class="pull-right"><?php echo $det->body; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>House Name </b>
                                                <div class="pull-right"><?php echo $det->house_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Review Period </b>
                                                <div class="pull-right"><?php echo $det->review_period; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                            <b>Target task </b>
                                                <?php 
                                                  $check = explode(',', $det->task);
                                            
                                                  foreach($check as $tsk) {
                                                
                                                ?>
                                                <br>
                                                <div class="pull-right">
                                                <?php echo $tsk; ?>
                                                </div>
                                                <br>
                                                <?php } ?>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Start Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->start_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Target Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->target_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Completion Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->completed_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date</b>
                                                <div class="pull-right"><?php echo date('j M Y', strtotime($det->created_date)); ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Action</b>
                                                <div class="pull-right"><a href="<?php echo site_url("staff/support_work/edit/$det->id"); ?>">Edit</a></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Send Mail</b>
                                                <form action="<?php echo base_url('staff/support_work/send_mail'); ?>" method="POST">
                                                <input class="form-control" type="email" name="email" placeholder="Recipient email">
                                                <input type="hidden" name="child_name" value="<?php echo $det->child_name; ?>">
                                                <input type="hidden" name="body" value="<?php echo $det->body; ?>">
                                                <input type="hidden" name="house_name" value="<?php echo $det->house_name; ?>">
                                                <input type="hidden" name="target_completed" value="<?php echo $det->target_date; ?>">
                                                <input type="hidden" name="created_date" value="<?php echo date('l, dS M Y',strtotime($det->created_date)); ?>">
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php } } ?>
                                </div>
                                
                            </div>
                            
                            <?php if(!empty($detail)){
                            $task = explode(',', $det->task_id);
                            $title = explode(',', $det->task);

                            foreach($task as $task_id){
                            ?>
                            <div class="col-xl-8 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <?php $task = $this->db->query("SELECT * FROM support_work_task WHERE id = '$task_id' ")->result();
                                        foreach($task as $tsk){
                                            $title = $tsk->title;
                                        ?>
                                        <h3 class="card-title"><?php echo $title; ?></h3>
                                        <?php } ?>
                                    </div>
                                    <div class="card-body">
										<ul class="list-group">
                                            <?php 
                                            $task_completed = $this->db->query("SELECT * FROM support_work_subtask WHERE task_id = '$task_id' ")->result();
                                            if(!empty($task_completed)){ foreach($task_completed as $tsk_comp){ ?>
                                            <li class="list-group-item">
                                                <b>Sub-task </b>
                                                <div class="pull-right"><?php echo $tsk_comp->subtitle; ?></div>
                                            </li>
                                            <?php } } ?>
                                        </ul>
                                    </div>
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
