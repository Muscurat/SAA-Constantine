$(document).ready(function(){
    
     var arrayPeugeot=["308|308","208|208","Expert|Expert","203|203","204|204","205|205","206|206","207|207","405|405",
                        "406|406","304|304","305|305","306|306","307|307","806|806","807|807","3008","4008"];
     
     for(var optione in arrayPeugeot){
            var paire = arrayPeugeot[optione].split("|");
            var newOption = document.createElement("option");
            newOptione.value=paire[0];
            newOptione.innerHTML = paire[1];
            $("#nom_veh").append(newOptione);
     }
    
    $('#marque').change(function(){

   var marque = this ;
    
   if(marque.value=="Peujeot"){
       
      var arrayPeugeot=["308|308","208|208","Expert|Expert","203|203","204|204","205|205","206|206","207|207","405|405",
                        "406|406","304|304","305|305","306|306","307|307","806|806","807|807","3008","4008"];
          
   }else if(marque.value=="Renault"){
       
      var arrayPeugeot=["Clio3|Clio3","Clio4|Clio4","Clio1|Clio1","Clio2|Clio2",
                        "Clio Campus|Clio Campus","Kangoo|Kangoo","Scenic|Scenic","Kadjar|Kadjar","Laguna 1|Laguna 1",
                        "Laguna 2|Laguna 2","Laguna 3|Laguna 3","Megane 1|Megane 1","Megane 2|Megane 2","Megane 3|Megane 3",
                        "Super 5|Super 5"];
       
   }else if(marque.value=="Volswagen"){
       
      var arrayPeugeot=["Golf 4|Golf 4","Golf 5|Golf 5","Golf 6|Golf 6",
                        
                    "Golf 7|Golf 7","Jetta|Jetta","Bora|Bora","Passat|Passat",
                        "Multivan|Multivan","Touran|Touran","Tiguan|Tiguan","Polo|Polo",
                        "Amarok|Amarok","Caddy|Caddy","Corrado|Corrado",
                        "Lupo|Lupo","Touareg|Touareg","Fox|Fox","Derby|Derby","Coccinelle|Coccinelle"];
       
   }else if(marque.value=="Volvo"){
       
      var arrayPeugeot=["242|242","244|244","262|262","264|264","440|440","480|480","740|740",
                        "760|760","780|780","850|850","940|940","960|960","C30|C30","C70|C70","P1800|P1800","S40|S40",
                        "S60|S60","S80|S80","V40|V40","XC60|XC60","XC70|XC70"];
       
   }else if(marque.value=="Daihatsu"){
       
             var arrayPeugeot=["Gran|Gran","Max|Max","Terios|Terios","Sirion|Sirion",
                               "Charade|Charade","Copen|Copen","Cuore|Cuore","Move|Move","Materia|Materia","Rocky|Rocky"];
   
   }else if(marque.value=="Lifan"){
       
             var arrayPeugeot=["X 60|X 60","520|520","320|320","520|520",
                               "Hatch Back|Hatch Back","Van|Van","620|620","330|330","530|530","630|630","720|720"];
       
   }else if(marque.value=="Nissan"){
       
             var arrayPeugeot=["Navara|Navara","Qashqai|Qashqai","Patro|Patro","Long|Long","Pathfinder|Pathfinder",
                               "Cabstar|Cabstar","Sunny|Sunny","Micra|Micra","Urvan|Urvan","Pickup|Pickup",
                               "Juke|Juke","Murano|Murano","X Trail|X Trail","370 Z|370 Z","371 Z|371 Z","Civilan|Civilan"];
       
   }else if(marque.value=="Kia"){
       
             var arrayPeugeot=["Sportage|Sportage","Picanto|Picanto","Cerato|Cerato","Rio|Rio","Carens|Carens",
                     "Quoris|Quoris","Cerato Koup|Cerato Koup","Sorento|Sorento",
                               "Cerato Hatchback|Cerato Hatchback","Carnival|Carnival","Ceed|Ceed","Cutback|Cutback",
                                  "Magentis|Magentis","Mohave|Mohave","Opirus|Opirus","Optima|Optima","Sephia|Sephia"];
       
   }else if(marque.value=="Hyundai"){
       
             var arrayPeugeot=["i10 Plus|i10 Plus","Tucson|Tucson","i40|i40","SantaFe|SantaFe",
                       "Accent|Accent","i20|i20","New Sonata|New Sonata",
                         "H1|H1","EON|EON","i10|i10","Accent RB|Accent RB",
                               "i30|i30","Elantra|Elantra","Veloster|Veloster","Genesis|Genesis","i40SW|i40SW"];
       
   }else if(marque.value=="Toyota"){
       
             var arrayPeugeot=["Hilux|Hilux","Nouvelle Corolla|Nouvelle Corolla","Prius|Prius","Auris|Auris",
                               "Yaris Sedan|Yaris Sedan",  
                               "RAV4|RAV4","Avensis|Avensis","PRADO|PRADO",
                               "Yaris|Yaris","Fortuner|Fortuner","Corolla|Corolla","Avenza|Avenza",
                               "Avensis SW|Avensis SW","Aygo|Aygo","Carina|Carina","Celica|Celica"];
       
   }else if(marque.value=="Ford"){
       
             var arrayPeugeot=["Fiesta|Fiesta","Ranger|Ranger","Focus|Focus","C Max|C Max","Mondeo|Mondeo",
                               "Figo|Figo","Tourneo Connect|Tourneo Connect","Fusion|Fusion","Kuga|Kuga",
                                   "Cortina|Cortina","Cougar|Cougar","Escort|Escort","Expedition|Expedition","Explorer|Explorer"];
       
   }else if(marque.value=="Tata"){
       
             var arrayPeugeot=["Vista|Vista","Indigo|Indigo","Manza|Manza","ARIA|ARIA","Indica|Indica"];
       
   }else if(marque.value=="JMC"){
       
             var arrayPeugeot=["TFR|TFR","GL|GL","N350|N350"];
       
   }else if(marque.value=="Chana"){
        
             var arrayPeugeot=["Q20|Q20","Star Truck|Star Truck","Star II|Star II"];
       
   }else if(marque.value=="Mazda"){
        
             var arrayPeugeot=["3BT|3BT","506|506","CX5|CX5","323|323","626|626","CX7|CX7","MX3|MX3",
                               "MX5|MX5","MX6|MX6",
                               "RX7|RX7","RX8|RX8","Xedos 6|Xedos 6","Xedos 9|Xedos 9"];
       
   }else if(marque.value=="Audi"){
        
             var arrayPeugeot=["A3 Sport Back|A3 Sport Back","Q5|Q5","A1|A1",
                               "A3|A3","RS6|RS6","A1 Sport Back|A1 Sport Back","S3|S3","A3 Limousine|A3 Limousine",
                               "A6|A6","A4|A4","Q3|Q3","A5|A5",
                               "A8|A8","Q7|Q7","A7|A7","Coupé|Coupé","GT|GT","Quattro|Quattro"];
       
   }else if(marque.value=="Mercedes"){
        
             var arrayPeugeot=["A3 Sport Back|A3 Sport Back","Q5|Q5","A1|A1",
                               "A3|A3","RS6|RS6","A1 Sport Back|A1 Sport Back","S3|S3","A3 Limousine|A3 Limousine",
                               "A6|A6","A4|A4","Q3|Q3","A5|A5",
                               "A8|A8","Q7|Q7","A7|A7","Coupé|Coupé","GT|GT","Quattro|Quattro"];
       
   } else if(marque.value=="Dacia"){
       
                var arrayPeugeot=["Sandero|Sandero","Logan|Logan","Logan MCV|Logan MCV","Duster|Duster",
                                  "Dokker|Dokker","Lodgy|Lodgy","Solenza|Solenza"];
       
   }  
   // $("#nom_veh").remove(newOption);
    for(var option in arrayPeugeot){
        
        var pair = arrayPeugeot[option].split("|");
        var newOption = document.createElement("option");
        newOption.value=pair[0];
        newOption.innerHTML = pair[1];
        $("#nom_veh").append(newOption);
    
    }
    
    
});
    
});
