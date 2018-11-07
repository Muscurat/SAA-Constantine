<?php

$titre = "Profile";

include('client/menu-client.php');

?>
    
                            <!-- End navbar -->
                                <!-- Start header -->
<div class="container">
    <div class="header-container">
        <h1 class="text-center">Modifier le profile</h1>
        <div class="calcul-devis text-center">
            
            <form role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom">Nom</label>
                      <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="prenom">Prénom</label>
                      <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>
                </div>
            </div>
            <div class="form-group">
                      <label for="pseudo">Nom d'utilisateur</label>
                      <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <a href="#"><p class="lead" data-toggle="modal" data-target="#connModal">* Changer le mot de passe *</p></a>
            <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                      <label for="tel">Numéro de téléphone</label>
                      <input type="number" class="form-control" id="tel" name="tel">
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="date_nai">Date de naissance</label>
                      <select class="form-control" id="date_nai" name="date_nai">
                        <option selected="selected" value="">Jour</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="mois_nai">&nbsp;</label>
                    <select class="form-control" id="mois_nai" name="mois_nai">
                        <option selected="selected" value="">Mois</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="annee_nai">&nbsp;</label>
                    <select class="form-control" id="annee_nai" name="annee_nai">
                        <option selected="selected" value="">Année</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option>
                    </select>
                </div>
            </div>
                <div class="form-group" style="margin-top: 15px">
                      <label for="sexe">Sexe</label>
                          <select class="form-control" id="sexe" name="sexe">
                            <option selected="selected" value="">Sélectionnez...</option>
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                          </select>
                </div>
            <div class="form-group">
                      <label for="adr">Adresse</label>
                      <input type="text" class="form-control" id="adr" name="adr">
            </div>
            <div class="form-group">
                      <label for="profession">Profession</label>
                      <input type="text" class="form-control" id="profession" name="profession">
            </div>
            <div class="form-group">
                      <label for="num_permit">Numéro de permit</label>
                      <input type="text" class="form-control" id="num_permit" name="num_permit">
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <label for="date_permit">Date de permit</label>
                      <select class="form-control" id="date_permit" name="date_permit">
                        <option selected="selected" value="">Jour</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="mois_permit">&nbsp;</label>
                    <select class="form-control" id="mois_permit" name="mois_permit">
                        <option selected="selected" value="">Mois</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                </div>
                <div class="col-md-4">
                    <label for="annee_permit">&nbsp;</label>
                    <select class="form-control" id="annee_permit" name="annee_permit">
                        <option selected="selected" value="">Année</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option>
                    </select>
                </div>
            </div>
                
            <button type="submit" class="btn btn-primary btn-lg btn-block">Enregistrer</button>
            
        </form>
            
        </div>   
        
    </div>
</div>
                            <!-- End header -->

<!-- Start connexion modal -->
    
<div id="connModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content text-center">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <i class="fa fa-key fa-4x"></i>
      </div>
      <div class="modal-body">
        
            <form role="form">
              <div class="form-group">
                  <input type="password" class="form-control" id="puissance" name="puissance" placeholder="Mot de passe actuelle">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="puissance" name="puissance" placeholder="Nouveau mot de passe">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" id="puissance" name="puissance" placeholder="Retapper le nouveau mot de passe">
              </div>
             
              <button type="submit" class="btn btn-primary btn-lg">Changer</button>
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Annuler</button>
            </form>
          
      </div>
    
    </div>

  </div>
</div>
    
<!-- End inscrire modal -->
    
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/sendMail.js"></script>
    <script>new WOW().init();</script>

</body>

<style>
    
.calcul-devis{
    width: 900px;
    margin: auto;
    background-color: transparent;
    border-radius: 20px;
    border: 3px solid #337ab7;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 40px;
    padding: 40px 30px
    }
    .btn-group-lg>.btn, .btn-lg{
        margin-top: 30px;
        margin-left: 270px;
        width: 300px;
        border-radius: 0px
    }
    
</style>

<?php

include('client/footer-client.php');

?>

</html>