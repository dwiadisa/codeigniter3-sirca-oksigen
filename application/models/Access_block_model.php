    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Access_block_model extends CI_Model
    {
        public function admin()
        {
            if ($this->session->userdata('level') !== "WTO_ADMIN") {
                redirect('auth/403');
            }
        }
        public function ca()
        {
            if ($this->session->userdata('level') !== "CALON_ANGGOTA") {
                redirect('auth/403');
            }
        }

        public function view()
        {

            if ($this->session->userdata('level') == "WTO_VIEW") {
                redirect('auth/403');
            }
        }


        public function ca_akses()
        {
            if ($this->session->userdata('level') == "CALON_ANGGOTA") {
                redirect('auth/403');
            }
        }
    }


/* End of file Access_block_model.php and path \application\models\Access_block_model.php */
