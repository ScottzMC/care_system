<?php 
    
    function convertToTimeFormat($timestamp){
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
<title>Handover || admin || Harold</title>

<?php $this->load->view('menu/admin/style'); ?>

</head>

<body class="font-muli theme-cyan gradient">

<!-- Page Loader -->


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
                        <h1 class="page-title">Handover</h1>
                        <ol class="breadcrumb page-breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="<?php echo site_url('admin/house/all/unit/'.strtolower($code)); ?>"><?php echo $prop->housename; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo site_url('admin/house/handover/view/'.strtolower($code)); ?>">Handover</a></li>
                        </ol>
                    </div>

                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Ingoing-add">Ingoing</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Outgoing-add">Outgoing</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
            <div class="container-fluid">
                <div class="tab-content">
                    
                    <div class="tab-pane active" id="Ingoing-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ingoing</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/house/handover/ingoing/$code"); ?>" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Handover Date <span class="text-danger">*</span></label>
                                                <select name="handover_id" class="form-control">
                                                    <option>Select</option>
                                                    <?php if($outgoing){ foreach($outgoing as $out){ ?>
                                                    <option value="<?php echo $out->handover_id; ?>"><?php echo $out->title; ?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Have you read the staff communication, logged KWS & required data <span class="text-danger">*</span></label>
                                                <input type="radio" name="actions" value="Yes"> Yes
                                                <input type="radio" name="actions" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Is the Playstation/Xbox present at placement? <span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="gaming" value="Yes"> Yes
                                                <input type="radio" name="gaming" value="No"> No
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Do you have the House Keys, Mobile and Petty cash?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="keys_pettycash" value="Yes"> Yes
                                                <input type="radio" name="keys_pettycash" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Does the Petty Cash amount correlate with the Petty Cash Record? <span class="text-danger">*</span></label>
                                                <input type="text" name="keys_pettycash_comment" placeholder="£" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Are there any concerns or medication that needs to be held for YPs!<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="health_wellbeing" value="Yes"> Yes
                                                <input type="radio" name="health_wellbeing" value="No"> No
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? <span class="text-danger">*</span> </label>
                                                <textarea name="cleanliness" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Are there any Service Users who are near their missing people’s time, or are away from the unit? <span class="text-danger">*</span> </label>
                                                <textarea name="occupancy" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Does Edt or the Police  need to be updated? <span class="text-danger">*</span> </label>
                                                <textarea name="edt_police_comment" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Any <b>Safeguarding Concerns?</b> If yes, has this been logged and reported to the safeguarding officer. <span class="text-danger">*</span> </label>
                                                <textarea name="safeguarding" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Have all appointments been added to the diary?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="appointments_diary" value="Yes"> Yes
                                                <input type="radio" name="appointments_diary" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Has an allocated worker been assigned to support that YP?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="appointments_diary_support" value="Yes"> Yes
                                                <input type="radio" name="appointments_diary_support" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Has the YP been reminded/offered support for the appointment?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="appointments_diary_remind" value="Yes"> Yes
                                                <input type="radio" name="appointments_diary_remind" value="No"> No
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Handover of each Service User:</label>
                                                <textarea name="service_user" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Are there any maintenance issues you need to deal with during your shift? If so, do you know who to contact?</label>
                                                <textarea name="maintenance" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Outstanding task to complete</label>
                                                <textarea name="outstanding_task" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Time <span class="text-danger">*</span></label>
                                                <input type="text" name="time" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="date" class="form-control" placeholder="yyyy-mm-dd">
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
                    
                    <div class="tab-pane show" id="Outgoing-add">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Outgoing</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url("admin/house/handover/outgoing/$code"); ?>" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Today's date <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Have you read the staff communication, logged KWS & required data <span class="text-danger">*</span></label>
                                                <input type="radio" name="actions" value="Yes"> Yes
                                                <input type="radio" name="actions" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Is the Playstation/Xbox present at placement? <span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="gaming" value="Yes"> Yes
                                                <input type="radio" name="gaming" value="No"> No
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Do you have the House Keys, Mobile and Petty cash?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="keys_pettycash" value="Yes"> Yes
                                                <input type="radio" name="keys_pettycash" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Does the Petty Cash amount correlate with the Petty Cash Record? <span class="text-danger">*</span></label>
                                                <input type="text" name="keys_pettycash_comment" placeholder="£" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Are there any concerns or medication that needs to be held for YPs!<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="health_wellbeing" value="Yes"> Yes
                                                <input type="radio" name="health_wellbeing" value="No"> No
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Has the house been checked for cleanliness, with particular attention to all the communal areas such as the Kitchen, lounge, all bathrooms? <span class="text-danger">*</span> </label>
                                                <textarea name="cleanliness" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Are there any Service Users who are near their missing people’s time, or are away from the unit? <span class="text-danger">*</span> </label>
                                                <textarea name="occupancy" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Does Edt or the Police  need to be updated? <span class="text-danger">*</span> </label>
                                                <textarea name="edt_police_comment" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Any <b>Safeguarding Concerns?</b> If yes, has this been logged and reported to the safeguarding officer. <span class="text-danger">*</span> </label>
                                                <textarea name="safeguarding" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Have all appointments been added to the diary?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="appointments_diary" value="Yes"> Yes
                                                <input type="radio" name="appointments_diary" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Has an allocated worker been assigned to support that YP?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="appointments_diary_support" value="Yes"> Yes
                                                <input type="radio" name="appointments_diary_support" value="No"> No
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Has the YP been reminded/offered support for the appointment?<span class="text-danger">*</span></label>
                                                <br>
                                                <input type="radio" name="appointments_diary_remind" value="Yes"> Yes
                                                <input type="radio" name="appointments_diary_remind" value="No"> No
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Handover of each Service User:</label>
                                                <textarea name="service_user" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Are there any maintenance issues you need to deal with during your shift? If so, do you know who to contact?</label>
                                                <textarea name="maintenance" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Outstanding task to complete</label>
                                                <textarea name="outstanding_task" class="form-control" rows="5" cols="5" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Time <span class="text-danger">*</span></label>
                                                <input type="text" name="time" class="form-control" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" name="date" class="form-control" placeholder="yyyy-mm-dd">
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
