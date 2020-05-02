<?php
//필요한 파라미터를 이 함수에 전달해서 모든 파라미터를 사용할 수 있는지 확인해 준다.
function isTheseParametersAvailable($params){

    //traversing through all the parameters
    foreach($params as $param){
        //if the paramter is not available
        if(!isset($_POST[$param])){
            //return false
            return false;
        }
    }
    //return true if every param is available
    return true;
}

?>