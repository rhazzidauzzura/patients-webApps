<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Headers: Content-Type');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
 use Phalcon\Mvc\Controller;

 class PatientsController extends Controller
 {
     private function createResponse($statusCode, $respon, $messages, $result)
     {
         $response = new \Phalcon\Http\Response();
         $response
             ->setStatusCode($statusCode)
             ->setJsonContent([
                 'status' => [
                     'code' => $statusCode,
                     'response' => $respon,
                     'messages' => $messages
                 ],
                 'result' => $result
             ]);
 
         return $response;
     }
 
     public function indexAction()
     {
        $patients = Patients::find([
            'columns' => 'id, name, sex, religion, phone, address, nik',
            'order' => 'name ASC'
        ]);  
        
         if (count($patients) === 0) {
             return $this->createResponse(404, 'failed', 'Data not found', []);
         }
 
         return $this->createResponse(200, 'success', 'Data available', $patients);
     }
  
     public function secondAction($id)
     {
         $patient = Patients::findFirst($id);
 
         if (!$patient) {
            return $this->createResponse(404, 'failed', 'Data not found', []);
        } 
        return $this->createResponse(200, 'success', 'Data available', $patient);
     }
     
     public function createAction()
    {
        $data = $this->request->getJsonRawBody();

        $patient = new Patients();
        $patient->name = $data->name;
        $patient->sex = $data->sex;
        $patient->religion = $data->religion;
        $patient->phone = $data->phone;
        $patient->address = $data->address;
        $patient->nik = $data->nik;

        if (!$patient->save()) {
            $messages = $patient->getMessages(); 
            // Cek apakah ada pesan kesalahan validasi
            if (count($messages) > 0) {
                return $this->createResponse(422, 'failed', $messages, []);
            } else {
                return $this->createResponse(500, 'error', 'Database error', []);
            }
        }

        return $this->createResponse(201, 'success', 'Patient Added', $patient);
    } 
     public function updateAction($id)
     {
         $data = $this->request->getJsonRawBody();
 
         $patient = Patients::findFirstById($id);
         if ($patient) {
             $patient->name = $data->name;
             $patient->sex = $data->sex;
             $patient->religion = $data->religion;
             $patient->phone = $data->phone;
             $patient->address = $data->address;
             $patient->nik = $data->nik;
 
             if ($patient->save()) {
                 return $this->createResponse(200, 'success', 'Patient edited', $patient);
             } else {
                $messages = $patient->getMessages(); 
                if (count($messages) > 0) {
                  return $this->createResponse(422, 'failed', $messages, []);
                } else {
                  return $this->createResponse(500, 'error', 'Database error', []);
                } 
             } 
         } else {
             return $this->createResponse(404, 'error', 'Data not found', []);
         }
     } 
     public function deleteAction($id)
     {
         $patient = Patients::findFirst($id);
 
         if (!$patient) {
             return $this->createResponse(404, 'failed', 'No Patient Found', []);
         } 
         if (!$patient->delete()) {
             return $this->createResponse(500, 'error', 'Database error', []);
         } 
         return $this->createResponse(200, 'success', 'Patient deleted', $patient);
     }
 }
 