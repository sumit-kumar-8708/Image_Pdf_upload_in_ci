<?php 

public function add_material_img_pdf() { 		
    $data_arr = [];
    $this->load->view('mentor/include/header',$menu);	
    if($this->input->post()){
        $data_arr['title'] =  $this->input->post('title');			
        $data_arr['status'] =  1;
        $data_arr['section_id'] = $this->input->post('section_id');
        $data_arr['topic_id'] = $this->input->post('topic_id');
        $data_arr['sub_topic_id'] = $this->input->post('subtopic_id');			
        $data_arr['added_on'] = date("Y-m-d H:i:s");
        $data_arr['added_by'] = $_SESSION['user_id'];	
      
        
        $config['upload_path']          = './uploads/study_materials/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';           
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($_FILES['img_pdf']['name']){
            // print_r($_FILES['img_pdf']['name']); die();
            $doc_name = $_FILES['img_pdf']['name'];
            $ext = end(explode('.',$doc_name));
            
            if($ext==="gif" || $ext==="jpg" || $ext==="png" || $ext==="jpeg"){
                $user_type = 2;
            }elseif($ext==="pdf"){
                $user_type = 1;
            }else{
                return false;
            }
            $data_arr['file_type'] =  $user_type;			

            if ($this->upload->do_upload('img_pdf')){
                $data_img_pdf = $this->upload->data();					
                $data_arr['file_url'] =   base_url() . 'uploads/study_materials/' . $data_img_pdf['file_name'];   
                $res = $this->Study_material_model->add_material_img_pdf($data_arr);										
            }
            else{               
                $error = $this->upload->display_errors();
                print_r($error );
            }				
        }
        // echo '<pre>';
        // print_r($data_arr);die;
        if($res){ 
            $this->session->set_flashdata('message', 'Document uploaded successfully');          
            redirect('mentor/study_material');
        }else{           
            $this->session->set_flashdata('msg', 'kinldy check your document');	 
            redirect('mentor/study_material');
        }
    }else{
        $this->session->set_flashdata('msg', 'Something is wrong');	 
        $this->load->view('setting/add_banner'); 
    } 
    $this->load->view('mentor/include/footer');	
                
}

?>