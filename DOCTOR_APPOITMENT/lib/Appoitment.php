<?php
    include "lib/Database.php";
?>

<?php
    class App
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        //insert patient data
        public function insertPatientData($name,$number,$email,$doctor,$pay_status,$amount,$date)
        {
            $name = mysqli_real_escape_string($this->db->link, $name);
            $number = mysqli_real_escape_string($this->db->link, $number);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $doctor = mysqli_real_escape_string($this->db->link, $doctor);
            $pay_status = mysqli_real_escape_string($this->db->link, $pay_status);
            $amount = mysqli_real_escape_string($this->db->link, $amount);
            $date = mysqli_real_escape_string($this->db->link, $date);

            if(empty($name) || empty($number) || empty($email) || empty($doctor) || empty($pay_status) || empty($amount) || empty($date))
            {
                echo "<div style='margin-top:20px' class='alert alert-danger'><strong>Field Should Not Empty Please Fill All Field</strong></div>";
            }
            else
            {
                $query = "INSERT INTO tbl_patient(name,contact,email,doc_name,pay_status,p_amount,p_date) VALUES('$name','$number','$email','$doctor','$pay_status','$amount','$date')";
                $result = $this->db->insert($query);
                if($result)
                {
                    return $result;
                }
            }
            
        }

        //add doctor
        public function insDocData($name)
        {
            $name = mysqli_real_escape_string($this->db->link, $name);

            if(empty($name))
            {
                echo "<div style='margin-top:20px'  class='alert alert-danger'><strong>Field Should Not Empty</strong></div>";
            }
            else
            {
                $query = "INSERT INTO tbl_doc(name) VALUES('$name')";
                $result = $this->db->insert($query);
                if($result)
                {
                    return $result;
                }
            }
        }

        //select doctor
        public function SelectDoctor()
        {
            $query = "SELECT * FROM tbl_doc";
            $result = $this->db->select($query);
            return $result;
        }

        //select all patient
        public function selectPatient()
        {
            $query = "SELECT * FROM tbl_patient";
            $result = $this->db->select($query);
            return $result;
        }

        //search patient Data
        public function searchPData($data)
        {
            $data = mysqli_real_escape_string($this->db->link, $data);

            if(empty($data))
            {
                echo "<div style='margin-top:20px'  class='alert alert-danger'><strong>Field Should Not Empty Please Fill The Field</strong></div>";
            }
            else
            {
                $query = "SELECT * FROM tbl_patient WHERE contact = '$data'";
                $result = $this->db->select($query);
                return $result;
            }
        }

        //update payment
        public function patientPayment($u_pay,$u_amounts,$id)
        {
            $u_pay = mysqli_real_escape_string($this->db->link, $u_pay);
            $u_amounts = mysqli_real_escape_string($this->db->link, $u_amounts);

            if(empty($u_pay) || empty($u_amounts))
            {
                echo "<div style='margin-top:20px' class='alert alert-danger'><strong>Field Should Not Empty</strong></div>";
            }
            else
            {
                $query = "UPDATE tbl_patient SET pay_status = '$u_pay', p_amount = '$u_amounts' WHERE id = $id ";
                $result = $this->db->update($query);
                if($result)
                {
                    return $result;
                }
            }
        }


        //view single patient
        public function viewSinglePatient($id)
        {
            $query = "SELECT * FROM tbl_patient WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }


        //Admin Data
        public function AdminData()
        {
            $query = "SELECT * FROM tbl_admin";
            $result = $this->db->select($query);
            return $result;
        }
    }

?>


