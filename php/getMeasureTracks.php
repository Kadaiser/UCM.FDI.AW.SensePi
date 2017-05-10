<?php
/*
public function getCars(){
        $this->load->model('car_model');

        $this->form_validation->set_rules('carId', 'carId', 'trim|xss_clean');

        if($this->form_validation->run()){
            $carId = $this->input->post('carId');
            $carModels = $this->user_management_model->getCarModels($carId);
            // Add below to output the json for your javascript to pick up.
            echo json_encode($carModels);
            // a die here helps ensure a clean ajax call
            die();
        } else {
            echo "error";
        }
}
*/
//apertura de conexión con BD
$DBconnection = mysqli_connect('127.0.0.1','root','','pisense');

$roomName = $_POST['roomName'];
$sinceDate = $_POST['sinceDate'];

if($DBconnection) {

  $sqlroomslotid = "SELECT roomslots.id
                    FROM rooms JOIN roomslots
                    ON rooms.id = roomslots.roomId
                    WHERE rooms.name = '".$roomName."'
                   ";

  $queryForRoomSlots = mysqli_query($DBconnection,$sqlroomslotid);



 ?>
