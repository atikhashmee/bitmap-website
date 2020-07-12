 <?php  include 'files/header.php';?>
            <!-- wrapper  -->
            <div id="wrapper">
                <!-- content-holder  -->
            <div class="content-holder" data-pagetitle="Home Fullsceen slider">
                
                   
                     <?php 
                     include 'files/rightnav.php';
 
    
           $pagesql = "SELECT * FROM `home_styles` where status='1'";
           $settingpage = $db->joinQuery($pagesql)->fetch(PDO::FETCH_ASSOC);

          
           switch ($settingpage['style_title']) {
            case 'home2':
                   include 'index2.php'; 
              break;
            case 'home5':
                  include 'index5.php'; 
                   break;
            case 'home6':
                    include 'index6.php'; 
              break;
            case 'home8':
                     include 'index8.php';
              break;
            default:
            include 'dashboard.php'; 
              break;
           }


           include 'files/home_footer.php';
 ?>
                   