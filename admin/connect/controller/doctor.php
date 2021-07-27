<?php

	
	class Doctor
	{
		
		private $doctor_model;

		function __construct()
		{
			$this->doctor_model = new Doctor_model;
		}

		public function getDoctors()
		{
			$data = $this->doctor_model->getDoctors();
			return $data;
		}

		public function getIxtisas()
		{
			$data = $this->doctor_model->getIxtisas();
			return $data;
		}
        public function getDoc()
        {
            $data = $this->doctor_model->getDoc();
            return $data;
        }

        public function getHekim($post)
        {
            $id = $post['id'];
            $data = $this->doctor_model->getHekim($id);
            return $data;
        }
		public function insertDoctors()
		{
			$data = $this->doctor_model->insertDoctors($_POST,$_FILES);
			return $data;
		}


		public function deleteDoctors()
        {
            $id = $_POST['id'];
            $data = $this->doctor_model->deleteDoctors($id);
            return $data;
        }

        public function updateDoctors()
        {
          $data = $this->doctor_model->updateDoctors($_POST,$_FILES);
          return $data;
        }

        public function doctorStatusUpd()
        {
            $data = $this->doctor_model->doctorStatusUpd($_POST);
            return $data;
        }


	}


?>