<?php 
$bg_info="bg-light";
$bg_secondary="bg-light";
$bg_primary="bg-light";

// $cookies = array(
//     ['title'=>'cookie-A','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year']
//     ,['title'=>'cookie-B','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'],
//     ['title'=>'cookie-C','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year']);
$consents =  array( 
['title'=>'necessary','is_enabled'=>1,'cookies'=>array(['title'=>'cookie-A','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year']
,['title'=>'cookie-B','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'],
['title'=>'cookie-C','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'])],
['title'=>'function','is_enabled'=>0,'cookies'=>array(['title'=>'cookie-A','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year']
,['title'=>'cookie-B','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'],
['title'=>'cookie-C','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'])],
['title'=>'marketing','is_enabled'=>0,'cookies'=>array(['title'=>'cookie-A','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year']
,['title'=>'cookie-B','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'],
['title'=>'cookie-C','is_enabled'=>0,'domain'=>'cookie-dev.com','expires'=>'1year'])]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href='custom.css' type="text/css" />

    <title>Cookie Banner Consent</title>
</head>

<body>
    <div class="jumbotron">
        <h1 class="display-4">Jumbotron</h1>
        <p class="lead">This is a jumbotron created using the bootstrap 4</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
    <div id="cookie-banner" class="cookie-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>We use cookies to ensure you get the best experience on our website. By clicking "Accept", you
                        agree to our use of cookies. To learn more about our cookies and how to manage them, please see
                        our <a href="#" data-toggle="modal" data-target="#cookie-policy-dialog">Cookie Policy</a>.</p>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-outline-secondary btn-sm mr-2"
                            id="cookie-decline">Decline</button>
                        <button type="button" class="btn btn-primary btn-sm" id="cookie-accept">Accept</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cookie-policy-dialog" tabindex="-1" role="dialog"
        aria-labelledby="cookie-policy-dialog-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="cookie-policy-dialog-title">Cookie Policy</h5>
                    <button type="button" id="cookie_back" class="btn btn-lg btn-secondary d-none">
                        Back
                    </button>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <p>Please select which cookies you consent to:</p>

                    <?php foreach($consents as $index=>$cookie):?>
                    <?php $cookie=(object)$cookie;?>
                    <div id="consent_<?=$index?>" class="card mb-2">

                        <div class="card-title d-flex  <?=$bg_secondary?>">
                            <div class="p-2 mr-auto <?=$bg_info?>"><label class="form-check-label"
                                    for="<?=$cookie->title?>"><h4><?=$cookie->title?></h4></label></div>

                            <div class="p-2 <?=$bg_primary?>">
                                <label class="switch">
                                    <input type="checkbox" id="<?=$cookie->title?>" 
                                    <?=$cookie->is_enabled?'checked':''?>
                                    <?=$cookie->is_enabled?'disabled readonly':''?>
                                    
                                    >
                                    <span class="slider round"></span>
                                </label>
                            </div>

                        </div>
                        <div class="card-body p-2">
                            <a href="#" class="link" id="detail_<?=$cookie->title?>" data-id='<?=$index?>'>detail</a>
                        </div>
                    </div>
                    <div id="cookie_<?=$index?>" class="d-none">
                        <h4><?=$cookie->title?></h4>
                        <?php foreach($cookie->cookies as $biscuit):?>
                        <?php $biscuit =(object)$biscuit ?>
                        <div class="card  p-3 mb-3">
                        <div class="form-group">
                            <label>title:
                                <?=$biscuit->title?>
                            </label>

                        </div>
                        <div class="form-group">
                            <label>domain:
                                <?=$biscuit->domain?>
                            </label>

                        </div>
                        <div class="form-group">
                            <label>expires:
                                <?=$biscuit->expires?>
                            </label>

                        </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <?php endforeach ?>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cookie-policy-accept">Accept</button>
                </div>
            </div>
        </div>
    </div>

    <script src="cookie.js"></script>
</body>

</html>