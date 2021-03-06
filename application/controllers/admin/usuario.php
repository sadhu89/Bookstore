<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Usuario_model', 'u');
    }

    public function index($pag = 0) {
        $data['usuarios'] = $this->u->get_usuarios(NULL, $pag);
        /*         * ********** Configuracion de la paginacion ************************ */
        $config['base_url'] = base_url() . 'admin/usuario/';
        $config['total_rows'] = $this->u->get_total();
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        /*         * ***************************************************************** */
        $data['activo'] = 'administrador';
        $data['contenido'] = 'admin/usuario';
        $this->load->view('plantilla_admin/plantilla', $data);
    }

    public function do_buscar() {
        $buscar = $this->input->post('buscar');
        if ($buscar == '')
            redirect(base_url() . 'admin/usuario');
        else
            redirect(base_url() . 'admin/usuario/buscar/' . urlencode($buscar) . '/0');
    }

    public function buscar() {
        $cad = urldecode($this->uri->segment(4));
        $data['usuarios'] = $this->u->get_usuarios($cad, $this->uri->segment(5)==null?0:$this->uri->segment(5));
        $config['base_url'] = base_url() . 'admin/usuario/buscar/' . $this->uri->segment(4);

        /*         * ********** Configuracion de la paginacion ************************ */
        $config['total_rows'] = $this->u->get_total($cad);
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        /*         * ***************************************************************** */

        $data['activo'] = 'administrador';
        $data['contenido'] = 'admin/usuario';
        $this->load->view('plantilla_admin/plantilla', $data);
    }

    public function eliminar($id) {
        $this->u->eliminar($id);
        redirect(base_url() . 'admin/usuario/' . $_SESSION['atras']);
    }

    public function modificar($id = NULL) {
        $data['activo'] = 'administrador';
        if (!isset($_POST['nombre'])) {
            if ($id === NULL) {
                $data['titulo'] = 'NUEVO ADMINISTRADOR';
            } else {
                $data['titulo'] = 'MODIFICAR ADMINISTRADOR';
                $data['usuarios'] = $this->u->get($id);
            }
            $data['contenido'] = 'admin/modificar_usuario';
            $this->load->view('plantilla_admin/plantilla', $data);
        } else {
            $nombre = $this->input->post('nombre', true);
            $email = $this->input->post('email', true);
            $contrasena = $this->input->post('contrasena', true);
            $confirmar = $this->input->post('confirmar', true);
            if ($this->u->existe($email)){
                $repetidos = $this->u->get_usuarios($email);
                foreach ($repetidos as $repetido) {
                    if ($id == NULL || $repetido->id != $id) {
                        if ($id === NULL) {
                            $data['titulo'] = 'NUEVO ADMINISTRADOR';
                        } else {
                            $data['titulo'] = 'MODIFICAR ADMINISTRADOR';
                            $data['usuarios'] = $this->u->get($id);
                        }
                        $data['error'] = "<script type='text/javascript'>onCorreo()</script>";
                        $c=array('Nombre'=>$_POST['nombre'],
                                'Email'=>"",
                                'Contrasena'=>""
                            );
                        $c=(object)$c;
                        $data['usuarios']=$c;
                        $data['contenido'] = 'admin/modificar_usuario';
                        $this->load->view('plantilla_admin/plantilla', $data);
                        return;
                    }
                }
            }
            if ($contrasena != $confirmar) {
                if ($id === NULL) {
                    $data['titulo'] = 'NUEVO ADMINISTRADOR';
                } else {
                    $data['titulo'] = 'MODIFICAR ADMINISTRADOR';
                    $data['usuarios'] = $this->u->get($id);
                }
                $data['error'] = "<script type='text/javascript'>onDanger()</script>";
                $c=array('Nombre'=>$_POST['nombre'],
                                'Email'=>$_POST['email'],
                                'Contrasena'=>""
                            );
                        $c=(object)$c;
                        $data['usuarios']=$c;
                $data['contenido'] = 'admin/modificar_usuario';
                $this->load->view('plantilla_admin/plantilla', $data);
                return;
            }
            if ($id === NULL) {
                $this->u->insertar($nombre, $email, $contrasena);
            } else {
                $this->u->actualizar($id, $nombre, $email, $contrasena);
            }
             redirect(base_url() . 'admin/usuario/' . $_SESSION['atras']);
        }
    }

    public function unico($email) {
        $existe = $this->u->get_by_EMail($email);
        if ($existe->exists()) {
            return false;
        } else {
            return true;
        }
    }

}

