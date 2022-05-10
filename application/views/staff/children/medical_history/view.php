<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Young People || Medical History</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start Main top header -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <!-- Start project content area -->
    <div class="page">
        
        <?php foreach($children as $child){} 
        foreach($medical as $med){}
        ?>

        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Medical History</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <?php if(!empty($medical)){?>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$med->code); ?>"><?php echo $med->child_name; ?> Profile </a></li>
                            <?php } ?>
                            <li class="breadcrumb-item active" aria-current="page">Medical History</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Children-all">List Medical History</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Children-add">Add Medical History</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        function delete_medical_history(id){
          var del_id = id;
          if(confirm("Are you sure you want to delete this medical history")){
          $.post('<?php echo base_url('staff/children/medical_history/delete'); ?>', {"del_id": del_id}, function(data){
            alert('Deleted Successfully');
            location.reload();
            $('#cti').html(data)
            });
          }
        }
        
        </script>
        
        <script>
            $(function(){
              $('#downloadable').click(function(){
                 
                 window.location.href = "<?php echo site_url('staff/children/medical_history/download') ?>?file_name="+ $(this).attr('href');
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
                                        <!--<th>Action</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($medical)){ foreach($medical as $med){ ?>
                                    <tr>
                                        <td><?php echo $med->code; ?></td>
                                        <td><a href="<?php echo site_url('staff/children/profile/detail/'.strtolower($med->code)); ?>"><span class="font-16"><?php echo $med->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url('staff/children/medical_history/detail/'.strtolower($med->id).'/'.strtolower($med->code)); ?>"><?php echo $med->title; ?></a></td>
                                        <td><?php echo character_limiter($med->body, 50); ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($med->created_date)); ?></td>
                                        <!--<td>
                                        < ?php if(!empty($medical)){ ?>
                                        <a href="< ?php echo base_url('staff/children/medical_history/download/'.$med->id); ?>" target="_blank">Download</a>
                                        < ?php }else{ echo ''; } ?>
                                        </td>-->
                                        <td>
                                            <a href="<?php echo site_url('staff/children/medical_history/detail/'.strtolower($med->id).'/'.strtolower($med->code)); ?>" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo site_url('staff/children/medical_history/edit/'.strtolower($med->id).'/'.strtolower($med->code)); ?>" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <button type="button" onclick="delete_medical_history(<?php echo $med->id; ?>)" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
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
                                <h3 class="card-title">Medical History</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/children/medical_history/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Full Name <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_code">
                                                    <option>Select</option>
                                                    <option value="<?php echo $med->code; ?>"><?php echo $med->child_name; ?></option>
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
                                                <label>Date (set the date upon update) <span class="text-danger">*</span></label>
                                                <input type="date" name="created_date" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Comments and further actions</label>
                                                <textarea id="summernote" name="body" class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <!--<div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Document <span class="text-danger">*</span></label>
                                                <input type="file" name="userFiles1[]" class="form-control">
                                            </div>
                                        </div>-->
                                        
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
