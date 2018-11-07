
<?php

session_start();
    

    $titre = "Calculer Devis";

    include('client/menu-client.php');

?>
    
                            <!-- End navbar -->
    
                            <!-- Start header -->
<div class="container">
    <div class="header-container">
        <h1 class="text-center">Contactez-Nous</h1>
        <div class="calcul-devis text-center">
            <div class="client-contact">
                <form role="form" action="calcul_devis_vis.php" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Nom et Prénom">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Email Adresse">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" placeholder="Numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="7" class="form-control"></textarea>
                    </div>
                    
                    <button type="button" class="btn btn-danger btn-lg">Contactez-Nous</button>

                </form>
            </div>
            
            <div class="cover-contact"></div>
            
        </div>   
        
    </div>
</div>
                            <!-- End header -->

<?php

include('client/footer-client.php');

?>
    
<script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
   
</body>

<style>
    
.calcul-devis{
    width: 900px;
    margin: auto;
    background-color: #FFF;
    border-radius: 20px;
    border: 3px solid #337ab7;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 40px;
    padding: 40px 30px;
    overflow: hidden
    }
    .btn-group-lg>.btn, .btn-lg{
        margin: 30px 30px 0px;
        width: 300px;
        border-radius: 0px
    }
    
    .client-contact{
        background-color: transparent;
        width: 500px;
        height: 500px;
        float: right;
        padding: 20px 0px
    }
    
    .cover-contact{
        width: 300px;
        height: 500px;
        float: left;
        background: url('photos/contact_us.png');
        opacity: 0.5
    }
    .input-lg {border-radius: 0px}
    
</style>
  
</html>