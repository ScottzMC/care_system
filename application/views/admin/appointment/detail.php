<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($detail as $det){} ?>
<title><?php echo $det->title; ?> || Appointment || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Calendar Events</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/appointment'); ?>">Calendar Events </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $det->title; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Calendar-event"><?php echo $det->title; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Calendar-event">
                        <div class="row">
                            
                            <div class="col-xl-8 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Info</h3>
                                    </div>
                                    <?php if(!empty($detail)){ ?>
                                    <div class="card-body">
										<ul class="list-group">
                                            <li class="list-group-item">
                                                <b>Title </b>
                                                <div class="pull-right"><?php echo $det->title; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Young Person </b>
                                                <div class="pull-right"><?php echo $det->young_person; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>House Name </b>
                                                <div class="pull-right"><?php echo $det->house_name; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address of Appointment </b>
                                                <div class="pull-right"><?php echo $det->address; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Support for Young Person </b>
                                                <div class="pull-right"><?php echo $det->support; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Type of Appointment </b>
                                                <div class="pull-right"><?php echo $det->type; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Time for the Appointment </b>
                                                <div class="pull-right"><?php echo $det->time; ?></div>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Date of Appointment </b>
                                                <div class="pull-right"><?php echo $det->date; ?></div>
                                            </li>
                                            <form action="<?php echo base_url('admin/appointment/send_mail'); ?>" method="POST">
                                            <li class="list-group-item">
                                                <b>Mail</b>
                                                <input class="form-control" type="email" name="email" placeholder="Recepient email">
                                                <input type="hidden" name="title" value="<?php echo $det->title; ?>">
                                                <input type="hidden" name="young_person" value="<?php echo $det->young_person; ?>">
                                                <input type="hidden" name="house_name" value="<?php echo $det->house_name; ?>">
                                                <input type="hidden" name="address" value="<?php echo $det->address; ?>">
                                                <input type="hidden" name="support" value="<?php echo $det->support; ?>">
                                                <input type="hidden" name="type" value="<?php echo $det->type; ?>">
                                                <input type="hidden" name="time" value="<?php echo $det->time; ?>">
                                                <input type="hidden" name="date" value="<?php echo $det->date; ?>">
                                                <br>
                                                <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                            </li>
                                            </form>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                
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
