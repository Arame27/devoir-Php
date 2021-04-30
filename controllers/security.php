<?php

function est_vide(string $val):bool{
    return empty($val);
}

function est_string(string $val):bool{
    return is_string($val);
}

function valide_info(string $val, array &$array_error, string $key, string $message="champ obligatoire"):void{
        if(empty($val)){
            $array_error[$key]=$message;
        }else{
            if(!is_string($val)){
                $array_error[$key]="Vous devez saisir un nom ou prenom valide";
            }
        }
}

function valide_login(string $login, array &$array_error,string $key, string $message="champ obligatoire"){
    if(empty($login)){
        $array_error[$key]=$message;
    }else{
       if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$login)){
        $array_error[$key]="Vous devez saisir un login valide";
       }
    }
}

function form_valide(array $array_error):bool{
    return count($array_error)==0;
}