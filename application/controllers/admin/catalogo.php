<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of catalogo
 *
 * @author Sadhu
 */
class Catalogo extends CI_Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/catalogo_model');
    }
    
    public function index() {
        
        $datos['libros']= $this->catalogo_model->get_libros();
        $menu['activo']='catalogo';
        $this->load->view('plantilla_admin/header', $menu);
        $this->load->view('admin/catalogo', $datos);
        $this->load->view('plantilla_admin/footer');
        
    }
    
    public function eliminar($id) {
        $this->catalogo_model->eliminar($id);
        
        $this->index();
        
    }
    
    public function agregar() {
        $menu['activo']='catalogo';
        if(!isset($_POST['titulo'])){
            $this->load->view('plantilla_admin/header',$menu);
            $this->load->view('admin/agregar_libro');
            $this->load->view('plantilla_admin/footer');
        }
        else{
            $this->catalogo_model->insertar();
            $this->index();
        }
    }


}

?>
