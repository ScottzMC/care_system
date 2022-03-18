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
<title>Support Work || Staff || Harold</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start project content area -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <div class="page">
        
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Support Work</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Support Work</li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Support-all">View All Support Work</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Support-add">Add Support Work</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Support-task-add">Add Task</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Support-subtask-add">Add Sub-Task</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <!-- Calendar Events -->
                    <div class="tab-pane active" id="Support-all">
                        <script>
                        function delete_support_work(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this support work")){
                          $.post('<?php echo base_url('staff/support_work/delete'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        function delete_task(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this task")){
                          $.post('<?php echo base_url('staff/support_work/delete_task'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        function delete_subtask(id){
                          var del_id = id;
                          if(confirm("Are you sure you want to delete this task")){
                          $.post('<?php echo base_url('staff/support_work/delete_subtask'); ?>', {"del_id": del_id}, function(data){
                            alert('Deleted Successfully');
                            location.reload();
                            $('#cti').html(data)
                            });
                          }
                        }
                        
                        </script>

                        <p id='cti'></p>

                        <div class="table-responsive">
                          <table class="table table-hover table-vcenter text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Child name</th>
                                        <th>Topic</th>
                                        <th>House Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($support_work){ foreach($support_work as $support){ ?>
                                    <tr>
                                        <td><a href="<?php echo site_url('staff/children/detail/'.$support->code); ?>"><span class="font-16"><?php echo $support->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url('staff/support_work/detail/'.$support->id); ?>"><span class="font-16"><?php echo $support->title; ?></span></a></td>
                                        <td><?php echo $support->house_name; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($support->created_date)); ?></td>
                                        <td><a href="<?php echo site_url('staff/support_work/edit/'.$support->id); ?>">Edit</a></td>
                                        <td><button type="button" onclick="delete_support_work(<?php echo $support->id; ?>)">Delete</button></td>
                                    </tr>
                                  <?php } }else{ echo ''; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane show" id="Support-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Support Work</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/support_work/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Target <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Children Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_code">
                                                    <option>Select</option>
                                                    <?php if(!empty($children)){ foreach($children as $child){ ?>
                                                        <option value="<?php echo $child->code; ?>"><?php echo $child->fullname; ?></option>
                                                    <?php } }else{ ?>
                                                        <option value="None">None</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Unit House <span class="text-danger">*</span></label>
                                                <select class="form-control" name="house_name">
                                                    <option>Select</option>
                                                    <?php if(!empty($house)){ foreach($house as $hse){ ?>
                                                    <option value="<?php echo $hse->housename; ?>"><?php echo $hse->housename; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea name="body" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Task <span class="text-danger">*</span></label>
                                                <br>
                                                <?php if(!empty($task)){ 
                                                foreach($task as $tsk){ ?>
                                                <input type="hidden" name="task_id[]" value="<?php echo $tsk->id; ?>">
                                                 <input type="checkbox" name="task[]" value="<?php echo $tsk->title; ?>"> <?php echo $tsk->title; ?>
                                                <br>
                                                <?php } } ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Review Period <span class="text-danger">*</span></label>
                                                <input type="text" name="review_period" class="form-control" placeholder="Review period" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Image <span class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="userFiles1[]" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Start Date <span class="text-danger">*</span></label>
                                                <input type="date" name="start_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Target Date <span class="text-danger">*</span></label>
                                                <input type="date" name="target_date" class="form-control" placeholder="yyyy-mm-dd" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Completed Date <span class="text-danger">*</span></label>
                                                <input type="date" name="completed_date" class="form-control" placeholder="yyyy-mm-dd" required>
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
                        
                        <div class="tab-pane show" id="Support-task-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Task</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/support_work/add_task'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Task <span class="text-danger">*</span></label>
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
                                    <h3 class="card-title">Task</h3>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <?php if($task){ foreach($task as $tsk){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label><b><?php echo $tsk->title; ?></b></label>
                                                </div>
                                                <a href="<?php echo site_url('staff/support_work/edit_task/'.$tsk->id); ?>" class="btn btn-primary">Edit</a>
                                                <br><br>
                                                <button type="button" onclick="delete_task(<?php echo $tsk->id; ?>)" class="btn btn-danger">Delete</button>
                                                <br><br>
                                            </div>
                                            <?php } } ?>
                                        </div>    
    
                                </div>
                            </div>
                        
                        </div>
                        
                        <div class="tab-pane show" id="Support-subtask-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add Sub-Task</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/support_work/add_subtask'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Task <span class="text-danger">*</span></label>
                                                <select name="task_id" class="form-control">
                                                <option>Select</option>
                                                <?php if(!empty($task)){ foreach($task as $tsk){ ?>
                                                <option value="<?php echo $tsk->id; ?>"><?php echo $tsk->title; ?></option>
                                                <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
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
                                    <h3 class="card-title">Sub-Task</h3>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <?php if($subtask){ foreach($subtask as $tsk){ ?>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label><b><?php echo $tsk->subtitle; ?></b></label>
                                                </div>
                                                <a href="<?php echo site_url('staff/support_work/edit_subtask/'.$tsk->id); ?>" class="btn btn-primary">Edit</a>
                                                <br><br>
                                                <button type="button" onclick="delete_subtask(<?php echo $tsk->id; ?>)" class="btn btn-danger">Delete</button>
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
</div>

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>
