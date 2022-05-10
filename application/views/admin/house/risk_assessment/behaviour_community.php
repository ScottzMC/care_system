<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($risk_assessment as $risk){} ?>
<title> Behaviour in the community || Admin || Harold</title>

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
                        <h1 class="page-title">Risk Assessment</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/risk_assessment/view/'.strtolower($code)); ?>">Risk Assessment</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/house/risk_assessment/detail/'.$risk->id.'/'.$code); ?>"><?php echo $risk->title; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Behaviour in the community</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Risk-edit">Edit Behaviour in the community</a></li>
                        <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Role-Model-add">Add</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Risk-edit">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Behaviour in the community</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/house/risk_assessment/behaviour_community/$risk->id/$code"); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Behaviour in the community <span class="text-danger">*</span></label>
                                                <select class="form-control" name="behaviour_community_level">
                                                    <option value="<?php echo $risk->behaviour_community_level; ?>"><?php echo $risk->behaviour_community_level; ?></option>
                                                    <option>Select</option>
                                                    <option value="Low">Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                    <option value="None">None</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Behaviour in the community Risk Level</label>
                                                <textarea cols="10" rows="10" name="behaviour_community_risk_level" class="form-control" aria-label="With textarea"><?php echo $risk->behaviour_community_risk_level; ?></textarea>
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

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
