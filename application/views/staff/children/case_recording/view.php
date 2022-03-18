<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Young People || Case Recording</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start Main top header -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <!-- Start project content area -->
    <div class="page">
        
        <?php foreach($children as $child){} ?>
        <?php foreach($case_recording as $case){} ?>
        
        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Case Recording</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$case->code); ?>"><?php echo $case->child_name; ?> Profile </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Case Recording</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Children-all">List Case Recording</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Children-add">Add Case Recording</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        function delete_case_recording(id){
          var del_id = id;
          if(confirm("Are you sure you want to delete this case recording")){
          $.post('<?php echo base_url('staff/children/case_recording/delete'); ?>', {"del_id": del_id}, function(data){
            alert('Deleted Successfully');
            location.reload();
            $('#cti').html(data)
            });
          }
        }
        
        $(function(){
          $('#downloadable').click(function(){
             
             window.location.href = "<?php echo site_url('staff/children/case_recording/download') ?>?file_name="+ $(this).attr('href');
          });
        });
        
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
                                        <th>Full Name</th>
                                        <th>Title</th>
                                        <th>Comments and further actions</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($case_recording)){ foreach($case_recording as $case){ ?>
                                    <tr>
                                        <td><?php echo $case->code; ?></td>
                                        <td><a href="<?php echo site_url('staff/children/profile/detail/'.strtolower($case->code)); ?>"><span class="font-16"><?php echo $case->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url('staff/children/case_recording/detail/'.strtolower($case->id).'/'.strtolower($case->code)); ?>"><?php echo $case->title; ?></a></td>
                                        <td><?php echo character_limiter($case->body, 50); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($case->created_date)); ?></td>
                                        <td>
                                        <?php if(!empty($case_recording)){ ?>
                                        <a href="<?php echo base_url('staff/children/case_recording/download/'.$case->id); ?>" target="_blank">Download</a>
                                        <?php }else{ echo ''; } ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('staff/children/case_recording/detail/'.strtolower($case->id).'/'.strtolower($case->code)); ?>" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo site_url('staff/children/case_recording/edit/'.strtolower($case->id).'/'.strtolower($case->code)); ?>" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <button type="button" onclick="delete_case_recording(<?php echo $case->id; ?>)" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
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
                                <h3 class="card-title">Case Recording</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/children/case_recording/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label> Full Name <span class="text-danger">*</span></label>
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
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea id="summernote" name="body" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Document <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date (set the date upon update) <span class="text-danger">*</span></label>
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

<?php $this->load->view('menu/staff/script'); ?>

</body>
</html>