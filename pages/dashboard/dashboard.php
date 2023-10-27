<?php
    $page = "Dashboard";
?>
<!-- bagian kepalanya -->
<?php include '../../includes/header.php';?>

<!-- bagian kontennya -->
<h1 class="mt-4"><?= $page ?></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><?= $page ?></li>
</ol>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="Title">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="Title">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="Title">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
</div>

<!-- bagian kakinya -->
<?php include '../../includes/footer.php';?>