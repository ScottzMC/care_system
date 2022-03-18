<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Health & Safety || Admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/admin/nav'); ?>
    <div class="page">
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Health & Safety</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Health & Safety</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Health-all">View All Health & Safety</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Health-add">Add Health & Safety</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    <div class="tab-pane active" id="Health-all">
                        <script>
                        function delete_health_safety(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this health & safety")){
                          $.post('<?php echo base_url('admin/health_safety/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        $(function(){
                          $('#downloadable').click(function(){
                             
                             window.location.href = "<?php echo site_url('admin/health_safety/download') ?>?file_name="+ $(this).attr('href');
                          });
                        });
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Child Name</th>
                                        <th>Title</th>
                                        <th>Room Number</th>
                                        <th>Recorded By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($health_safety){ foreach($health_safety as $health){ ?>
                                    <tr>
                                        <td><?php echo $health->id; ?></td>
                                        <td><a href="<?php echo site_url("admin/children/profile/detail/$health->code"); ?>"><span class="font-16"><?php echo $health->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url("admin/health_safety/detail/$health->id"); ?>"><span class="font-16"><?php echo $health->title; ?></span></a></td>
                                        <td><?php echo $health->room_number; ?></td>
                                        <td><?php echo $health->recorded_by; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($health->created_date)); ?></td>
                                        <td>
                                        <?php if(!empty($health_safety)){ ?>
                                        <a href="<?php echo base_url('admin/health_safety/download/'.$health->id); ?>" target="_blank">Download</a>
                                        <?php }else{ echo ''; } ?>
                                        </td>
                                        <td><a href="<?php echo site_url("admin/health_safety/edit/$health->id/$health->code"); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_health_safety(<?php echo $health->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    
                    <div class="tab-pane show" id="Health-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Health & Safety</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('admin/health_safety/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
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
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea name="additional_info" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Room Number <span class="text-danger">*</span></label>
                                                <input type="text" name="room_number" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Health & Safety Check <span class="text-danger">*</span></label>
                                                <input type="text" name="safety_check" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Recorded By <span class="text-danger">*</span></label>
                                                <input type="text" name="recorded_by" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Due Date <span class="text-danger">*</span></label>
                                                <input type="date" name="due_date" class="form-control" placeholder="yyyy-mm-dd" required>
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
                                                <label>Document <span class="text-danger">*</span></label>
                                                <input type="file" name="userDocument[]" class="form-control">
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

    </div>
</div>

<?php $this->load->view('menu/admin/script'); ?>

</body>
</html>
