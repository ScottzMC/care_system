<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($contact_detail as $contact){} ?>
<?php foreach($children as $child){} ?>
<title><?php echo $contact->child_name; ?> Contact Details || staff || Harold</title>

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
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$child->code); ?>"><?php echo $child->fullname; ?> Profile </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/contact_detail/view/'.$contact->code); ?>">Contact Details </a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $contact->fullname; ?></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Children-profile"><?php echo $contact->fullname; ?></a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Children-profile">
                        <div class="row">
                            
                            <div class="col-xl-8 col-xl-12">
                                
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Contact Details</h3>
                                    </div>
                                    <?php if(!empty($contact_detail)){ foreach($contact_detail as $contact){} ?>
                                    <div class="card-body">
                                        <div class="timeline_item ">
                                            <small class="float-right text-right"><?php echo date('l, dS M Y',strtotime($contact->created_date)); ?></small></span>
                                            <h6 class="font600"><?php echo $contact->fullname; ?></h6>
                                            <br>
                                            <h6 class="font600">Telephone Number - <?php echo $contact->telephone; ?></h6>
                                            <br>
                                            <h6 class="font600">Email Address - <?php echo $contact->email; ?></h6>
                                            <br>
                                            <h6 class="font600">Relationship - <?php echo $contact->relationship; ?></h6>
                                            <br>
                                            <div class="msg"><?php echo $contact->address; ?></div>
                                            <div class="pull-right"><a href="<?php echo site_url("staff/children/contact_detail/edit/$contact->id/$contact->code"); ?>">Edit</a></div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                            <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Send Mail</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('staff/children/contact_detail/send_mail/'.$contact->id.'/'.$contact->code); ?>" method="POST">
                                                    <input class="form-control" type="email" name="email" placeholder="Recipent email">
                                                    <br>
                                                    <div class="pull-right"><button type="submit" name="send">Send to Mail</button></div>
                                                </form>   
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Generate PDF</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="timeline_item">
                                                <form action="<?php echo base_url('staff/generate_pdf/contact_detail/'.$contact->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                                <div class="pull-right"><button type="submit">Generate PDF</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-xl-8 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Upload PDF</h3>
                                        </div>
                                        <div class="card-body">
                                            
                                            <div class="timeline_item ">
                                                <form action="<?php echo base_url('staff/children/contact_detail/edit_document/'.$contact->id.'/'.$contact->code); ?>" method="POST" enctype="multipart/form-data" accept-charset="UTF-8">
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group">
                                                            <label>Document<span class="text-danger">*</span></label>
                                                            <input type="file" name="userFiles1[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="pull-right"><button type="submit" name="send">Upload</button></div>
                                                </form>   
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
</div>

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
