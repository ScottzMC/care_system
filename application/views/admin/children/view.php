<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Young People</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start Main top header -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <!-- Start project content area -->
    <div class="page">
        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Young People</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Young People</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Children-all">List Young People</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Children-add">Add Young People</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        function delete_children(id){
          var del_id = id;
          if(confirm("Are you sure you want to delete this child")){
          $.post('<?php echo base_url('admin/children/profile/delete'); ?>', {"del_id": del_id}, function(data){
            alert('Deleted Successfully');
            location.reload();
            $('#cti').html(data)
            });
          }
        }
        
        </script>
        
        <p id='cti'></p>
                        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Children-all">
                        <div class="table-responsive card">
                            <table class="table table-hover table-vcenter table-striped mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Image</th>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>DOB</th>
                                        <th>Ethnic Background</th>
                                        <th>Child Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($children)){ foreach($children as $child){ ?>
                                    <tr>
                                        <td><?php echo $child->code; ?></td>
                                        <td class="w60">
                                            <img class="avatar" src="https://scottnnaghor.com/care_system/uploads/children/<?php echo $child->image; ?>" alt="<?php echo $child->fullname; ?>">
                                        </td>
                                        <td><a href="<?php echo site_url('admin/children/profile/detail/'.strtolower($child->code)); ?>"><span class="font-16"><?php echo $child->fullname; ?></span></a></td>
                                        <td><?php echo $child->age; ?></td>
                                        <td><?php echo date('l, dS M Y', strtotime($child->dob)); ?></td>
                                        <td><?php echo $child->ethnic; ?></td>
                                        <td><?php echo $child->child_status; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/children/profile/detail/'.strtolower($child->code)); ?>" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo site_url('admin/children/profile/edit/'.strtolower($child->code)); ?>" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <button type="button" onclick="delete_children(<?php echo $child->id; ?>)" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                        </td>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="Children-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Basic Information</h3>
                                <!--<div class="card-options ">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                </div>-->
                            </div>
                            
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/children/profile/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>FullName <span class="text-danger">*</span></label>
                                                <input type="text" name="fullname" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email Address <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Age <span class="text-danger">*</span></label>
                                                <select class="form-control" name="age">
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
                                                <input type="text" class="form-control" name="gender">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Ethnicity <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="ethnic">
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
                                                <input type="text" name="support_hours" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Status <span class="text-danger">*</span></label>
                                                <input type="text" name="child_status" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>House Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="house_name">
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
                                                <input type="text" name="guardian" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Telephone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="telephone" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date of Admission <span class="text-danger">*</span></label>
                                                <input type="date" name="admission_date" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>House Address</label>
                                                <textarea name="address" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Description of Young Person</label>
                                                <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>National Insurance Number <span class="text-danger">*</span></label>
                                                <input type="text" name="nin" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Social Worker <span class="text-danger">*</span></label>
                                                <input type="text" name="guardian_fullname" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Social Worker Email <span class="text-danger">*</span></label>
                                                <input type="email" name="guardian_email" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Social Worker Telephone Number <span class="text-danger">*</span></label>
                                                <input type="text" name="guardian_telephone" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Social Worker Address</label>
                                                <textarea name="guardian_address" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Child Picture <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" required>
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
                </div>
            </div>
        </div>
        <!-- Start main footer -->
        
    </div>    
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
