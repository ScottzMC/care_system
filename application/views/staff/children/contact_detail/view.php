<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Young People || Contact Details</title>

<?php $this->load->view('menu/staff/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<div id="main_content">
    <!-- Start Main top header -->
    <?php $this->load->view('menu/staff/nav'); ?>
    <!-- Start project content area -->
    <div class="page">
        
        <?php foreach($children as $child){} 
        foreach($contact_detail as $contact){}
        ?>

        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Contact Details</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/all'); ?>">Young People </a></li>
                            <?php if(!empty($contact_detail)){?>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('staff/children/profile/detail/'.$contact->code); ?>"><?php echo $contact->child_name; ?> Profile </a></li>
                            <?php } ?>
                            <li class="breadcrumb-item active" aria-current="page">Contact Details</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Children-all">List Contact Details</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Children-add">Add Contact Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <script>
        function delete_contact_detail(id){
          var del_id = id;
          if(confirm("Are you sure you want to delete this contact details")){
          $.post('<?php echo base_url('staff/children/contact_detail/delete'); ?>', {"del_id": del_id}, function(data){
            alert('Deleted Successfully');
            location.reload();
            $('#cti').html(data)
            });
          }
        }
        
        </script>
                        
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="Children-all">
                        <div class="table-responsive card">
                            <table class="table table-hover table-vcenter table-striped mb-0 text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Young Person</th>
                                        <th>Full Name</th>
                                        <th>Telephone</th>
                                        <th>Email Address</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($contact_detail)){ foreach($contact_detail as $contact){ ?>
                                    <tr>
                                        <td><?php echo $contact->code; ?></td>
                                        <td><a href="<?php echo site_url('staff/children/profile/detail/'.strtolower($contact->code)); ?>"><span class="font-16"><?php echo $contact->child_name; ?></span></a></td>
                                        <td><a href="<?php echo site_url('staff/children/contact_detail/detail/'.strtolower($contact->id).'/'.strtolower($contact->code)); ?>"><?php echo $contact->fullname; ?></a></td>
                                        <td><?php echo $contact->telephone; ?></td>
                                        <td><?php echo $contact->email; ?></td>
                                        <td><?php echo date('l, dS M Y',strtotime($contact->created_date)); ?></td>
                                        <td>
                                            <a href="<?php echo site_url('staff/children/contact_detail/detail/'.strtolower($contact->id).'/'.strtolower($contact->code)); ?>" class="btn btn-icon btn-sm" title="View"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo site_url('staff/children/contact_detail/edit/'.strtolower($contact->id).'/'.strtolower($contact->code)); ?>" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <button type="button" onclick="delete_contact_detail(<?php echo $contact->id; ?>)" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
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
                                <h3 class="card-title">Contact Details</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url('staff/children/contact_detail/add'); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Young Person <span class="text-danger">*</span></label>
                                                <select class="form-control" name="child_code">
                                                    <option>Select</option>
                                                    <option value="<?php echo $contact->code; ?>"><?php echo $contact->child_name; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>FullName <span class="text-danger">*</span></label>
                                                <input type="text" name="fullname" class="form-control" value="">
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
                                                <label>Email Address <span class="text-danger">*</span></label>
                                                <input type="text" name="email" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input type="text" name="relationship" class="form-control" value="">
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
                                                <label>Address</label>
                                                <textarea id="summernote" name="address" class="form-control" aria-label="With textarea"></textarea>
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
