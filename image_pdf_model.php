<?php 

public function add_material_img_pdf($data_arr){
    return $this->db->insert('study_material',$data_arr);
}

?>