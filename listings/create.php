<?php 
    include("../res/util/helper.php");

    if (!checkLogin()) {
        header("Location: ../account/login.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="http://u747950311.hostingerapp.com/househub/site/res/css/bootstrap.min.css">
        <link rel="apple-touch-icon" sizes="57x57" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//favicon-16x16.png">
        <link rel="manifest" href="http://u747950311.hostingerapp.com/househub/site/res/img/icon//manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="http://u747950311.hostingerapp.com/househub/site/res/img/icon//ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <style>
            .card-horizontal {
                display: flex;
                flex: 1 1 auto;
            }

            .card-img {
                width: 14rem;
                height: 184.4px;
            }
        </style>

        <title>HouseHub | Post New Listing</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">
                <img src="http://u747950311.hostingerapp.com/househub/site/res/img/hh-icon.png" height="35" width="35" alt="">
            </a>
            <a class="navbar-brand" href="#">HouseHub</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                            
                <ul class="navbar-nav ml-auto justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link" href="./viewall.php">View Listings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="./create.php">Post Listing</a>
                  </li>
                  <li class="nav-item btn-group">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
                    
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="../account/update.php">Update Information</a>
                      <a class="dropdown-item" href="../account/logout.php">Logout</a>
                    </div>
                  </li>
                </ul>
            </div>

        </nav>

        <div class="container-fluid" style="height:calc(100vh - 91.5px - 56px); margin-top: 30px;">
           <div class="row h-100">

                <div class="card offset-md-3 col-md-6 offset-sm-1 col-sm-10 align-self-center">
                    <div class="card-body">
                        <h5 class="card-title">Post New Listing</h5>
                        <p>
                            We are excited you want to post a listing! 
                            <br>
                            Fill out the details and we'll do the rest!
                        </p>

                        <form action="../res/php/doPostListing.php" enctype='multiple/form-data' id="postForm" class="needs-validation" novalidate>
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                                <div class="invalid-feedback titleFeedback">
                                    Please ensure you enter a valid title!
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" name="loc" id="loc" placeholder="Location" required>
                                <div class="invalid-feedback locationFeedback">
                                    Please ensure you enter a location!
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" name="base_price" id="base_price" min="0" placeholder="Base cost" required>
                                        <div class="invalid-feedback basePriceFeedback">
                                            Please ensure you enter a valid price!
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input type="test" class="form-control" name="add_price" id="add_price" placeholder="Additional costs">
                                        <div class="invalid-feedback addPriceFeedback">
                                            Please ensure you enter a valid price!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hidden" value="1" id="hidden">
                                <label class="form-check-label" for="hidden">
                                    Hidden?
                                </label>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="desc" id="desc" rows="3" placeholder="List important details and your phone # (if you'd like)" required></textarea>
                                <div class="invalid-feedback descFeedback">
                                    Please ensure you enter a valid description!
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pics">Pictures (3 required, png/jpg/jpeg only) (recommended same size)</label>
                                <input type="file" name="file[]" class="form-control-file" required id="pics" accept="image/jpg, image/jpeg, image/png" multiple>
                                <div class="invalid-feedback imageFeedack">
                                    Please ensure you add at least three images!
                                </div>
                            </div>

                            <div class="form-group">
                                By clicking Submit you acknowledge that the email you registered with will be publicly available
                                <br />
                                <button type="submit" class="btn btn-primary" id="submit">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Submit
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <footer class="page-footer font-small blue">
  <div class="footer-email text-center py-3"> Questions or Concerns? <a href="mailto:househubteam@gmail.com" target="_blank">Contact us!</a> 
  </div>
</footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="http://u747950311.hostingerapp.com/househub/site/res/js/main.js"></script>
        <script src="http://u747950311.hostingerapp.com/househub/site/res/js/postListing.js"></script>
    </body>
</html>




          