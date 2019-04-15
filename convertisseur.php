<?php

//convertir un nombre romain en nombre arabe


function base($char)
{
    if($char === 'I')  return 1;
   
    elseif($char === 'V') return 5;

    elseif($char === 'X') return 10;
    elseif($char === 'L') return 50;
    elseif($char === 'C') return 100;
    elseif($char === 'D') return 500;
    elseif($char === 'M') return 1000;
}

function Convertir($nbreRomain)
{
    $resultat =array();
    $somme=0;
   
    //cas ou le nombre est un caractere
    if(strlen($nbreRomain)===1)
    {

        $somme=base($nbreRomain);
       return $somme;
    }
    elseif(strlen($nbreRomain)>1)
    {
        //ici je recupere chaque caractere du nombre romain convertit en nombre arabre correspondant
        for($j=0; $j<strlen($nbreRomain); $j++ )
        {
            
            $resultat[]=base($nbreRomain[$j]);
         
        }

        //je commence par prendre le premier element du tableau $resultat car la lecture se fait de gauche vers la droite
        $i=0;
       while(sizeof($resultat)!=0)
        {
            
            if(isset($resultat[$i+1])){

                //si il y un element dans la case suivant on 3 cas de figure qui se presente

                //1er cas ils sont identiques donc je les additionne pour obtenir le nombre et ensuite je les enleve du tableau
                if($resultat[$i] === $resultat[$i+1]) 
                {
                    $somme+=$resultat[$i]+$resultat[$i+1];
                    array_splice($resultat,0,2);
                 
                }
                //2eme cas celui au rang n est inferieur a celui au rang n+1 donc les 2 represente un nombre calculer comme suit et je les enleve du tableau
                elseif($resultat[$i] < $resultat[$i + 1]) 
                {
                   $somme+=$resultat[$i+1] - $resultat[$i];
                  array_splice($resultat,0,2);
                  
                }
                //3eme cas 
                elseif($resultat[$i] > $resultat[$i+1]) 
                {
                   $somme+= $resultat[$i];
                   array_splice($resultat,0,1);
                  
                }
            }
            
            else{
                $somme+=$resultat[$i];
                $resultat=array();
            }
           
        }
        

      return $somme;
    }


}


?>