<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<?php foreach($children as $child){} ?>
<title>Edit <?php echo $child->fullname; ?> Young People || Admin || Harold</title>

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
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin/children/profile/detail/'.$child->code); ?>"><?php echo $child->fullname; ?> Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $child->fullname; ?> Children</li>
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
                                <h3 class="card-title">Edit <?php echo $child->fullname; ?> Young People</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/children/profile/edit/'.$child->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>FullName <span class="text-danger">*</span></label>
                                                <input type="text" name="fullname" class="form-control" value="<?php echo $child->fullname; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" value="<?php echo $child->email; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Age <span class="text-danger">*</span></label>
                                                <select class="form-control" name="age">
                                                    <option value="<?php echo $child->age; ?>"><?php echo $child->age; ?></option>
                                                    <option>Select</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Gender <span class="text-danger">*</span></label>
                                                <select class="form-control" name="gender">
                                                    <option><?php echo $child->gender; ?></option>
                                                    <option>Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Non-binary">Non-binary</option>
                                                    <option value="Prefer not to say">Prefer not to say</option>
                                                   <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>DOB (set the date upon update) <span class="text-danger">*</span></label>
                                                <input type="date" name="dob" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Support Hours <span class="text-danger">*</span></label>
                                                <input type="text" name="support_hours" class="form-control" value="<?php echo $child->support_hours; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Ethnic Background <span class="text-danger">*</span></label>
                                                <select class="form-control" name="ethnic">
                                                    <option value="<?php echo $child->ethnic; ?>"><?php echo $child->ethnic; ?></option>
                                                    <option>Select</option>
                                                     <option value="English, Welsh, Scottish, Northern Irish or British">English, Welsh, Scottish, Northern Irish or British</option>
                                                    <option value="Irish">Irish</option>
                                                    <option value="Gypsy or Irish Traveller">Gypsy or Irish Traveller</option>
                                                    <option value="Any other White background">Any other White background</option>
                                                    <option value="White and Black Caribbean">White and Black Caribbean</option>
                                                    <option value="White and Black African">White and Black African</option>
                                                    <option value="White and Asian">White and Asian</option>
                                                    <option value="Any other Mixed or Multiple ethnic background">Any other Mixed or Multiple ethnic background</option>
                                                    <option value="Indian">Indian</option>
                                                    <option value="Pakistani">Pakistani</option>
                                                    <option value="Bangladeshi">Bangladeshi</option>
                                                    <option value="Chinese">Chinese</option>
                                                    <option value="Any other Asian background">Any other Asian background</option>
                                                    <option value="African">African</option>
                                                    <option value="Caribbean">Caribbean</option>
                                                    <option value="Any other Black, African or Caribbean background">Any other Black, African or Caribbean background</option>
                                                    <option value="Arab">Arab</option>
                                                    <option value="Any other ethnic group">Any other ethnic group</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Status <span class="text-danger">*</span></label>
                                                    <input type="text" name="child_status" class="form-control" value="<?php echo $child->child_status; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>House Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="house_name">
                                                    <option><?php echo $child->house_name; ?></option>
                                                    <option>Select</option>
                                                    <?php if(!empty($house)){ foreach($house as $hse){ ?>
                                                    <option value="<?php echo $hse->housename; ?>"><?php echo $hse->housename; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Legal status <span class="text-danger">*</span></label>
                                                <input type="text" name="guardian" class="form-control" value="<?php echo $child->guardian; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Telephone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="telephone" class="form-control" value="<?php echo $child->telephone; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Description of Young Person</label>
                                                <textarea name="description" class="form-control" aria-label="With textarea"><?php echo $child->description; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>National Insurance Number <span class="text-danger">*</span></label>
                                                <input type="text" name="nin" class="form-control" value="<?php echo $child->nin; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date of Admission <span class="text-danger">*</span></label>
                                                <input type="date" name="admission_date" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date of Exit <span class="text-danger">*</span></label>
                                                <input type="date" name="exit_date" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>House Address</label>
                                                <textarea name="address" class="form-control" aria-label="With textarea"><?php echo $child->address; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Guardian FullName <span class="text-danger">*</span></label>
                                                <input type="text" name="guardian_fullname" class="form-control" value="<?php echo $child->guardian_fullname; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Guardian Email <span class="text-danger">*</span></label>
                                                <input type="email" name="guardian_email" class="form-control" value="<?php echo $child->guardian_email; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Guardian Telephone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="guardian_telephone" class="form-control" value="<?php echo $child->guardian_telephone; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Guardian Address</label>
                                                <textarea name="guardian_address" class="form-control" aria-label="With textarea"><?php echo $child->guardian_address; ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date<span class="text-danger">*</span></label>
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
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit <?php echo $child->fullname; ?> Image</h3>
                            </div>
                            
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/children/profile/edit_image/'.$child->code); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Picture <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-right m-t-20">
                                            <button type="submit" name="edit_image" class="btn btn-primary">SAVE</button>
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
