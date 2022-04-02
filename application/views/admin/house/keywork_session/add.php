<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Keywork Session || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        
        <?php 
        $property = $this->db->query("SELECT housename FROM properties WHERE code = '$code' ")->result();
        foreach($property as $prop){} ?>
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Keywork Session</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                          <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                          <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('admin/house/keywork_session/view/'.strtolower($code)); ?>">Keywork Session</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Keywork-add">Add Keywork Session</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Keywork-independent-add">Add Independent living skill</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Keywork-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Keywork Session</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/house/keywork_session/add/'.$code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                                <label>Date title <span class="text-danger">*</span></label>
                                                <input type="text" name="date_title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Hours to be spent weekly <span class="text-danger">*</span></label>
                                                <input type="text" name="hours_spent" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Length of time spent <span class="text-danger">*</span></label>
                                                <input type="text" name="length_time" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea name="summary" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Independent Living Skills <span class="text-danger">*</span></label>
                                                <br>
                                                <?php if(!empty($independent_living)){ 
                                                foreach($independent_living as $independent){ ?>
                                                 <input type="checkbox" name="independent_living[]" value="<?php echo $independent->title; ?>"> <?php echo $independent->title; ?>
                                                <br>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Staff Initial <span class="text-danger">*</span></label>
                                                <input type="text" name="staff_initial" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Photo 1 <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Photo 2 <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles2[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Photo 3 <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles3[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Photo 4 <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles4[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Photo 5 <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles5[]" class="form-control">
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
                                            <button type="submit" name="add" class="btn btn-primary">SAVE</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Keywork-independent-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Independent Living Skills</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/house/keywork_session/independent_living'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                <h3 class="card-title">All Independent Living Skills</h3>
                            </div>
                            <div class="card-body">
                                    <div class="row">
                                        <?php if($independent_living){ foreach($independent_living as $independent){ ?>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label><b><?php echo $independent->title; ?></b></label>
                                            </div>
                                            <a href="<?php echo site_url('admin/house/keywork_session/edit_independent_living/'.$independent->id.'/'.$code); ?>" class="btn btn-primary">Edit</a>
                                            <br><br>
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
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
