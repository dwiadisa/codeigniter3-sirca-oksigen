<?php
class access_block extends CI_Model
{


    public function tolol()
    {


        $akses = $this->session->userdata('level');


        // if ($akses = "WTO_ADMIN"){
        //     echo "kamu tidak punya hak"
        // }

        if ($akses != "WTO_ADMIN") {
            echo "kamu tidak punya hak kesini";
        } else {

            echo "kamu berhak";
            # code...
        }
    }
}
