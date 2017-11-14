<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Firstpage extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        //models connection back-end
        $this->load->model('M_settings', 'settings');// jangan lupa load model nya ya gan
        $this->load->helper(array('url'));
        //end models connection back-end
    }
    public function index() {
      $this->data['title_head'] = "example adding";
      $this->data['header'] = 'adding use angular js';
      $this->data['subheader'] = 'example';
      $this->data['page'] = 'website';
      //--- main content
      $this->load->view('v_adding', $this->data);
      //--- end main content
   }
   public function get_data() {
       $data = $this->settings->get_main_data();
       if(empty($data)){

       } else {
           $i = 0;
           foreach ($data as $list) {
                $result[$i]['id'] = $list->id;
                $result[$i]['title'] = $list->title;
                $result[$i]['description'] = (strlen(strip_tags($list->description)) > 80) ? substr(strip_tags($list->description),0,80).' . . . ' : $list->description;
                $i++;
            }
            echo json_encode($result);
         }
    }
    public function add() {
       $postdata = json_decode(file_get_contents("php://input"), true);

       $data = $this->settings->save($postdata);

       if($data) {
          echo "success";
       } else {
          echo "failure";
       }
   }
   public function get_search() {
       $data = $this->settings->get_search_data($this->uri->segment(3));
       if(empty($data)){

       } else {
           $i = 0;
            foreach ($data as $list) {
                $result[$i]['id'] = $list->id;
                $result[$i]['title'] = $list->title;
                $result[$i]['description'] = (strlen(strip_tags($list->description)) > 80) ? substr(strip_tags($list->description),0,80).' . . . ' : $list->description;
                $i++;
            }
            echo json_encode($result);
         }
    }

    public function get_id($id) {
        $data = $this->settings->get_by_id($id);
        echo json_encode($data);
    }

    public function edit($id)
    {
        $postdata = json_decode(file_get_contents("php://input"), true);

        $data = $this->settings->update(array('id' => $id), $postdata);

        if($data) {
           echo "success";
        } else {
           echo "failure";
        }
    }

    public function delete($id) {
        $this->settings->delete_data($id);
        echo json_encode(array("status" => TRUE));
    }

    public function delete_check_data() {
        $val = json_decode(file_get_contents("php://input"), true);
        $i = 0;
        foreach ($val as $list) {
            $data[$i] = $this->settings->delete_multi_data($list);
            $i++;
        }
        echo json_encode(array("status" => TRUE));
    }
}
