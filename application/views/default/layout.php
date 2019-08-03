<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 21/05/2019
 * Time: 16:31
 */
$attr = array('class' => 'form-inline my-2 my-lg-0');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Localisation</title>
    <link rel = "icon" href =
    "<?php echo base_url()?>assets/img/map.png"
          type = "image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />

    <link href="<?php echo base_url()?>/assets/css/main.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body>
<nav class="navbar navbar-dark bg-dark d-flex justify-content-around myNav" style="z-index: 6; <?php if ('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] == base_url().'index.php')echo 'top: 40vh'?> ">
    <a  class="navbar-brand " href="<?php echo base_url();?>">Localisation IP</a>
    <?php echo form_open('welcome/searchIp',$attr);?>
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" value="<?php
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        if(isset($search) && $search != "")echo $search;
        else{
            echo $ip;
        }

        ?>" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<div style="z-index: 2">
    <?php echo $content_for_layout; ?>
</div>

</body>
</html>

