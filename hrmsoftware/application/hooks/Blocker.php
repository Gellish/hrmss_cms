<?php
class Blocker {
 
    function Blocker(){
    }
    
    /**
     * This function used to block the every request except allowed ip address
     */
    function requestBlocker(){
        
        $i=0;
		if($i == 1){
            echo "not allowed";
            die;
        }
    }
}
?>