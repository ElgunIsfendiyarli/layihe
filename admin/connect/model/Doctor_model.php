<?php

class Doctor_model extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    public function getDoctors()
    {

        $data = $this->db->query("

        
			select

				       d.id,
				       d.name as doctor_name,
				       d.image,
				       d.description,
			           d.status,
				       d.s_ins,
				       d.s_fb,
				       d.a_tw,
				       d.created_at,
				       d.updated_at,
				       i.name as ixtisas_name


				from doctors d

				left join ixtisas i on d.ixtisas_id=i.id 

			");
        return $data;

    }
    public function getDoc()
    {
        $data = $this->db->query("SELECT * from doctors");

        return $data;
    }

    public function getIxtisas()
    {
        $data = $this->db->query("SELECT * from ixtisas");

        return $data;
    }


    public function getHekim($id)
    {

        $data = $this->db->query("
                    select
                                   d.id,
                                   d.name as doctor_name,
                                   d.image,
                                   d.description,
                                   d.s_ins,
                                   d.s_fb,
                                   d.a_tw,
                                   d.created_at,
                                   d.updated_at,
                                   i.id as ixtisas_id,
                                   i.name as ixtisas_name
            
            
                            from doctors d
                            left join ixtisas i on i.id=d.ixtisas_id where d.id='{$id}'")->fetch();

                         return $data;
    }

    public function insertDoctors($post,$files)
    {

        $db_image = '';
        $tip = $files['image']['type'];
        $allow_type = ['image/gif', 'image/jpg', 'image/png', 'image/jpeg'];
        if (in_array($tip, $allow_type)) {
            $name = md5(rand(10000, 99999)) . $files['image']['name'];
            $tmp_name = $files['image']['tmp_name'];
            $folder = '../../img/doctor';
            $image_path = $folder . '/' . $name;
            move_uploaded_file($tmp_name, $image_path);
            $db_image = 'img/doctor/' . $name;

         }
            $insert = $this->db->prepare("INSERT INTO doctors set


               			    name                     =:name,
			                ixtisas_id               =:ixtisas_id,
			                description              =:description,
			                s_fb                     =:s_fb,
			                s_ins                    =:s_ins,
			                a_tw                     =:a_tw,
			                image                    =:image

               	");

            $ins = $insert->execute(array(


                'name'                 =>$post['name'],
                'ixtisas_id'           =>$post['ixtisas_id'],
                'description'          =>$post['description'],
                's_fb'                 =>$post['s_fb'],
                's_ins'                =>$post['s_ins'],
                'a_tw'                 =>$post['a_tw'],
                'image'                =>$db_image

            ));
            return $ins;

    }

    public  function DELETE_FILE($id)
    {
        $data = $this->db->query("SELECT * from doctors where id='{$id}'")->fetch();
        $path = "../../".$data['image'];
        if ($data['image']!=null and file_exists($path)){
            unlink($path);
        }else{
            echo 'sekil yoxdur';
        }
    }

    public function deleteDoctors($id)
    {
        $this->DELETE_FILE($id);
        $data = $this->db->query("DELETE from doctors where id='{$id}'");
        return $data;
    }

    public function updateDoctors($post,$files)
    {
        $db_image = '';
        $id = $post['id'];
        $tip = $files['image']['type'];
        $allow_type = ['image/gif','image/png','image/jpg','image/jpeg'];
        if (in_array($tip,$allow_type)){
            $name = md5(rand(10000 , 99999)).$files['image']['name'];
            $tmp_name = $files['image']['tmp_name'];
            $folder = '../../img/doctor';
            $image_path = $folder.'/'.$name;
            move_uploaded_file($tmp_name , $image_path);
            $db_image = 'img/doctor/' . $name;

            $this->DELETE_FILE($id);
        }else{
            $con = $this->getHekim($id);
            $db_image = $con['image'];
        }


        $upd = $this->db->prepare("UPDATE doctors set
        
                            name                     =:name,
			                ixtisas_id               =:ixtisas_id,
			                description              =:description,
			                s_fb                     =:s_fb,
			                s_ins                    =:s_ins,
			                a_tw                     =:a_tw,
			                image                    =:image where id='{$id}'
        ");

        $update = $upd->execute(array(
                                'name'                        =>$post['name'],
                                'ixtisas_id'                  =>$post['ixtisas_id'],
                                'description'                 =>$post['description'],
                                's_fb'                        =>$post['s_fb'],
                                's_ins'                       =>$post['s_ins'],
                                'a_tw'                        =>$post['a_tw'],
                                'image'                       =>$db_image
            ));
        return $update;
    }

    public function doctorStatusUpd($post)
    {
        $id = $post['id'];
        $status_update = $this->db->prepare("UPDATE doctors set
                status=:status where id='{$id}' ");

        $sts_upd = $status_update->execute(array(
                status=>$post['status']
        ));
        return $sts_upd;
    }


}


?>